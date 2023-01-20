<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    function index(string $name = 'Пользователь'): View
    {
        return view('welcome', ['name'=> $name]);
    }
}
