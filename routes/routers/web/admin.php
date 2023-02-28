<?php
declare(strict_types=1);

use App\Http\Controllers\Admin\Categories\CategoriesActionsController;
use App\Http\Controllers\Admin\Categories\CategoriesController;
use App\Http\Controllers\Admin\CKEditorController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\News\NewsActionsController;
use App\Http\Controllers\Admin\News\NewsController;
use App\Http\Controllers\Admin\NewsSources\NewsSourcesActionsController;
use App\Http\Controllers\Admin\NewsSources\NewsSourcesController;
use App\Http\Controllers\Admin\NewsSourcesRequests\NewsSourcesRequestsController;
use App\Http\Controllers\Admin\NewsSourcesRequests\NewsSourcesRequestsActionsController;
use App\Http\Controllers\Admin\Reviews\ReviewsActionsController;
use App\Http\Controllers\Admin\Reviews\ReviewsController;
use App\Http\Controllers\Admin\Users\UsersActionsController;
use App\Http\Controllers\Admin\Users\UsersController;
use App\Http\Controllers\Auth\AdminResetPasswordController;
use Illuminate\Support\Facades\Route;

Route::get('', [MainController::class, 'index'])->name('index');
Route::prefix('news')->name('news/')->group(function ()
{
    Route::get('list', [NewsController::class, 'getList' ])->name('list');
    Route::get('create', [NewsController::class, 'create'])->name('create');
    Route::get('change/{news}', [NewsController::class, 'change'])->name('change');
    \actionGroup(NewsActionsController::class, 'news');
});
\routeGroup('categories', function (){
    Route::get('list', [CategoriesController::class, 'getList'])->name('list');
    Route::get('create', [CategoriesController::class, 'create'])->name('create');
    Route::get('change/{category}', [CategoriesController::class, 'change'])->name('change');
    \actionGroup(CategoriesActionsController::class, 'category');
});
\routeGroup('reviews', function () {
    Route::get('list', [ReviewsController::class, 'getList'])->name('list');
    Route::get('create', [ReviewsController::class, 'create'])->name('create');
    Route::get('change/{review}', [ReviewsController::class, 'change'])->name('change');
    \actionGroup(ReviewsActionsController::class, 'review');
});
\routeGroup('newsSourcesRequests', function (){
    Route::get('list', [NewsSourcesRequestsController::class, 'getList'])->name('list');
    Route::get('create', [NewsSourcesRequestsController::class, 'create'])->name('create');
    Route::get('change/{sourceRequest}', [NewsSourcesRequestsController::class, 'change'])->name('change');
    \actionGroup(NewsSourcesRequestsActionsController::class, 'sourceRequest');
});
\routeGroup('users', function () {
    Route::get('list', [UsersController::class, 'getList'])->name('list');
    Route::get('create', [UsersController::class, 'create'])->name('create');
    Route::get('change/{user}', [UsersController::class, 'change'])->name('change');
    \actionGroup(UsersActionsController::class, 'user');
    Route::post('resetPassword', [AdminResetPasswordController::class, 'resetPassword'])->name('resetPassword');
});
Route::prefix('other')->name('other/')->group(function ()
{
    Route::get('1', [MainController::class, 'inDev'])->name('1');
    Route::get('2', [MainController::class, 'inDev'])->name('2');
});
routeGroup('newsSources', function(){
    Route::get('list', [NewsSourcesController::class, 'getList'])->name('list');
    Route::get('create', [NewsSourcesController::class, 'create'])->name('create');
    Route::get('change/{source}', [NewsSourcesController::class, 'change'])->name('change');
    \actionGroup(NewsSourcesActionsController::class, 'source');
});

Route::post('ckeditor/image_upload', [CKEditorController::class, 'upload'])->name('ckeditorUpload');


