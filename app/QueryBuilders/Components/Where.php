<?php
declare(strict_types=1);

namespace App\QueryBuilders\Components;

use App\QueryBuilders\Components\enums\CompareOperator;

class Where
{


    public function __construct(
        public string $column,
        public string $value,
        public CompareOperator $operator = CompareOperator::Equals,
    )
    {
    }
}
