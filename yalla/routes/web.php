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
Route::get('admin/modifier-un-article/{id}', 'PageController@postEditAction');
Route::get('admin/ajouter-un-membre', 'PageController@memberAddAction');
Route::get('admin/modifier-un-membre/{id}', 'PageController@memberEditAction');
Route::get('contact', 'PageController@contactAction');


Route::get('/', 'UserController@index');
Route::get('actualites', 'UserController@pageActu');
Route::get('actualites/{slug}', 'UserController@actuDetails');
Route::post('contact/add-message',array('uses' => 'userController@messageAddAction', 'as' => 'message.add'));



Route::get('admin', 'AdminController@index');
Route::get('admin/details/{slug}', 'AdminController@actuDetails');
Route::get('admin/adherants/{id}', 'AdminController@memberDetails');
Route::get('admin/archives', 'AdminController@getArchives');

Route::delete('admin/delete/{id}',array('uses' => 'AdminController@postDeleteAction', 'as' => 'post.delete'));
Route::get('admin/save/{id}',array('uses' => 'AdminController@postSaveAction', 'as' => 'post.save'));
Route::post('admin/add',array('uses' => 'AdminController@postAddAction', 'as' => 'post.add'));
Route::put('admin/update/{id}',array('uses' => 'AdminController@postUpdateAction', 'as' => 'post.update'));
Route::put('admin/publish/{id}',array('uses' => 'AdminController@postPublishAction', 'as' => 'post.publish'));



Route::delete('admin/delete-member/{id}',array('uses' => 'AdminController@memberDeleteAction', 'as' => 'member.delete'));
Route::post('admin/add-member',array('uses' => 'AdminController@memberAddAction', 'as' => 'member.add'));
Route::put('admin/update-member/{id}',array('uses' => 'AdminController@memberUpdateAction', 'as' => 'member.update'));





