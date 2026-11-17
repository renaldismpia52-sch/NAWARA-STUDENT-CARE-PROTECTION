<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultationController extends Controller
{
    public function index()
    {
        $consultations = Consultation::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('consultations.index', compact('consultations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'topic' => 'required|in:Akademik,Pribadi,Sosial,Perundungan,Keluarga,Lainnya',
            'message' => 'required|string|min:10|max:3000',
        ]);

        Consultation::create([
            'user_id' => Auth::id(),
            'topic' => $validated['topic'],
            'message' => $validated['message'],
            'status' => 'menunggu',
        ]);

        return redirect()->route('consultations.index')
            ->with('success', 'Permintaan konsultasi berhasil dikirim.');
    }

    public function guruIndex()
    {
        $consultations = Consultation::with('student')
            ->latest()
            ->get();

        return view('guru-bk.consultations.index', compact('consultations'));
    }

    public function update(Request $request, Consultation $consultation)
    {
        $validated = $request->validate([
            'status' => 'required|in:menunggu,diproses,selesai',
            'response' => 'nullable|string|max:3000',
        ]);

        $consultation->update([
            'status' => $validated['status'],
            'response' => $validated['response'] ?? null,
            'counselor_id' => Auth::id(),
        ]);

        return redirect()->route('guru-bk.consultations.index')
            ->with('success', 'Tindak lanjut konsultasi berhasil disimpan.');
    }
}
