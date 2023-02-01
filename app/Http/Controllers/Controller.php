<?php

namespace App\Http\Controllers;

use App\Views\Interfaces\LayoutsInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected LayoutsInterface $view;


    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

}
