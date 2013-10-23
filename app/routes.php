<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

App::bind('ArticleRepositoryInterface', 'EloquentArticleRepository');


Route::get('/', function()
{
	return View::make('hello');
});

Route::group(array('prefix'=>'v1'),function(){

	// insert APIs here

	Route::resource('articles', 'V1\ArticlesController');
	Route::resource('comments', 'CommentsController');

});