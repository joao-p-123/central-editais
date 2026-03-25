<?php

namespace App\Providers;

use App\Models\Edital;
use App\Policies\EditalPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Gate::policy(Edital::class, EditalPolicy::class);
    }
}