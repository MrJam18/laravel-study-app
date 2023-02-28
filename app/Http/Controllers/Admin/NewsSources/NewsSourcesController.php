<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\NewsSources;

use App\Exceptions\PageNotFoundException;
use App\Http\Controllers\AbstractControllers\AdminListController;
use App\Models\News\NewsSource;
use App\Models\NewsSourceRequest;
use App\QueryBuilders\NewsSourcesQueryBuilder;
use App\QueryBuilders\NewsSourcesRequestsQueryBuilder;
use App\View\ViewVars\AdminListViewVars;
use App\View\ViewVars\AdminSetterViewVars;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsSourcesController extends AdminListController
{
    private string $setterPath = 'admin.setters.newsSourcesSetter';

    public function create(Request $request, AdminSetterViewVars $viewVars): View
    {
        $viewVars->header = 'Создание Источника новостей';
        $viewVars->model = new NewsSource($request->old());
        $viewVars->actionRoute = \route('admin/newsSources/actions/create');
        return $this->renderSetter($this->setterPath, $viewVars);
    }

    public function getList(NewsSourcesQueryBuilder $builder, AdminListViewVars $viewVars): View
    {
        $viewVars->list = $builder->getAdminList();
        $viewVars->tableHeaders = [
            'id',
            'url',
            "создан",
            'обновлен',
        ];
        $viewVars->properties = [
            'id',
            'url',
            'created_at',
            'updated_at'
        ];
        $viewVars->header = 'Список источников';
        $viewVars->routes = 'admin/newsSources/';
        return $this->renderList($viewVars);
    }
    public function change(NewsSource $source, Request $request, AdminSetterViewVars $viewVars): View
    {
        try{
            if(!$source->exists) throw new PageNotFoundException();
        }
        catch (PageNotFoundException) {
            return $this->render404();
        }
        if(!\arrayEmpty($request->old())) $source = new NewsSource($request->old());
        $viewVars->header = 'Изменение источника новостей';
        $viewVars->model = $source;
        $viewVars->actionRoute = \route('admin/newsSources/actions/change', ['source' => $source->id]);
        return $this->renderSetter($this->setterPath, $viewVars);
    }
}
