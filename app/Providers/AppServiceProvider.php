<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Middleware\Authenticate; // 🔥 IMPORTANTE

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Authenticate::redirectUsing(function ($request) {
            return route('meulogin');
        });
    }
}