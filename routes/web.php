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

Route::get('/', 'App\Http\Controllers\MainPageController@index');
Route::get('/create', 'App\Http\Controllers\MainPageController@createPosts');
Route::get('/ajax-show', 'App\Http\Controllers\MainPageController@showPosts')->name('post.showPosts');

