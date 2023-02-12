<?php
declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Review;
use App\QueryBuilders\Components\enums\OrderDirection;
use App\QueryBuilders\Components\OrderBy;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ReviewsQueryBuilder extends QueryBuilder
{
    public function __construct()
    {
        $this->model = Review::class;
        $this->defaultOrderBy = new OrderBy('reviews.created_at', OrderDirection::DESC);
    }
    function getAdminList(): LengthAwarePaginator
    {
        return $this->getOrdered()->
            paginate(20);
    }
}
