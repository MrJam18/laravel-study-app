<?php
declare(strict_types=1);

namespace App\Http\Routes\Menu;

use Illuminate\Support\Facades\Route;

class RouteList
{
    /**
     * @var MenuRoute[]
     */
    protected array $list;

    public function __construct()
    {
        $this->list = [];
    }

    function addRoute(MenuRoute $route): void
    {
        $this->list[] = $route;
    }

    function setCurrentRoute(): void
    {
        $currentRoute = Route::currentRouteName();
        foreach ($this->list as $route)
        {
            if($route->getName() === $currentRoute) {
                $route->isCurrentRoute = true;
                break;
            }
        }
    }
    function get(): array
    {
        return $this->list;
    }
}
