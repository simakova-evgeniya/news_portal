<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class NewsQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
{
    $this->model = News::query();
}

public function getNewsByStatus(string $status): Collection
{
    return News::query()->where('status',$status)->get();

}

public function getNewsWithPagination(int $quanyity = 10): LengthAwarePaginator
{
    return $this->model->with('categories')->paginate($quanyity);
}

function getAll(): Collection
{
    return News::query()->get();
}
}