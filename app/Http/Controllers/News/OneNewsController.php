<?php
declare(strict_types=1);

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Lists\NewsLists\AllNewsList;
use App\Providers\news\FakeNewsProvider;
use Illuminate\View\View;

class OneNewsController extends Controller
{
    private AllNewsList $list;
    public function __construct()
    {
        parent::__construct();
        $fakeNews = new FakeNewsProvider();
        $this->list = $fakeNews->getList();
    }

    function index(string $id): View
    {
        if(!is_numeric($id)) return \view('404');
        $id = +$id;
        $news = $this->list->findById($id);
        if(!$news) return \view('404');
        return \view('news.oneNews', ['news'=> $news]);
    }
}
