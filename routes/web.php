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


Route::group(['prefix' => 'admin'], function () {
   Route::resource('users', 'UsersController');

   Route::get( 'users/{id}/destroy', [
   		'uses' => 'UsersController@destroy',
   		'as'   => 'admin.users.destroy'
   	]);

   Route::resource('categories', 'CategoriesController');
   Route::get( 'categories/{id}/destroy', [
   		'uses' => 'CategoriesController@destroy',
   		'as'   => 'admin.categories.destroy'
   	]);
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');