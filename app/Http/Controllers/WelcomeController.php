<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AbstractControllers\UsersController;
use Illuminate\View\View;

class WelcomeController extends UsersController
{
    function index(): View
    {
        $list = [];
        foreach ($this->list->get() as $item)
            {
               $list[] = $item->getOneFreshestNews();
            }
        $first = array_shift($list);
        $this->view->addCss('welcome');
        return $this->view->render('welcome', 'Главная',
            ['list' => $list, 'first' => $first]);
    }
}
