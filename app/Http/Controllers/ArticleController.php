<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\View\View;
use App\Services\ArticleService;

class ArticleController extends Controller
{
    public function __construct(
        public ArticleService $articleService,
    ){}

    public function index(): View
    {
        return view('app.article.index', [
            'articles' => $this->articleService->getAllPaginate(['tags', 'state']),
        ]);
    }

    public function show(string $slug): View
    {
        return view('app.article.show', [
            'articles' => $this->articleService->getBySlug($slug, ['comments','tags', 'state'])
        ]);
    }

    public function allByTag(Tag $tag): View
    {
        return view('app.article.byTag',[
            'articles' => $this->articleService->getByTag($tag, ['tags', 'state']),
        ]);
    }
}
