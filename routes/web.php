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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'Backend\HomeController@index')->name('backend.home');
Route::resource('categories', 'Backend\CategoriesController');
Route::resource('images', 'Backend\ImagesController');
Route::resource('posts', 'Backend\PostsController');
Route::post('/images-upload','Backend\ImagesController@upload')->name('images-upload');