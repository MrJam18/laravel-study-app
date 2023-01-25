<?php
declare(strict_types=1);

namespace App\Http\Controllers\AbstractControllers;

use App\Http\Controllers\Controller;
use App\Views\Layouts\AdminsLayoutView;

class AdminsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view = new AdminsLayoutView();
    }

}
