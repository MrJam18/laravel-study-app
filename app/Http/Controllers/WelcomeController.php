<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AbstractControllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WelcomeController extends UsersController
{
    function index(Request $request): View
    {
        $list = [];
        foreach ($this->list->get() as $item)
            {
               $list[] = $item->getOneFreshestNews();
            }
        $first = array_shift($list);
        $this->view->addCss('welcome');
        return $this->view->render('welcome', 'Главная',
            ['list' => $list, 'first' => $first, 'alert' => $request->query('alert')]);
    }
}
