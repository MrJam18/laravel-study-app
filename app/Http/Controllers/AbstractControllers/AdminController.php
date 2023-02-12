<?php
declare(strict_types=1);

namespace App\Http\Controllers\AbstractControllers;

use App\Http\Controllers\Controller;
use App\View\Layouts\AdminsLayoutView;
use Illuminate\View\View;

abstract class AdminController extends Controller
{
    public function __construct(AdminsLayoutView $view)
    {
        $this->view = $view;
    }
    protected function render404(): View
    {
        return $this->view->render('404');
    }

}
