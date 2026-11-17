<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('reports.index', compact('reports'));
    }    public function create()
    {
        return view('reports.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'bullying_type' => [
                'required',
                'in:verbal,fisik,sosial,siber,lainnya',
            ],
            'incident_description' => [
                'required',
                'string',
                'min:10',
                'max:5000',
            ],
            'incident_location' => [
                'nullable',
                'string',
                'max:255',
            ],
            'incident_date' => [
                'nullable',
                'date',
                'before_or_equal:today',
            ],
            'is_anonymous' => [
                'nullable',
                'boolean',
            ],
        ]);

        $isAnonymous = $request->boolean('is_anonymous');

        $report = Report::create([
            'user_id' => $isAnonymous ? null : $request->user()->id,
            'is_anonymous' => $isAnonymous,
            'report_code' => 'NWR-' . Str::upper(Str::random(8)),
            'bullying_type' => $validated['bullying_type'],
            'incident_description' => $validated['incident_description'],
            'incident_location' => $validated['incident_location'] ?? null,
            'incident_date' => $validated['incident_date'] ?? null,
            'status' => 'menunggu',
        ]);

        return redirect()
            ->route('murid.dashboard')
            ->with('success', 'Laporan berhasil dikirim. Kode laporan kamu: ' . $report->report_code);
    }
}
