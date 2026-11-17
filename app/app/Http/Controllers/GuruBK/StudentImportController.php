<?php

namespace App\Http\Controllers\GuruBK;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\StudentImportBatch;
use App\Models\StudentImportBatchItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;

class StudentImportController extends Controller
{
    public function index(): View
    {
        $partialBatches = StudentImportBatch::with('items')
            ->where('user_id', auth()->id())
            ->where('status', 'partial')
            ->latest()
            ->get();

        return view('guru-bk.student-import.index', compact('partialBatches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => ['required', 'file', 'max:2048'],
        ]);

        if (strtolower($request->file('file')->getClientOriginalExtension()) !== 'csv') {
            return back()->withErrors([
                'File harus berformat CSV.',
            ]);
        }

        $handle = fopen($request->file('file')->getRealPath(), 'r');

        if (!$handle) {
            return back()->withErrors(['File CSV tidak dapat dibaca.']);
        }

        $firstLine = fgets($handle);
        $delimiter = substr_count($firstLine, ';') > substr_count($firstLine, ',')
            ? ';' : ',';

        rewind($handle);

        $headers = fgetcsv($handle, 0, $delimiter);

        if (!$headers) {
            fclose($handle);
            return back()->withErrors(['File CSV kosong.']);
        }

        $headers[0] = preg_replace('/^\xEF\xBB\xBF/', '', $headers[0]);
        $headers = array_map(fn ($value) => strtolower(trim($value)), $headers);

        $required = ['name', 'email', 'nis', 'cohort_year'];

        if (array_diff($required, $headers)) {
            fclose($handle);
            return back()->withErrors([
                'Header CSV harus memuat: name, email, nis, cohort_year.',
            ]);
        }

        $rows = [];
        $errors = [];
        $seenEmails = [];
        $seenNis = [];
        $line = 1;

        while (($data = fgetcsv($handle, 0, $delimiter)) !== false) {
            $line++;

            if (count($rows) >= 500) {
                $errors[] = 'Maksimal 500 data Murid dalam satu file.';
                break;
            }

            if (count($data) !== count($headers)) {
                $errors[] = "Baris {$line}: jumlah kolom tidak sesuai.";
                continue;
            }

            $row = array_combine($headers, array_map('trim', $data));

            $validator = Validator::make($row, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255'],
                'nis' => ['required', 'string', 'max:50'],
                'cohort_year' => ['required', 'integer', 'between:2000,2100'],
            ]);

            if ($validator->fails()) {
                $errors[] = "Baris {$line}: " . implode(' ', $validator->errors()->all());
                continue;
            }

            $email = strtolower($row['email']);
            $nis = $row['nis'];

            if (isset($seenEmails[$email]) || isset($seenNis[$nis])) {
                $errors[] = "Baris {$line}: email atau NIS duplikat dalam CSV.";
                continue;
            }

            if (User::where('email', $email)->orWhere('nis', $nis)->exists()) {
                $errors[] = "Baris {$line}: email atau NIS sudah terdaftar.";
                continue;
            }

            $seenEmails[$email] = true;
            $seenNis[$nis] = true;

            $row['email'] = $email;
            $rows[] = $row;
        }

        fclose($handle);

    if (!$rows && !$errors) {
            $errors[] = 'Tidak ada data Murid untuk disimulasikan.';
        }

        $batch = null;

        if (count($rows) > 0 && count($errors) === 0) {
            $batch = StudentImportBatch::create([
                'user_id' => auth()->id(),
                'data' => $rows,
                'status' => 'pending',
                'expires_at' => now()->addMinutes(30),
            ]);

        foreach ($rows as $index => $row) {
            StudentImportBatchItem::create([
                'batch_id' => $batch->id,
                'row_number' => $index + 1,
                'email' => strtolower(trim($row['email'])),
                'status' => 'pending',
            ]);
        }
        }

        return back()->with('simulation_result', [
            'valid' => count($rows),
            'invalid' => count($errors),
            'errors' => $errors,
            'batch_id' => $batch?->id,
            'message' => $batch
                ? 'Simulasi berhasil. Periksa kembali data sebelum konfirmasi.'
                : 'Simulasi selesai. Tidak ada akun dibuat dan tidak ada email dikirim.',
        ]);
    }

    public function confirm(StudentImportBatch $batch)
    {
        if ($batch->user_id !== auth()->id()) {
            abort(403);
        }

        if (
            $batch->status !== 'pending' ||
            !$batch->expires_at ||
            $batch->expires_at->isPast()
        ) {
            return back()->withErrors([
                'Batch simulasi sudah tidak berlaku. Silakan unggah ulang CSV.'
            ]);
        }

        return back()->with('confirmation_review', [
            'batch_id' => $batch->id,
            'count' => count($batch->data ?? []),
            'message' => 'Data siap ditinjau. Belum ada akun dibuat dan email dikirim.',
        ]);
    }


    public function finalize(StudentImportBatch $batch)
    {
        $actorId = auth()->id();

        if ($batch->user_id !== $actorId) {
            abort(403);
        }

        $claimed = StudentImportBatch::whereKey($batch->id)
            ->where('user_id', $actorId)
            ->where(function ($query) {
                $query->where('status', 'partial')
                    ->orWhere(function ($pending) {
                        $pending->where('status', 'pending')
                            ->whereNotNull('expires_at')
                            ->where('expires_at', '>', now());
                    });
            })
            ->update([
                'status' => 'processing',
                'updated_at' => now(),
            ]);

        if ($claimed !== 1) {
            abort(403, 'Batch tidak berlaku atau sedang diproses.');
        }

        $batch->refresh();
        $created = 0;
        $sent = 0;

        try {
            foreach ($batch->items()->orderBy('row_number')->get() as $item) {
                if ($item->status === 'sent') {
                    continue;
                }

                try {
                    $row = ($batch->data ?? [])[$item->row_number - 1] ?? null;

                    if (!$row) {
                        throw new \RuntimeException('Data baris CSV tidak ditemukan.');
                    }

                    $email = strtolower(trim($row['email']));
                    $nis = trim($row['nis']);

                    if (!$item->user_id) {
                        $temporaryPassword = Str::random(16);

                        $student = DB::transaction(function () use (
                            $row, $email, $nis, $actorId,
                            $temporaryPassword, $item
                        ) {
                            if (User::where('email', $email)
                                ->orWhere('nis', $nis)->exists()) {
                                throw new \RuntimeException('Email atau NIS sudah terdaftar.');
                            }

                            $student = new User();
                            $student->forceFill([
                                'name' => $row['name'],
                                'email' => $email,
                                'nis' => $nis,
                                'cohort_year' => $row['cohort_year'],
                                'role' => 'murid',
                                'verification_status' => 'approved',
                                'email_verified_at' => now(),
                                'verified_by' => $actorId,
                                'verified_at' => now(),
                                'must_change_password' => true,
                                'password' => $temporaryPassword,
                            ]);
                            $student->save();

                            $item->update([
                                'user_id' => $student->id,
                                'status' => 'account_created',
                                'temporary_password' => $temporaryPassword,
                                'error_message' => null,
                            ]);

                            return $student;
                        });

                        $created++;
                    } else {
                        $student = User::findOrFail($item->user_id);
                        $temporaryPassword = $item->temporary_password;

                        if (!$temporaryPassword) {
                            $temporaryPassword = Str::random(16);

                            $student->forceFill([
                                'password' => $temporaryPassword,
                                'must_change_password' => true,
                            ])->save();

                            $item->update([
                                'temporary_password' => $temporaryPassword,
                            ]);
                        }
                    }

                    Mail::send('emails.student-account', [
                        'studentName' => $student->name,
                        'studentEmail' => $student->email,
                        'temporaryPassword' => $temporaryPassword,
                        'loginUrl' => route('login'),
                    ], function ($message) use ($student) {
                        $message->to($student->email, $student->name)
                            ->subject('Akun Murid NAWARA');
                    });

                    $item->update([
                        'status' => 'sent',
                        'email_sent_at' => now(),
                        'temporary_password' => null,
                        'error_message' => null,
                    ]);

                    $sent++;
                } catch (\Throwable $e) {
                    $item->update([
                        'status' => 'failed',
                        'error_message' => $e->getMessage(),
                    ]);
                }
            }

            $failed = $batch->items()->where('status', '!=', 'sent')->count();

            $batch->update([
                'status' => $failed === 0 ? 'completed' : 'partial',
            ]);

            return back()->with('finalize_result', [
                'created' => $created,
                'sent' => $sent,
                'message' => $failed === 0
                    ? 'Proses impor dan pengiriman email selesai.'
                    : "Proses selesai sebagian. Email belum terkirim: {$failed}. Batch dapat dicoba kembali.",
            ]);
        } catch (\Throwable $e) {
            $batch->update(['status' => 'partial']);

            return back()->with('finalize_result', [
                'created' => $created,
                'sent' => $sent,
                'message' => 'Proses terhenti karena kesalahan. Periksa status batch sebelum mencoba kembali.',
            ]);
        }
    }

}
