<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class GuruBKStoryController extends Controller
{
    public function index()
    {
        $stories = Story::with('user')->where('counselor_id', auth()->id())->latest()->get();

        return view('guru-bk.stories.index', compact('stories'));
    }

    public function reply(Request $request, int $id)
    {
        $validated = $request->validate([
            'counselor_reply' => 'required|string|max:5000',
        ]);

        $story = Story::where('counselor_id', auth()->id())->findOrFail($id);

        $story->update([
            'counselor_reply' => $validated['counselor_reply'],
            'status' => 'dibalas',
            'replied_at' => now(),
        ]);

        return back()->with('success', 'Balasan berhasil dikirim.');
    }
}
