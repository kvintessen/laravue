<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

abstract class DbRepository
{
    public function __construct(
        protected Model|Builder $model,
    ){}

    public function getById(int $id): Model
    {
        return $this->model->find($id);
    }

    public function getAll(): Collection
    {
        return $this->model::all();
    }

    public function getAllByFilter(
        array $filters = [],
        array $relations = [],
        int $limit = 0,
        int $skip = 0,
        string $sort = null,
        string $sortBy = 'asc',
        int $chunk = 0,
    ): Collection {
        $query = $this->model::query();
        $query = $this->applyFilters($query, $filters);

        $relations && $query->with($relations);
        $limit && $query->limit($limit);
        $skip && $query->skip($limit);
        $sort && $query->orderBy($sort, $sortBy);

        return $chunk ? $query->get()->chunk($chunk) : $query->get();
    }

    private function applyFilters(Builder $query, array $filters): Builder
    {
        foreach ($filters as $filter) {
            if ($filter[1] === 'in') {
                $query->whereIn($filter[0], $filter[2]);
                continue;
            }

            $query->where(...$filter);
        }

        return $query;
    }
}
