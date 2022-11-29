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

Route::group(['namespace' => 'App\Http\Controllers\Post'], function() {
    Route::get('/', 'IndexController')->name('post.index');
    Route::get('/posts/{post}', 'ShowController')->name('post.show');
    Route::get('/ajax-show', 'ShowPostsController')->name('post.showPosts');
    Route::get('/create', 'CreatePostsController');

    Route::group(['namespace' => 'Comment', 'prefix' => 'posts/{post}'], function() {
        Route::post('/comments', 'StoreController')->name('post.comments.store');
    });
});


Route::get('/tags/{tag}', 'App\Http\Controllers\TagController@show')->name('tag.show');

Route::post('/comments', 'App\Http\Controllers\CommentController@store')->name('comments.store');

