<?php

namespace App\Http\Controllers\News;


use App\Exceptions\PageNotFoundException;
use App\Http\Controllers\AbstractControllers\UsersController;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class NewsController extends UsersController
{

    function getFreshNews(): View
    {
        $description = \fake()->text();
        $list = DB::table('news')
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->orderBy('news.created_at', 'desc')
            ->get(['news.id', DB::raw("date_format(news.created_at, '%d.%m.%Y') as created_at") , 'news.title', 'news.description', 'categories.title as category']);
        return $this->view->render('news.freshNews', 'Новости', ['list' => $list, 'description' => $description]);
    }
    function getCategoryNews(string $category): View
    {
        try {
            $DBCategory = DB::table('categories')
                ->where('name', $category)
                ->first(['title', 'description', 'id']);
            $list = DB::table('news')
                ->orderBy('news.created_at', 'desc')
                ->get(['news.id', DB::raw("date_format(news.created_at, '%d.%m.%Y') as created_at") , 'news.title', 'news.text']);
            $this->view->addCss('news/categories');
            return $this->view->render('news.categoryList', $category, ['list'=>$list, 'category' => $DBCategory]);
        }
        catch (PageNotFoundException $exception) {
            return $this->view->render('404', '404');
        }
    }
}
