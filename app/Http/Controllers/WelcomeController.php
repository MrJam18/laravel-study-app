<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AbstractControllers\UsersController;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class WelcomeController extends UsersController
{
    function index(Request $request): View
    {
        $list = [];
        for ($i = 1; $i < 6; $i++)
            {
               $list[] = DB::table('news')
                ->join('categories', 'news.category_id', '=', 'categories.id')
                   ->where('news.category_id', $i)
                   ->orderBy('news.created_at', 'desc')
                   ->first(['news.id', DB::raw("date_format(news.created_at, '%d.%m.%Y') as created_at") , 'news.title', 'news.description', 'categories.title as category']);
            }
        usort($list, function ($a, $b) {
           if (new DateTime($a->created_at) < new DateTime($b->created_at)) return 1;
           else return -1;
        });
        $first = array_shift($list);
        $this->view->addCss('welcome');
        return $this->view->render('welcome', 'Главная',
            ['list' => $list, 'first' => $first, 'alert' => $request->query('alert')]);
    }
}
