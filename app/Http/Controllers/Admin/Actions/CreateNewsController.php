<?php

namespace App\Http\Controllers\Admin\Actions;

use App\Exceptions\NotFoundListException;
use App\Http\Controllers\AbstractControllers\AdminsController;
use App\Models\News\News;
use App\Providers\news\FakeNewsProvider;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CreateNewsController extends AdminsController
{

    public function __invoke(Request $request): View
    {
        try{
            $news = $request->except(['_token']);
            $news['created_at'] = \date('Y-m-d');
            DB::table('news')->insert($news);
            return $this->view->render('admin.news.success', 'Успешно');
        }
        catch (Exception $exception) {
            return $this->view->render('admin.exception', 'ошибка', ['message'=> $exception->getMessage()]);
        }
    }
}
