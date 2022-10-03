<?php

namespace App\Providers;

use App\Repositories\Article\ArticleRepository;
use App\Repositories\Article\DbArticleRepository;
use Illuminate\Support\ServiceProvider;

class ArticleRepositoryServiceProvider extends ServiceProvider
{
    public function boot(): void
    {}

    public function register(): void
    {
        $this->app->bind(ArticleRepository::class, DbArticleRepository::class);
    }
}
