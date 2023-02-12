<?php
declare(strict_types=1);

namespace App\View\ViewVars;

use Illuminate\Database\Eloquent\Model;

class AdminSetterViewVars
{
    public function __construct(
        public ?string $header = null,
        public ?string $actionRoute = null,
        public ?Model $model = null,
        public ?array $data = null
    )
    {
    }
}
