<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\SchoolSetting;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GuruBKController extends Controller
{
    public function index(): View
    {
        $totalReports = Report::count();
        $pendingReports = Report::where('status', 'menunggu')->count();

        $statusSummary = Report::selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->get();

        $recentReports = Report::latest()->take(5)->get();

        return view('guru-bk.dashboard', compact(
            'totalReports',
            'pendingReports',
            'statusSummary',
            'recentReports'
        ));
    }

    // Daftar Pengaduan: menampilkan seluruh laporan
    public function reports(Request $request): View
    {
        $filters = $request->validate([
            'search' => ['nullable', 'string', 'max:100'],
            'status' => ['nullable', 'in:menunggu,dalam_penanganan,selesai'],
            'type' => ['nullable', 'in:verbal,fisik,sosial,siber,lainnya'],
        ]);

        $reports = Report::with(['user', 'histories.user'])
            ->when($filters['search'] ?? null, function ($query, $search) {
                $query->where('report_code', 'like', '%' . $search . '%');
            })
            ->when($filters['status'] ?? null, function ($query, $status) {
                $query->where('status', $status);
            })
            ->when($filters['type'] ?? null, function ($query, $type) {
                $query->where('bullying_type', $type);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('guru-bk.reports.index', compact('reports', 'filters'));
    }

    // Tindak Lanjut: hanya laporan yang belum selesai
    public function followUps(Request $request): View
    {
        $filters = $request->validate([
            'search' => ['nullable', 'string', 'max:100'],
            'status' => ['nullable', 'in:menunggu,dalam_penanganan'],
            'type' => ['nullable', 'in:verbal,fisik,sosial,siber,lainnya'],
        ]);

        $reports = Report::with(['user', 'histories.user'])
            ->whereIn('status', ['menunggu', 'dalam_penanganan'])
            ->when($filters['search'] ?? null, function ($query, $search) {
                $query->where('report_code', 'like', '%' . $search . '%');
            })
            ->when($filters['status'] ?? null, function ($query, $status) {
                $query->where('status', $status);
            })
            ->when($filters['type'] ?? null, function ($query, $type) {
                $query->where('bullying_type', $type);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('guru-bk.reports.follow-ups', compact('reports', 'filters'));
    }

    // Unduh rekap PDF
    public function downloadPdf(Request $request)
    {
        $validated = $request->validate([
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
        ]);

        $reports = Report::with('histories.user')
            ->when($validated['start_date'] ?? null, function ($query, $date) {
                $query->whereDate('created_at', '>=', $date);
            })
            ->when($validated['end_date'] ?? null, function ($query, $date) {
                $query->whereDate('created_at', '<=', $date);
            })
            ->latest()
            ->get();

        $settings = SchoolSetting::first();

        $totalReports = $reports->count();
        $pendingReports = $reports->where('status', 'menunggu')->count();
        $inProgressReports = $reports->where('status', 'dalam_penanganan')->count();
        $completedReports = $reports->where('status', 'selesai')->count();

        $pdf = Pdf::loadView('guru-bk.reports.pdf', compact(
            'reports',
            'settings',
            'totalReports',
            'pendingReports',
            'inProgressReports',
            'completedReports',
            'validated'
        ))->setPaper('a4', 'landscape');

        return $pdf->download(
            'rekap-pengaduan-nawara-' . now()->format('Y-m-d') . '.pdf'
        );
    }

    // Memperbarui status dan catatan penanganan
    public function updateReport(Request $request, int $id)
    {
        $validated = $request->validate([
            'status' => ['required', 'in:menunggu,dalam_penanganan,selesai'],
            'handling_notes' => ['nullable', 'string', 'max:5000'],
        ]);

        $report = Report::findOrFail($id);
        $oldStatus = $report->status;

        $report->update($validated);

        \App\Models\ReportStatusHistory::create([
            'report_id' => $report->id,
            'user_id' => $request->user()->id,
            'old_status' => $oldStatus,
            'new_status' => $report->status,
            'handling_notes' => $validated['handling_notes'] ?? null,
        ]);

        return redirect()->to(url()->previous() . '#laporan-' . $report->id)
            ->with('success', 'Status dan riwayat penanganan berhasil disimpan.');
    }
}
