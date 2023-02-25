<?php
declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Currency;
use App\QueryBuilders\Components\enums\OrderDirection;
use App\QueryBuilders\Components\OrderBy;
use Illuminate\Database\Eloquent\Collection;

class CurrenciesQueryBuilder extends QueryBuilder
{
    public function __construct()
    {
        $this->model = Currency::class;
        $this->defaultOrderBy = new OrderBy('id', OrderDirection::DESC);
    }

    function deleteRowsWhereNotInIds(array $ids): mixed {
        return $this->query()->whereNotIn('id', $ids)->delete();
    }

}
