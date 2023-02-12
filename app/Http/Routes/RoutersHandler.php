<?php
declare(strict_types=1);

namespace App\Http\Routes;

use Illuminate\Support\Facades\Route;

class RoutersHandler
{
    public function __construct(private string $folderPath)
    {
    }
    function add(string $name): void {
        Route::prefix($name)
            ->name($name . '/')
            ->group(\getRouterPath($this->folderPath . DIRECTORY_SEPARATOR . $name));
    }
}
