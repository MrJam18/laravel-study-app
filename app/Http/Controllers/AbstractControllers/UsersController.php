<?php
declare(strict_types=1);

namespace App\Http\Controllers\AbstractControllers;

use App\Http\Controllers\Controller;
use App\Views\Layouts\UsersLayoutView;
use Illuminate\Support\Facades\DB;

abstract class UsersController extends Controller
{
    public function __construct()
    {
        $categories = DB::table('categories')->get(['name', 'title']);
        $this->view = new UsersLayoutView($categories);
    }


}
