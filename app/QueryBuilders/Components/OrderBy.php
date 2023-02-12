<?php
declare(strict_types=1);

namespace App\QueryBuilders\Components;

use App\QueryBuilders\Components\enums\OrderDirection;

class OrderBy
{
    public function __construct(
        public string $column,
        public OrderDirection $direction
    )
    {
    }
}
