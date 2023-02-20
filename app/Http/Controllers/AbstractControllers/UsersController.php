<?php
declare(strict_types=1);

namespace App\Http\Controllers\AbstractControllers;

use App\Http\Controllers\Controller;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\View\Layouts\UsersLayoutView;
use Illuminate\Support\Facades\Auth;

abstract class UsersController extends Controller
{
    public function __construct(CategoriesQueryBuilder $builder)
    {
        $categories = $builder->getColumns(['title', 'name']);
        $this->view = new UsersLayoutView($categories);
    }


}
