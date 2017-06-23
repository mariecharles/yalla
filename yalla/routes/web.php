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

Route::get('admin/ajouter-un-article', 'PageController@postAddAction');

Route::get('/', 'UserController@index');
Route::get('actualites', 'UserController@pageActu');
Route::get('actualites/{param}', 'UserController@actuDetails');


Route::get('admin', 'AdminController@index');
Route::get('admin/{param}', 'AdminController@actuDetails');
Route::delete('admin/delete/{id}',array('uses' => 'AdminController@postDeleteAction', 'as' => 'post.delete'));







Auth::routes();


