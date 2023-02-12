<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\NewsSourcesRequests;

use App\Exceptions\PageNotFoundException;
use App\Http\Controllers\AbstractControllers\AdminListController;
use App\Models\NewsSourceRequest;
use App\QueryBuilders\NewsSourcesRequestsQueryBuilder;
use App\View\ViewVars\AdminListViewVars;
use App\View\ViewVars\AdminSetterViewVars;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsSourcesRequestsController extends AdminListController
{
    private string $setterPath = 'admin.setters.newsSourcesRequestsSetter';

    public function create(Request $request, AdminSetterViewVars $viewVars): View
    {
        $viewVars->header = 'Создание запроса на источник новостей';
        $viewVars->model = new NewsSourceRequest($request->old());
        $viewVars->actionRoute = \route('admin/newsSourcesRequests/actions/create');
        return $this->renderSetter($this->setterPath, $viewVars);
    }

    public function getList(NewsSourcesRequestsQueryBuilder $builder, AdminListViewVars $viewVars): View
    {
        $viewVars->list = $builder->getAdminList();
        $viewVars->tableHeaders = [
            'Имя заказчика',
            'Телефон',
            "Описание",
            'Опубликовано',
        ];
        $viewVars->properties = [
            'name',
            'phone',
            'description',
            'created_at'
        ];
        $viewVars->header = 'Список запросов источников';
        $viewVars->routes = 'admin/newsSourcesRequests/';
        return $this->renderList($viewVars);
    }
    public function change(NewsSourceRequest $sourceRequest, AdminSetterViewVars $viewVars): View
    {
        try{
            if(!$sourceRequest->id) throw new PageNotFoundException();
        }
        catch (PageNotFoundException) {
            return $this->render404();
        }
        $viewVars->header = 'Изменение запроса на источник новостей';
        $viewVars->model = $sourceRequest;
        $viewVars->actionRoute = \route('admin/newsSourcesRequests/actions/change', ['sourceRequest' => $sourceRequest->id]);
        return $this->renderSetter($this->setterPath, $viewVars);
    }
}
