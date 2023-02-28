<?php
declare(strict_types=1);

namespace App\Http\Controllers\News;

use App\Http\Controllers\AbstractControllers\UsersController;

use App\Jobs\NewsParsing;
use App\Models\News\Category;

class NewsParserController extends UsersController
{
    function index()
    {
        /**
         * @var Category[] $categories
         */
        $categories = Category::all();
        foreach ($categories as $category) {
            NewsParsing::dispatch($category);
        }
    }

}
