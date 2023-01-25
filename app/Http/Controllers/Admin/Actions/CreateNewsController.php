<?php

namespace App\Http\Controllers\Admin\Actions;

use App\Exceptions\NotFoundListException;
use App\Http\Controllers\AbstractControllers\AdminsController;
use App\Models\News\News;
use App\Providers\news\FakeNewsProvider;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CreateNewsController extends AdminsController
{

    public function __invoke(Request $request): View
    {
        try{
            $query = $request->query();
            $id = $this->list->getLastId() + 1;
            $creationDate = (new DateTime())->format('y-m-d');
            $news = new News($id, $query['header'], $query['description'],$creationDate, $query['text']);
            $this->list->addNews($query['category'], $news);
            return $this->view->render('admin.news.success', 'Успешно');
        }
        catch (NotFoundListException $exception) {
            return $this->view->render('admin.exception', 'ошибка', ['message'=> $exception->getMessage()]);
        }
    }
}
