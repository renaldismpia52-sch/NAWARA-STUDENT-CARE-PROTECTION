<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::where('user_id', Auth::id())
            ->with('counselor')
            ->latest()
            ->get();

        $totalPoints = $achievements->sum('points');

        return view('achievements.index', compact('achievements', 'totalPoints'));
    }

    public function guruIndex()
    {
        $students = User::where('role', 'murid')->orderBy('name')->get();

        $achievements = Achievement::with(['student', 'counselor'])
            ->latest()
            ->get();

        return view('guru-bk.achievements.index', compact('students', 'achievements'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:150',
            'description' => 'nullable|string|max:2000',
            'points' => 'required|integer|min:1|max:100',
            'achievement_date' => 'nullable|date',
        ]);

        if (User::whereKey($validated["user_id"])->where("role", "murid")->doesntExist()) {
            return back()->withErrors(["user_id" => "Prestasi hanya dapat diberikan kepada akun Murid."])->withInput();
        }

        Achievement::create([
            ...$validated,
            'counselor_id' => Auth::id(),
        ]);

        return back()->with('success', 'Prestasi dan poin Murid berhasil dicatat.');
    }

    public function destroy(Achievement $achievement)
    {
        abort_unless(Auth::user()->role === "guru_bk", 403);
        $achievement->delete();

        return back()->with('success', 'Catatan prestasi berhasil dihapus.');
    }
}
