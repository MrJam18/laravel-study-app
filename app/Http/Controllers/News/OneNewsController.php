<?php
declare(strict_types=1);

namespace App\Http\Controllers\News;

use App\Http\Controllers\AbstractControllers\UsersController;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class OneNewsController extends UsersController
{
    function index(string $id): View
    {
        if(!is_numeric($id)) return \view('404');
        $news = DB::table('news')->find($id, ['title', 'description', DB::raw("date_format(news.created_at, '%d.%m.%Y') as created_at"), 'text']);
        if(!$news) return $this->view->render('404', 'страница не найдена');
        $this->view->addCss('news/one-news');
        return $this->view->render('news.oneNews', $news->title, ['news' => $news]);
    }
}
