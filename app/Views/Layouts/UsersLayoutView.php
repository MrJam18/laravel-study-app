<?php
declare(strict_types=1);

namespace App\Views\Layouts;

use App\Http\Routes\Menu\MenuRoute;
use App\Http\Routes\Menu\RouteList;
use App\Http\Routes\Menu\UsersMenuRouteList;
use App\Views\Interfaces\LayoutsInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class UsersLayoutView implements LayoutsInterface
{
    private array $cssLinks;

    public function __construct(private Collection $categories)
    {
        $this->cssLinks = [];
        $this->addCss('layouts/users');
    }


    public function render(string $viewPath, string $title, ?array $data = []): View
    {
        $menuRoutes = new RouteList();
        $menuRoutes->addRoute(new MenuRoute('main', 'Главная'));
        $menuRoutes->addRoute(new MenuRoute('news', 'Новости'));
        $menuRoutes->addRoute(new MenuRoute('admin/index', 'Панель администратора'));
        $menuRoutes->addRoute(new MenuRoute('about/index', 'О нас'));
        $menuRoutes->setCurrentRoute();
        $viewVars = [
            'categories' => $this->categories,
            'viewPath' => $viewPath,
            'title' => $title,
            'data' => $data,
            'cssLinks' => $this->cssLinks,
            'menuRoutes' => $menuRoutes->get()
            ];
        return \view('layouts.users.components.content', $viewVars);
    }
    public function addCss(string $cssPath): void
    {
        $this->cssLinks[] = \asset('css' . DIRECTORY_SEPARATOR . $cssPath . '.css');
    }
}
