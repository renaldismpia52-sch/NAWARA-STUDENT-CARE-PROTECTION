<?php

namespace App\Http\Controllers;

use App\Models\CharacterNote;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CharacterNoteController extends Controller
{
    public function index()
    {
        $notes = CharacterNote::where('user_id', Auth::id())
            ->with('counselor')
            ->latest()
            ->get();

        return view('character-notes.index', compact('notes'));
    }

    public function guruIndex()
    {
        $students = User::where('role', 'murid')->orderBy('name')->get();

        $notes = CharacterNote::with(['student', 'counselor'])
            ->latest()
            ->get();

        return view('guru-bk.character-notes.index', compact('students', 'notes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'category' => 'required|in:Kedisiplinan,Kesantunan,Kepedulian,Tanggung Jawab,Kejujuran,Lainnya',
            'note' => 'required|string|min:5|max:2000',
            'note_date' => 'nullable|date',
        ]);

        if (User::whereKey($validated['user_id'])->where('role', 'murid')->doesntExist()) {
            return back()->withErrors([
                'user_id' => 'Catatan hanya dapat diberikan kepada akun Murid.',
            ])->withInput();
        }

        CharacterNote::create([
            ...$validated,
            'counselor_id' => Auth::id(),
        ]);

        return back()->with('success', 'Catatan Adab & Akhlak berhasil disimpan.');
    }
}
