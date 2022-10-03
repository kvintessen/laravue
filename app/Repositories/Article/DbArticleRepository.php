<?php

namespace App\Repositories\Article;

use App\Models\Tag;
use App\Models\Article;
use App\Repositories\DbRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class DbArticleRepository extends DbRepository implements ArticleRepository
{
    private const DEFAULT_PER_PAGE = 10;

    public function __construct(Article $model)
    {
        parent::__construct($model);
    }

    public function getLastLimit(int $count, array $relations): Collection
    {
        return $this->getAllByFilter(
            relations: $relations,
            limit: $count,
            sort: Article::FIELD_CREATED_AT,
            sortBy: 'desc'
        );
    }

    public function getBySlug(string $slug, array $relations): ?Article
    {
        return $this->getAllByFilter(
            filters: [[Article::FIELD_SLUG, $slug]],
            relations: $relations,
        )->firstOrFail();
    }

    public function getByTag(Tag $tag, array $relations): LengthAwarePaginator
    {
       return $tag->articles()
           ->with($relations)
           ->orderBy(Article::FIELD_CREATED_AT, 'DESC')
           ->paginate(self::DEFAULT_PER_PAGE);
    }

    public function getAllPaginate(array $relations): LengthAwarePaginator
    {
        return $this->model
            ->with($relations)
            ->orderBy('created_at', 'desc')
            ->paginate(self::DEFAULT_PER_PAGE);
    }
}
