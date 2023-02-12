<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AbstractControllers\UsersController;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WelcomeController extends UsersController
{
    function index(Request $request, NewsQueryBuilder $builder): View
    {
        $list = $builder->getFirstFreshestNewsInCategories();
        $first = $list->shift();
        $this->view->addCss('welcome');
        return $this->view->render('welcome', 'Главная',
            ['list' => $list, 'first' => $first, 'alert' => $request->query('alert')]);
    }
}
