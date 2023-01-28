<?php
declare(strict_types=1);

namespace App\Http\Controllers\AbstractControllers;

use App\Http\Controllers\Controller;
use App\Providers\news\FakeNewsProvider;
use App\Views\Layouts\AdminsLayoutView;

abstract class AdminsController extends Controller
{
    public function __construct(FakeNewsProvider $provider, AdminsLayoutView $view)
    {
        parent::__construct($provider);
        $this->view = $view;
    }

}
