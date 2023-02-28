<?php
declare(strict_types=1);

namespace App\View\Layouts;

use App\Http\Routes\Lists\AdminRouteList;
use App\Http\Routes\Lists\AdminRouteLists;
use App\Http\Routes\Menu\MenuRoute;
use Illuminate\View\View;

class AdminsLayoutView extends LayoutView
{
    public function __construct()
    {
    }

    public function render(string $viewPath, string $title = 'Неизвестно', ?array $data = []): View
    {
        $this->addCss('layouts/admin');
        $menuLists = $this->buildMenu();
        $viewVars = [
            'title' => $title,
            'cssLinks' => $this->cssLinks,
            'viewPath' => $viewPath,
            'data' => $data,
            'menuLists' => $menuLists
        ];
        return \view('layouts.admins.components.content', $viewVars);
    }

    private function buildMenu(): AdminRouteLists
    {
        $newsRouteList = new AdminRouteList('Новости');
        $newsRouteList->addRoute(new MenuRoute('admin/news/list', 'Список'));
        $newsRouteList->addRoute(new MenuRoute('admin/categories/list', 'Категории'));
        $newsRouteList->addRoute(new MenuRoute('admin/newsSources/list', 'Источники'));
        $otherRouteList = new AdminRouteList('Другое');
        $otherRouteList->addRoute(new MenuRoute('admin/reviews/list', 'Отзывы'));
        $otherRouteList->addRoute(new MenuRoute('admin/newsSourcesRequests/list', 'Запросы источников'));
        $otherRouteList->addRoute(new MenuRoute('admin/users/list', 'Пользователи'));
        $lists = new AdminRouteLists();
        $lists->addList($newsRouteList);
        $lists->addList($otherRouteList);
        $lists->setCurrentRoute();
        return $lists;
    }
}
