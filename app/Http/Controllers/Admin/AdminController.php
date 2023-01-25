<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AbstractControllers\AdminsController;
use Illuminate\View\View;

class AdminController extends AdminsController
{
    public function index(): View
    {
        return $this->view->render('admin.index', 'Панель администратора');
    }
    public function inDev(): View
    {
        return $this->view->render('inDev', 'В разработке');
    }
}
