<?php
declare(strict_types=1);

namespace App\Http\Controllers\AbstractControllers;

use App\Http\Controllers\Controller;
use App\Providers\news\FakeNewsProvider;
use App\Views\Layouts\UsersLayoutView;

abstract class UsersController extends Controller
{
    public function __construct(FakeNewsProvider $provider)
    {
        parent::__construct($provider);
        $this->view = new UsersLayoutView($this->list->getCategoriesNames());
    }


}
