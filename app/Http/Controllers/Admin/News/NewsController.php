<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\News;

use App\Exceptions\PageNotFoundException;
use App\Http\Controllers\AbstractControllers\AdminListController;
use App\Models\News\Category;
use App\Models\News\News;
use App\Models\News\NewsSource;
use App\QueryBuilders\NewsQueryBuilder;
use App\View\ViewVars\AdminListViewVars;
use App\View\ViewVars\AdminSetterViewVars;
use Illuminate\Http\Request;
use Illuminate\View\View;
use JetBrains\PhpStorm\ArrayShape;
use stdClass;

class NewsController extends AdminListController
{
    private string $setterPath = 'admin.setters.newsSetter';

    public function create(Request $request, AdminSetterViewVars $viewVars): View
    {
        $viewVars->header = 'Создание новости';
        $viewVars->data = $this->getNewsSetterData();

        $viewVars->model = new News($request->old());
        $viewVars->actionRoute = \route('admin/news/actions/create');
        return $this->renderSetter($this->setterPath, $viewVars);
    }

    public function getList(NewsQueryBuilder $builder, AdminListViewVars $viewVars): View
    {
        $viewVars->list = $builder->getAdminList();
        $viewVars->tableHeaders = [
            'Категория',
            'Заголовок',
            "описание",
            'Дата публикации',
        ];
        $viewVars->properties = [
            ['category', 'title'],
            'title',
            'description',
            'created_at'
        ];
        $viewVars->header = 'Список Новостей';
        $viewVars->routes = 'admin/news/';
        return $this->renderList($viewVars);
    }
    public function change(News $news, AdminSetterViewVars $viewVars): View
    {
        try{
            if(!$news->id) throw new PageNotFoundException();
        }
        catch (PageNotFoundException $exception) {
            return $this->render404();
        }
        $viewVars->header = 'Изменение новости';
        $viewVars->data = $this->getNewsSetterData();
        $viewVars->model = $news;
        $viewVars->actionRoute = \route('admin/news/actions/change', ['news' => $news->id]);
        return $this->renderSetter($this->setterPath, $viewVars);
    }
    #[ArrayShape(['categories' => "mixed", 'newsSources' => "mixed"])]
    private function getNewsSetterData(): array
    {
        $this->view->addCss('admin/news/news-changer');
        $categories = Category::all(['id', 'title']);
        $this->view->addCss('admin/news/news-setter');
        return [
            'categories' => $categories,
        ];
    }
}
