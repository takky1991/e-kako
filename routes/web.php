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

Route::get('/', 'FrontendController@index')->name('homepage');
Route::get('/artikli/{category}/{post}', 'FrontendController@post')->name('frontend.post');
Route::get('/kategorije/{category}', 'FrontendController@category')->name('frontend.category');

Auth::routes();

Route::group(['prefix' => 'backend'], function () {
	Route::get('/home', 'Backend\HomeController@index')->name('backend.home');
	Route::resource('categories', 'Backend\CategoriesController');
	Route::resource('pictures', 'Backend\ImagesController');
	Route::resource('posts', 'Backend\PostsController');
});

Route::group(['prefix' => 'api'], function () {
	Route::post('/images-upload','Backend\ImagesController@upload')->name('images-upload');
	Route::post('/post-image-upload', 'UploadController@redactorImageUpload')->name('post-image-upload');
	Route::get('/images-json', 'Backend\ImagesController@imagesJson')->name('images-json');
});