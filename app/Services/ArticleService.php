<?php

namespace App\Services;

use App\Models\Tag;
use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Article\ArticleRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ArticleService
{
    public function __construct(
        private ArticleRepository $articleRepository,
    ){}

    public function getLastLimit(int $count, array $relations): Collection
    {
        return $this->articleRepository->getLastLimit($count, $relations);
    }

    public function getBySlug(string $slug, array $relations): ?Article
    {
        return $this->articleRepository->getBySlug($slug, $relations);
    }

    public function getByTag(Tag $tag, array $relations): LengthAwarePaginator
    {
        return $this->articleRepository->getByTag($tag, $relations);
    }

    public function getAllPaginate(array $relations): LengthAwarePaginator
    {
        return $this->articleRepository->getAllPaginate($relations);
    }
}
