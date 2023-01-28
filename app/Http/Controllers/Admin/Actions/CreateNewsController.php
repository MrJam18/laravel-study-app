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
            $data = $request->all();
            $id = $this->list->getLastId() + 1;
            $creationDate = (new DateTime())->format('y-m-d');
            $news = new News($id, $data['header'], $data['description'],$creationDate, $data['text']);
            $this->list->addNews($data['category'], $news);
            return $this->view->render('admin.news.success', 'Успешно');
        }
        catch (NotFoundListException $exception) {
            return $this->view->render('admin.exception', 'ошибка', ['message'=> $exception->getMessage()]);
        }
    }
}
