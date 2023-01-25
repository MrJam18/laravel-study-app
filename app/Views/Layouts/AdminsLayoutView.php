<?php
declare(strict_types=1);

namespace App\Views\Layouts;

use App\Http\Routes\Menu\AdminsRouteList;
use App\Http\Routes\Menu\MenuRoute;
use App\Views\Interfaces\LayoutsInterface;
use Illuminate\View\View;

class AdminsLayoutView implements LayoutsInterface
{
    private array $cssLinks;
    public function __construct()
    {
        $this->cssLinks = [];
        $this->addCss('layouts/admin');
    }

    public function render(string $viewPath, string $title = 'Неизвестно', ?array $data = []): View
    {
        $newsRouteList = new AdminsRouteList('Новости');
        $newsRouteList->addRoute(new MenuRoute('admin/createNews', 'Создать'));
        $newsRouteList->addRoute(new MenuRoute('admin/deleteNews', 'Удалить'));
        $newsRouteList->addRoute(new MenuRoute('admin/changeNews', 'Изменить'));
        $otherRouteList = new AdminsRouteList('Другое');
        $otherRouteList->addRoute(new MenuRoute('admin/other1', 'Другое1'));
        $otherRouteList->addRoute(new MenuRoute('admin/other2', 'Другое2'));
        $newsRouteList->setCurrentRoute();
        $otherRouteList->setCurrentRoute();
        $menuLists = [
          $newsRouteList,
          $otherRouteList
        ];
        $viewVars = [
            'title' => $title,
            'cssLinks' => $this->cssLinks,
            'viewPath' => $viewPath,
            'data' => $data,
            'menuLists' => $menuLists
        ];
        return \view('layouts.admins.components.content', $viewVars);
    }

    public function addCss(string $cssPath): void
    {
        $this->cssLinks[] = \asset('css' . DIRECTORY_SEPARATOR . $cssPath . '.css');
    }
}
