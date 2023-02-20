<?php
declare(strict_types=1);

namespace App\Http\Routes;

use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;

class RoutersHandler
{
    public function __construct(private string $folderPath)
    {
    }
    function add(string $name, ?string $middleware = null): RouteRegistrar
    {
        $route = Route::prefix($name)
            ->name($name . '/');
        if ($middleware) $route->middleware($middleware);
        $route->group(\getRouterPath($this->folderPath . DIRECTORY_SEPARATOR . $name));
        return $route;
    }
}
