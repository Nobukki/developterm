<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.','middleware' => 'auth'], function() {
    Route::get('news/create', [AdminNewsController::class, 'add'])
        ->name('news.create');
    Route::post('news/create',[AdminNewsController::class, 'create'])
        ->name('news.store');
    Route::get('news',[AdminNewsController::class, 'index'])
        ->name('news.index');
    Route::get('news/{news}/edit',[AdminNewsController::class, 'edit'])
        ->name('news.edit');
    Route::post('news/{news}/edit',[AdminNewsController::class, 'update'])
        ->name('news.update');

    // Review
    Route::get('review/create', [AdminReviewController::class, 'add'])
        ->name('review.create');
    Route::post('review/create', [AdminReviewController::class, 'store'])
        ->name('review.store');
    Route::get('review',[AdminReviewController::class, 'index'])
        ->name('review.index');
    Route::get('review/favorite',[AdminReviewController::class, 'favoriteIndex'])
        ->name('review.favoriteIndex');
    Route::get('review/{review}/edit',[AdminReviewController::class, 'edit'])
        ->name('review.edit');
    Route::post('review/{review}/edit',[AdminReviewController::class, 'update'])
        ->name('review.update');
    Route::get('review/{review}/favorite',[AdminReviewController::class, 'favorite'])
        ->name('review.favorite');
    Route::get('review/{review}',[AdminReviewController::class, 'detail'])
        ->name('review.detail');


});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
