<?php

namespace App\Http\Controllers;

use App\View\Layouts\LayoutView;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected LayoutView $view;



    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

}
