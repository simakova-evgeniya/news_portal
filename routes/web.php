<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{name}', static function ($name) {
    return "Hello.{$name}";
});

Route::get('/info', static function () {
    return 'это новостной портал';
});

Route::get('/posts', static function () {
    return 'список постов';
});

Route::get('/post/{id}', static function ($id) {
    return 'пост #'. $id;
});