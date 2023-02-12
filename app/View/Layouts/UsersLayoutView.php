<?php
declare(strict_types=1);

namespace App\View\Layouts;

use App\Http\Routes\Lists\RouteList;
use App\Http\Routes\Menu\MenuRoute;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class UsersLayoutView extends LayoutView
{
    public function __construct(private Collection $categories)
    {
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
}
