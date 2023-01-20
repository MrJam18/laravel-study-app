<?php

namespace App\Http\Controllers\News;


use App\Exceptions\PageNotFoundException;
use App\Http\Controllers\Controller;
use App\Lists\NewsLists\AllNewsList;
use App\Providers\news\FakeNewsProvider;
use Illuminate\View\View;

class NewsController extends Controller
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
        $list = $this->newsList->sortByDate();
        return \view('news.freshNews', ['list' => $list]);
    }
    function getCategories(): View
    {
        $categories = $this->newsList->getCategoriesNames();
        return \view('news.categories', ['categories' => $categories]);
    }
    function getCategoryNews(string $category): View
    {
        try{
            $list = $this->newsList->getCategoryList($category);
            return \view('news.categoryList', ['list'=>$list]);
        }
        catch (PageNotFoundException $exception) {
            return \view('404');
        }
    }
}
