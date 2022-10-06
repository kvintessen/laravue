<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        $this->activeLinks();
    }

    public function  activeLinks(): void
    {
        View::composer('layouts.app', static function($view) {
            $view->with('mainLink', request()?->is('/') ? 'menu-link__active' : '');
            $view->with('articleLink', (request()?->is('articles') or request()?->is('articles/*')) ? 'menu-link__active' : '');
        });
    }
}
