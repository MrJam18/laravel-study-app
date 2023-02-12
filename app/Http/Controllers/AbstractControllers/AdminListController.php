<?php
declare(strict_types=1);

namespace App\Http\Controllers\AbstractControllers;

use App\View\ViewVars\AdminListViewVars;
use App\View\ViewVars\AdminSetterViewVars;
use Illuminate\View\View;

abstract class AdminListController extends AdminController
{
    protected function renderList(
        AdminListViewVars $viewVars): View
    {
        return $this->view->render('admin.list', $viewVars->header, ['vars' =>$viewVars]);
    }
    protected function renderSetter(string $viewPath,
                                    AdminSetterViewVars $viewVars): View
    {
        $this->view->addCss('admin/setter');
        return $this->view->render($viewPath, $viewVars->header, ['vars' => $viewVars]);
    }
}
