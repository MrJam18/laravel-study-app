<?php

use App\Http\Controllers\AboutController;
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

Route::get('', [WelcomeController::class, 'index'])->name('main');
Route::get('categories/{category}', [NewsController::class, 'getCategoryNews']);
Route::get('news', [NewsController::class, 'getFreshNews'])->name('news');
Route::get('news/{number}', [OneNewsController::class, 'index']);
Route::prefix('admin')->name('admin/')->group(function (){
   Route::get('', [AdminController::class, 'index'])->name('index');
   Route::get('createNews', [NewsHandlerController::class, 'create'])->name('createNews');
   Route::get('deleteNews', [AdminController::class, 'inDev'])->name('deleteNews');
   Route::get('changeNews', [AdminController::class, 'inDev'])->name('changeNews');
   Route::get('other1', [AdminController::class, 'inDev'])->name('other1');
   Route::get('other2', [AdminController::class, 'inDev'])->name('other2');
});
Route::prefix('about')->name('about/')->group(function () {
   Route::get('', [AboutController::class, 'index'])->name('index');
   Route::get('review', [AboutController::class, 'review'])->name('review');
   Route::get('dataExport', [AboutController::class, 'dataExport'])->name('dataExport');
});
Route::prefix('api')->name('api/')->group(function() {
   Route::post('createReview', [AboutController::class, 'createReview'])->name('createReview');
   Route::post('createDataExportRequest', [AboutController::class, 'createDataExportRequest'])->name('createDataExportRequest');
    Route::post('createNews', CreateNewsController::class)->name('createNews');
});
