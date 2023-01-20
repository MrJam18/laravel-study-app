<?php

namespace App\Http\Controllers\Admin\Actions;

use App\Exceptions\NotFoundListException;
use App\Http\Controllers\Controller;
use App\Models\News\News;
use App\Providers\news\FakeNewsProvider;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CreateNewsController extends Controller
{

    public function __invoke(Request $request): View
    {
        try{
            $query = $request->query();
            $provider = new FakeNewsProvider();
            $id = $provider->getList()->getLastId() + 1;
            $creationDate = new DateTime();
            $creationDate = $creationDate->format('y-m-d');
            $news = new News($id, $query['header'], $query['description'],$creationDate, $query['text']);
            $provider->addNews($news, $query['category']);
            return \view('admin.news.success');
        }
        catch (NotFoundListException $exception) {
            return \view('admin.exception', ['message'=> $exception->getMessage()]);
        }
    }
}
