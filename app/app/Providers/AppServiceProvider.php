<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        URL::forceRootUrl('https://opulent-robot-4gwv97vgp7w37w4v-8001.app.github.dev');
        URL::forceScheme('https');
    }
}
