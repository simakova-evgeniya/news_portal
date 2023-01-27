<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController as AdminController;

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



Route::get('/hello/{name}', static function ($name) {
    return "Hello.{$name}";
});

Route::get('/info', [IndexController::class, 'index'])
->name('info');

//admin routes
Route::group(['prefix' => 'admin'], static function() {
    Route::get('/', AdminController::class)
->name('admin.index');
});

Route::group(['prefix' => ''], static function() {

    Route::get('/news', [NewsController::class, 'index'])
    ->name('news');

    Route::get('/news/{id}/show', [NewsController::class, 'show'])
    ->where('id','\d+')->name('news.show');

    Route::post( '/createdNews', function() {
        return Request::all();
    })->name('created-news');

});

Route::group(['prefix' => ''], static function() {

    Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories');

    Route::get('/categories/{id}/show', [CategoryController::class, 'show'])
    ->where('id', '\d+')->name('categories.show');
});