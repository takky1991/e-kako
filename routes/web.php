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

Route::group(['middleware' => 'auth'], function () {
	Route::get('/create-post', 'FrontendController@showCreatePostForm')->name('frontend.createPost');
	Route::post('/create-post', 'FrontendController@storePost')->name('frontend.storePost');
	Route::post('posts/{post}/comments', 'CommentsController@store')->name('frontend.storeComment');
});

Auth::routes();

Route::group(['prefix' => 'backend', 'middleware' => 'admin'], function () {
	Route::get('/home', 'Backend\HomeController@index')->name('backend.home');
	Route::resource('categories', 'Backend\CategoriesController');
	Route::resource('pictures', 'Backend\ImagesController');
	Route::resource('posts', 'Backend\PostsController');
});

Route::group(['prefix' => 'api'], function () {
	Route::group(['middleware' => 'admin'], function () {
		Route::post('/images-upload','Backend\ImagesController@upload')->name('images-upload');
		Route::get('/images-json', 'Backend\ImagesController@imagesJson')->name('images-json');
	});

	Route::post('/post-image-upload', 'UploadController@redactorImageUpload')->name('post-image-upload');
});