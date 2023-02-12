<?php

use App\Http\Controllers\AboutActionsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\News\OneNewsController;
use App\Http\Controllers\WelcomeController;
use App\Http\Routes\RoutersHandler;
use Illuminate\Support\Facades\Route;
$routers = new RoutersHandler('web');


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
$routers->add('admin');
Route::get('', [WelcomeController::class, 'index'])->name('main');
Route::get('categories/{category}', [NewsController::class, 'getCategoryNews']);
Route::get('news', [NewsController::class, 'getFreshNews'])->name('news');
Route::get('news/{number}', [OneNewsController::class, 'index']);
Route::prefix('about')->name('about/')->group(function () {
   Route::get('', [AboutController::class, 'index'])->name('index');
   Route::get('review', [AboutController::class, 'review'])->name('review');
   Route::post('createReview', [AboutActionsController::class, 'createReview'])->name('createReview');
   Route::post('createNewsSourceRequest', [AboutActionsController::class, 'createNewsSourceRequest'])->name('createNewsSourceRequest');
   Route::get('newsSourceRequest', [AboutController::class, 'newsSourceRequest'])->name('newsSourceRequest');
});
Route::prefix('api')->name('api/')->group(function() {
   Route::post('createReview', [AboutController::class, 'createReview'])->name('createReview');
   Route::post('createDataExportRequest', [AboutController::class, 'createDataExportRequest'])->name('createDataExportRequest');
});
