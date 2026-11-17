<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolSetting;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SchoolSettingController extends Controller
{
    public function edit(): View
    {
        $settings = SchoolSetting::firstOrCreate(
            [],
            [
                'school_name' => 'SMP Islam Al Azhar 52 Bengkulu',
            ]
        );

        return view('admin.settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'school_name' => ['required', 'string', 'max:255'],
            'principal_name' => ['required', 'string', 'max:255'],
            'anti_bullying_coordinator_name' => ['required', 'string', 'max:255'],
        ]);

        $settings = SchoolSetting::firstOrCreate([]);
        $settings->update($validated);

        return back()->with(
            'success',
            'Identitas sekolah dan pejabat berhasil diperbarui.'
        );
    }
}
