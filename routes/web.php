<?php

use App\Http\Controllers\Admin\Actions\CreateNewsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\NewsHandlerController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\News\OneNewsController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WelcomeController::class, 'index'])->name('main');
Route::get('about', function () {
   echo '<h4>Наша компания занимается новостями, но они будут позже, так как программа в разработке.</h4>';
})->name('about');
Route::get('news/categories', [NewsController::class, 'getCategories'])->name('categories');
Route::get('news/categories/{category}', [NewsController::class, 'getCategoryNews']);
Route::get('news', [NewsController::class, 'getFreshNews'])->name('news');
Route::get('news/{number}', [OneNewsController::class, 'index']);
Route::get('admin', [AdminController::class, 'index'])->name('admin');
Route::get('admin/createNews', [NewsHandlerController::class, 'create'])->name('createNews');
Route::get('admin/createNewsAction', CreateNewsController::class)->name('createNewsAction');
