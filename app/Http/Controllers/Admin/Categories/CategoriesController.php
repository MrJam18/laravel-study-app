<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\AbstractControllers\AdminListController;
use App\Models\News\Category;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\View\ViewVars\AdminListViewVars;
use App\View\ViewVars\AdminSetterViewVars;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoriesController extends AdminListController
{
    private string $setterPath = 'admin.setters.categoriesSetter';
    function getList(CategoriesQueryBuilder $builder, AdminListViewVars $viewVars): View
    {
        $viewVars->list = $builder->getAdminList();
        $viewVars->tableHeaders = [
            'Имя',
            'Заголовок',
            'Дата создания',
            'Дата обновления'
        ];
        $viewVars->properties = [
            'name',
            'title',
            'created_at',
            'updated_at'
        ];
        $viewVars->header = 'Список категорий';
        $viewVars->routes = 'admin/categories/';
        return $this->renderList($viewVars);
    }
    function change(Category $category, AdminSetterViewVars $viewVars): View
    {
        $viewVars->header = 'Изменение категории';
        $viewVars->actionRoute =  \route('admin/categories/actions/change', ['category' => $category->id]);
        $viewVars->model = $category;
        return $this->renderSetter($this->setterPath, $viewVars);
    }
    function create(Request $request, AdminSetterViewVars $viewVars): View
    {
        $viewVars->header = 'Создание категории';
        $viewVars->actionRoute = \route('admin/categories/actions/create');
        $viewVars->model = new Category($request->old());
        return $this->renderSetter($this->setterPath, $viewVars);
    }
}
