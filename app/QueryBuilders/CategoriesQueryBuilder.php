<?php
declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\News\Category;
use App\QueryBuilders\Components\enums\OrderDirection;
use App\QueryBuilders\Components\OrderBy;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class CategoriesQueryBuilder extends QueryBuilder
{
    public function __construct()
    {
        $this->model = Category::class;
        $this->defaultOrderBy = new OrderBy('created_at', OrderDirection::DESC);
    }

    function getColumns(array $columns): Collection
    {
        return $this->query()->get($columns);
    }
    function getAdminList(): LengthAwarePaginator
    {
        return $this->getOrdered()->paginate(10, ['id', 'name', 'title', 'created_at', 'updated_at']);
    }
}
