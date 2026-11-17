<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('stories.index', compact('stories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:150',
            'content' => 'required|string|max:5000',
            'is_anonymous' => 'nullable|boolean',
        ]);

        Story::create([
            'user_id' => auth()->id(),
            'title' => $validated['title'] ?? null,
            'content' => $validated['content'],
            'is_anonymous' => $request->boolean('is_anonymous'),
        ]);

        return redirect()
            ->route('murid.stories.index')
            ->with('success', 'Cerita berhasil dikirim.');
    }
}
