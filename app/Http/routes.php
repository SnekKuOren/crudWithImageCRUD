<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
	//Display page only
	//Route::get('test', function () {
	//    return view('student.test');
	//}); 
	//or

	//perform get post
	Route::get('form', 'Student@getForm');
	Route::post('insert', 'Student@store');
	Route::get('show', 'Student@showdata');
	Route::get('editform/{id}', 'Student@getEditForm');
	Route::post('update/{id}', 'Student@updateData');
	Route::get('delete/{id}', 'Student@destroy');

	//crud image
	//Header Part *********
	Route::get('header/form', 'Header@getForm');
	Route::post('header/post', 'Header@store');
	Route::get('header/showdata', 'Header@display');
	Route::get('header/editform/{id}', 'Header@getEditForm');
	Route::post('header/update/{id}', 'Header@updateData');
});
