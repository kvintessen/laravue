<?php

namespace App\Http\ViewComposers;

use App\Services\ArticleService;
use Illuminate\Contracts\View\View;

class WelcomeArticle
{
    private const ARTICLE_COUNT = 6;
    private const ARTICLE_RELATIONS = [
        'tags',
        'state',
    ];

    public function __construct(
        private ArticleService $articleService,
    )
    {}

    public function compose(View $view): void
    {
        $view->with([
           'articles' => $this->articleService->getLastLimit(self::ARTICLE_COUNT, self::ARTICLE_RELATIONS),
        ]);
    }
}
