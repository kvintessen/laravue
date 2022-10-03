<?php

namespace App\Providers;

use App\Http\ViewComposers\WelcomeArticle;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        view()->composer('app.home', WelcomeArticle::class);
    }

    public function register(): void
    {}
}
