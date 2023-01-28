<?php

namespace App\Http\Controllers;

use App\Lists\NewsLists\AllNewsList;
use App\Providers\news\FakeNewsProvider;
use App\Views\Interfaces\LayoutsInterface;
use App\Views\Layouts\UsersLayoutView;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected LayoutsInterface $view;
    protected AllNewsList $list;

    public function __construct(FakeNewsProvider $provider)
    {
        $this->list = $provider->getList();
    }

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

}
