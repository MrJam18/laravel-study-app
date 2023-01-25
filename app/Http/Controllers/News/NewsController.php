<?php

namespace App\Http\Controllers\News;


use App\Exceptions\PageNotFoundException;
use App\Http\Controllers\AbstractControllers\UsersController;
use App\Http\Controllers\Controller;
use App\Lists\NewsLists\AllNewsList;
use App\Providers\news\FakeNewsProvider;
use App\Views\Layouts\UsersLayoutView;
use Illuminate\View\View;

class NewsController extends UsersController
{
    private AllNewsList $newsList;

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();
        $fakeNews = new FakeNewsProvider();
        $this->newsList = $fakeNews->getList();
    }

    function getFreshNews(): View
    {
        $description = \fake()->text();
        $list = $this->list->getAllSortedNews();
        return $this->view->render('news.freshNews', 'Новости', ['list' => $list, 'description' => $description]);
    }
    function getCategoryNews(string $category): View
    {
        try {
            $list = $this->newsList->getCategoryList($category);
            $this->view->addCss('news/categories');
            return $this->view->render('news.categoryList', $list->getCategoryName(), ['list'=>$list]);
        }
        catch (PageNotFoundException $exception) {
            return $this->view->render('404', '404');
        }
    }
}
