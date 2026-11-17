<?php

namespace App\Http\Controllers\GuruBK;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class StudentVerificationController extends Controller
{
    public function index(): View
    {
        $students = User::where('role', 'murid')
            ->where('verification_status', 'pending')
            ->latest()
            ->get();

        return view('guru-bk.student-verification.index', compact('students'));
    }

    public function approve(User $user): RedirectResponse
    {
        abort_unless($user->isMurid(), 404);
        abort_unless($user->verification_status === 'pending', 404);

        $user->update([
            'verification_status' => 'approved',
            'verified_by' => auth()->id(),
            'verified_at' => now(),
        ]);

        return back()->with('success', 'Pendaftaran Murid berhasil disetujui.');
    }

    public function bulkApprove(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'student_ids' => ['required', 'array', 'min:1'],
            'student_ids.*' => ['required', 'integer', 'distinct', 'exists:users,id'],
        ]);

        $count = DB::table('users')
            ->whereIn('id', $validated['student_ids'])
            ->where('role', 'murid')
            ->where('verification_status', 'pending')
            ->update([
                'verification_status' => 'approved',
                'verified_by' => auth()->id(),
                'verified_at' => now(),
            ]);

        return back()->with('success', $count . ' pendaftaran Murid berhasil disetujui.');
    }

    public function reject(User $user): RedirectResponse
    {
        abort_unless($user->isMurid(), 404);
        abort_unless($user->verification_status === 'pending', 404);

        $user->update([
            'verification_status' => 'rejected',
            'verified_by' => auth()->id(),
            'verified_at' => now(),
        ]);

        return back()->with('success', 'Pendaftaran Murid ditolak.');
    }
}
