<?php
declare(strict_types=1);

namespace App\Http\Controllers\News;

use App\Http\Controllers\AbstractControllers\UsersController;
use Illuminate\View\View;

class OneNewsController extends UsersController
{
    function index(string $id): View
    {
        if(!is_numeric($id)) return \view('404');
        $id = +$id;
        $news = $this->list->findById($id);
        if(!$news) return \view('404');
        $this->view->addCss('news/one-news');
        return $this->view->render('news.oneNews', $news->getHeader(), ['news' => $news]);
    }
}
