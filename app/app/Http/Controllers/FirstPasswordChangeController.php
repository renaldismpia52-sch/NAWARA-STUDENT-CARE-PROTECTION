<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class FirstPasswordChangeController extends Controller
{
    public function show(): View
    {
        return view('auth.first-password-change');
    }
}
