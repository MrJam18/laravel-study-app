<?php

namespace App\Http\Controllers\News;


use App\Exceptions\PageNotFoundException;
use App\Http\Controllers\AbstractControllers\UsersController;
use Illuminate\View\View;

class NewsController extends UsersController
{

    function getFreshNews(): View
    {
        $description = \fake()->text();
        $list = $this->list->getAllSortedNews();
        return $this->view->render('news.freshNews', 'Новости', ['list' => $list, 'description' => $description]);
    }
    function getCategoryNews(string $category): View
    {
        try {
            $list = $this->list->getCategoryList($category);
            $this->view->addCss('news/categories');
            return $this->view->render('news.categoryList', $list->getCategoryName(), ['list'=>$list]);
        }
        catch (PageNotFoundException $exception) {
            return $this->view->render('404', '404');
        }
    }
}
