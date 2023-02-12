<?php
declare(strict_types=1);

namespace App\Http\Controllers\News;

use App\Exceptions\PageNotFoundException;
use App\Http\Controllers\AbstractControllers\UsersController;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\View\View;

class OneNewsController extends UsersController
{
    function index(string $id, NewsQueryBuilder $builder): View
    {
        try{
            if(!is_numeric($id)) throw new PageNotFoundException();
            $news = $builder->getOne(+$id);
            if(!$news) throw new PageNotFoundException();
            $this->view->addCss('news/one-news');
            return $this->view->render('news.oneNews', $news->title, ['news' => $news]);
        }
        catch (PageNotFoundException $exception)
        {
            return $this->view->render('404', 'страница не найдена');
        }

    }
}
