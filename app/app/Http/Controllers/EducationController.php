<?php

namespace App\Http\Controllers;

use App\Models\AntiBullyingPledge;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $pledgeCount = AntiBullyingPledge::count();

        $hasPledged = $user->hasRole('murid')
            && AntiBullyingPledge::where('user_id', $user->id)->exists();

        return view('education.index', compact(
            'pledgeCount',
            'hasPledged'
        ));
    }

    public function pledge(Request $request)
    {
        abort_unless($request->user()->hasRole('murid'), 403);

        AntiBullyingPledge::firstOrCreate([
            'user_id' => $request->user()->id,
        ]);

        return back()->with('success', 'Terima kasih sudah berkomitmen menjadi Sahabat Tanpa Perundungan!');
    }
}
