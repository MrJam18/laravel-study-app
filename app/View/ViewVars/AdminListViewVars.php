<?php
declare(strict_types=1);

namespace App\View\ViewVars;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AdminListViewVars
{
    public function __construct(
        public ?LengthAwarePaginator $list = null,
        public ?string $header = null,
        public ?array $tableHeaders = null,
        public ?array $properties = null,
        public ?string $routes = null
    )
    {
    }
}
