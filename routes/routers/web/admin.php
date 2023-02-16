<?php
declare(strict_types=1);

use App\Http\Controllers\Admin\Categories\CategoriesActionsController;
use App\Http\Controllers\Admin\Categories\CategoriesController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\News\NewsActionsController;
use App\Http\Controllers\Admin\News\NewsController;
use App\Http\Controllers\Admin\NewsSourcesRequests\NewsSourcesRequestsController;
use App\Http\Controllers\Admin\NewsSourcesRequests\NewsSourcesRequestsActionsController;
use App\Http\Controllers\Admin\Reviews\ReviewsActionsController;
use App\Http\Controllers\Admin\Reviews\ReviewsController;
use Illuminate\Support\Facades\Route;

Route::get('', [MainController::class, 'index'])->name('index');
Route::prefix('news')->name('news/')->group(function ()
{
    Route::get('list', [NewsController::class, 'getList' ])->name('list');
    Route::get('create', [NewsController::class, 'create'])->name('create');
    Route::get('change/{news}', [NewsController::class, 'change'])->name('change');
    Route::prefix('actions')->name('actions/')->group(function () {
        Route::delete('delete/{news}', [NewsActionsController::class, 'destroy'])->name('delete');
        Route::post('change/{news}', [NewsActionsController::class, 'edit'])->name('change');
        Route::post('create', [NewsActionsController::class, 'create'])->name('create');
    });
});
\routeGroup('categories', function (){
    Route::get('list', [CategoriesController::class, 'getList'])->name('list');
    Route::get('create', [CategoriesController::class, 'create'])->name('create');
    Route::get('change/{category}', [CategoriesController::class, 'change'])->name('change');
    \routeGroup('actions', function () {
        Route::delete('delete/{category}', [CategoriesActionsController::class, 'destroy'])->name('delete');
        Route::post('create', [CategoriesActionsController::class, 'create'])->name('create');
        Route::post('change/{category}', [CategoriesActionsController::class, 'edit'])->name('change');
    });
});
\routeGroup('reviews', function () {
    Route::get('list', [ReviewsController::class, 'getList'])->name('list');
    Route::get('create', [ReviewsController::class, 'create'])->name('create');
    Route::get('change/{review}', [ReviewsController::class, 'change'])->name('change');
    \routeGroup('actions', function () {
        Route::delete('delete/{review}', [ReviewsActionsController::class, 'destroy'])->name('delete');
        Route::post('create', [ReviewsActionsController::class, 'create'])->name('create');
        Route::post('change/{review}', [ReviewsActionsController::class, 'edit'])->name('change');
    });
});
\routeGroup('newsSourcesRequests', function (){
    Route::get('list', [NewsSourcesRequestsController::class, 'getList'])->name('list');
    Route::get('create', [NewsSourcesRequestsController::class, 'create'])->name('create');
    Route::get('change/{sourceRequest}', [NewsSourcesRequestsController::class, 'change'])->name('change');
    \routeGroup('actions', function () {
        Route::delete('delete/{sourceRequest}', [NewsSourcesRequestsActionsController::class, 'destroy'])->name('delete');
        Route::post('create', [NewsSourcesRequestsActionsController::class, 'create'])->name('create');
        Route::post('change/{sourceRequest}', [NewsSourcesRequestsActionsController::class, 'edit'])->name('change');
    });
});
Route::prefix('other')->name('other/')->group(function ()
{
    Route::get('1', [MainController::class, 'inDev'])->name('1');
    Route::get('2', [MainController::class, 'inDev'])->name('2');
});


