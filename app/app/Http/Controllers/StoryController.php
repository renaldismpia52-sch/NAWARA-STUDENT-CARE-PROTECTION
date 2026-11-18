<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\User;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::where('user_id', auth()->id())
            ->latest()
            ->get();

        $counselors = User::all()
            ->filter(fn ($user) => $user->isGuruBK()
                && in_array($user->gender, ['male', 'female'], true))
            ->values();

        return view('stories.index', compact('stories', 'counselors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'counselor_id' => 'required|integer|exists:users,id',
            'title' => 'nullable|string|max:150',
            'content' => 'required|string|max:5000',
            'is_anonymous' => 'nullable|boolean',
        ]);

        $counselor = User::findOrFail($validated['counselor_id']);

        if (
            !$counselor->isGuruBK()
            || !in_array($counselor->gender, ['male', 'female'], true)
        ) {
            return back()
                ->withErrors(['counselor_id' => 'Pilih Guru BK yang valid.'])
                ->withInput();
        }

        Story::create([
            'user_id' => auth()->id(),
            'counselor_id' => $counselor->id,
            'title' => $validated['title'] ?? null,
            'content' => $validated['content'],
            'is_anonymous' => $request->boolean('is_anonymous'),
        ]);

        return redirect()
            ->route('murid.stories.index')
            ->with('success', 'Cerita berhasil dikirim.');
    }

}
