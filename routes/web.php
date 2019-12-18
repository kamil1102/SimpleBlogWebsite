<?php

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




Route::get('/', 'PostController@index') ->name('posts.index');
Route::get('posts', 'PostController@index') ->name('posts.index');
Route::get('posts/create', 'PostController@create') ->name('posts.create');
Route::post('posts', 'PostController@store') ->name('posts.store');
Route::get('posts/{id}', 'PostController@show') ->name('posts.show');
Route::delete('posts/{id}', 'PostController@destroy') ->name('posts.destroy');
Route::post('comments', 'CommentController@store') ->name('comments.store');



Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit');
Route::patch('/posts/{post}', 'PostController@update')->name('posts.update');

Route::get('/comments/{comment}', 'CommentController@edit')->name('comments.edit');
Route::patch('/comments/{comment}', 'CommentController@update')->name('comments.update');
Route::delete('comment/{id}', 'commentController@destroy') ->name('comment.destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function (){
    Route::resource('users','UsersController',['except'=>['show','create','store']]);

});
