<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct(
        private ArticleService $articleService
    ){}

    public function show(string $slug): ArticleResource
    {
        $article = $this->articleService->getBySlug($slug, ['comments','tags', 'state']);

        return new ArticleResource($article);
    }
}
