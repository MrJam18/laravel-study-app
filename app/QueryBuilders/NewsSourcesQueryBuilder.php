<?php
declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\News\NewsSource;
use App\QueryBuilders\Components\enums\OrderDirection;
use App\QueryBuilders\Components\OrderBy;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class NewsSourcesQueryBuilder extends QueryBuilder
{
    public function __construct()
    {
        $this->model = NewsSource::class;
        $this->defaultOrderBy = new OrderBy('created_at', OrderDirection::DESC);
    }
    function getAdminList(): LengthAwarePaginator
    {
        return $this->getOrdered()->paginate();
    }
}
