<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Violation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViolationController extends Controller
{
    public function index()
    {
        $violations = Violation::where('user_id', Auth::id())
            ->with('counselor')
            ->latest('incident_date')
            ->get();

        $totalPoints = $violations->sum('points');

        return view('violations.index', compact('violations', 'totalPoints'));
    }

    public function guruIndex()
    {
        $students = User::where('role', 'murid')
            ->orderBy('name')
            ->get();

        $violations = Violation::with(['student', 'counselor'])
            ->latest('incident_date')
            ->get();

        return view('guru-bk.violations.index', compact('students', 'violations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:150',
            'severity' => 'required|in:ringan,sedang,berat',
            'points' => 'required|integer|min:1|max:100',
            'description' => 'nullable|string|max:2000',
            'guidance_notes' => 'nullable|string|max:2000',
            'incident_date' => 'required|date',
        ]);

        if (User::whereKey($validated['user_id'])
            ->where('role', 'murid')
            ->doesntExist()) {
            return back()->withErrors([
                'user_id' => 'Catatan hanya dapat dibuat untuk akun Murid.'
            ])->withInput();
        }

        Violation::create([
            ...$validated,
            'counselor_id' => Auth::id(),
        ]);

        return back()->with('success', 'Catatan pelanggaran dan pembinaan berhasil disimpan.');
    }

    public function destroy(Violation $violation)
    {
        abort_unless(Auth::user()->role === 'guru_bk', 403);

        $violation->delete();

        return back()->with('success', 'Catatan pelanggaran berhasil dihapus.');
    }
}
