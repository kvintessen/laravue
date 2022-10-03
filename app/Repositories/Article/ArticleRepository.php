<?php

namespace App\Repositories\Article;

use App\Models\Tag;
use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ArticleRepository
{
    public function getLastLimit(int $count, array $relations): Collection;

    public function getBySlug(string $slug, array $relations): ?Article;

    public function getByTag(Tag $tag, array $relations): LengthAwarePaginator;

    public function getAllPaginate(array $relations): LengthAwarePaginator;
}
