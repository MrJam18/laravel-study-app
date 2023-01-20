<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function __construct()
    {
        echo \view('head');
        echo \view('menu');
    }

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected function menuView()
    {
        echo \view('menu');
    }

}
