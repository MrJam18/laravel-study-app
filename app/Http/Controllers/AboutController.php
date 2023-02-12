<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\AbstractControllers\UsersController;
use App\Models\NewsSourceRequest;
use App\Models\Review;
use App\View\ViewVars\AdminSetterViewVars;
use Illuminate\View\View;
use Illuminate\Http\Request;

class AboutController extends UsersController
{
    function index(): View
    {
        $this->view->addCss('about/index');
        return $this->view->render('about.index', 'О нас');
    }
    function review(Request $request, AdminSetterViewVars $viewVars): View
    {
        $viewVars->model = new Review($request->old());
        $viewVars->actionRoute = \route('about/createReview');
        $viewVars->header = 'Оставьте отзыв о нас';
        return $this->view->render('admin/setters/reviewsSetter', 'Оставьте отзыв о нас', ['vars' => $viewVars]);
    }
    function newsSourceRequest(Request $request, AdminSetterViewVars $viewVars): View
    {
       $viewVars->actionRoute = \route('about/createNewsSourceRequest');
       $viewVars->model = new NewsSourceRequest($request->old());
       $viewVars->header = 'Запрос на выгрузку источника новостных данных';
       $this->view->addCss('admin/setter');
       return $this->view->render('admin/setters/newsSourcesRequestsSetter', $viewVars->header, ['vars' => $viewVars]);
    }
}
