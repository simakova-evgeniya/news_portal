<?php

use App\Http\Controllers\Admin\DataUploadController as AdminDataUploadController;
use App\Http\Controllers\Admin\CallBackController as AdminCallBackController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Account\LoginController;

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

Route::group(['middleware'=>'auth'], static function(){
Route::get('/logout',[LoginController::class,'logout'])->name('account.logout');
Route::get('/account',AccountController::class)->name('account');

Route::get('/info', [IndexController::class, 'index'])
->name('info');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is.admin'], static function() {
    Route::get('/', AdminController::class)
        ->name('index');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
    Route::resource('callBack', AdminCallBackController::class);
    Route::resource('dataUpload', AdminDataUploadController::class);

});

Route::group(['prefix' => ''], static function() {

    Route::get('/news', [NewsController::class, 'index'])
    ->name('news');

    Route::get('/news/{id}/show', [NewsController::class, 'show'])
    ->where('id','\d+')->name('news.show');


});

});


Route::group(['prefix' => ''], static function() {

    Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories');

    Route::get('/categories/{id}/show', [CategoryController::class, 'show'])
    ->where('id', '\d+')->name('categories.show');
});
//collection
Route::get('collection', function(){
    $names = ['Ann', 'Sam', 'Jeck', 'Feeby', 'Andy'];
    $collect = \collect($names);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
