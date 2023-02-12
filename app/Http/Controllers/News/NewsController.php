<?php

namespace App\Http\Controllers\News;


use App\Exceptions\PageNotFoundException;
use App\Http\Controllers\AbstractControllers\UsersController;
use App\Models\News\Category;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\View\View;

class NewsController extends UsersController
{

    function getFreshNews(NewsQueryBuilder $builder): View
    {
        $description = \fake()->text();
        $list = $builder->getAll();
        return $this->view->render('news.freshNews', 'Новости', ['list' => $list, 'description' => $description]);
    }
    function getCategoryNews(string $category, NewsQueryBuilder $builder): View
    {
        try {
            $category = Category::query()->where('name', $category)->first(['id', 'description', 'title']);
            if(!$category) throw new PageNotFoundException();
            $list = $builder->getListByCategory($category->id);
            $this->view->addCss('news/categories');
            return $this->view->render('news.categoryList', $category->title, ['list'=>$list, 'category' => $category]);
        }
        catch (PageNotFoundException $exception) {
            return $this->view->render('404', 'Страница не найдена');
        }
    }
}
