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


/*ROUTES POUR LE FRONT OFFICE*/

Route::get('/', 'UserController@index');
Route::get('actualites', 'UserController@pageActu');
Route::get('actualites/{slug}', 'UserController@actuDetails');
Route::post('contact/add-message',array('uses' => 'userController@messageAddAction', 'as' => 'message.add'));
Route::get('contact', 'PageController@contactAction');

/*ROUTES POUR LE BACK OFFICE*/


Route::get('admin', 'AdminController@index');
Route::get('admin/articles/details/{slug}', 'AdminController@actuDetails');
Route::get('admin/archives', 'AdminController@getArchives');

Route::get('admin/ajouter-un-article', 'PageController@postAddAction');
Route::get('admin/modifier-un-article/{id}', 'PageController@postEditAction');
Route::get('admin/ajouter-un-membre', 'PageController@memberAddAction');
Route::get('admin/modifier-un-membre/{id}', 'PageController@memberEditAction');
Route::get('admin/ajouter-une-categorie', 'PageController@categoryAddAction');

Route::get('admin/articles', 'AdminController@actuAction');
Route::delete('admin/delete/{id}',array('uses' => 'AdminController@postDeleteAction', 'as' => 'post.delete'));
Route::get('admin/save/{id}',array('uses' => 'AdminController@postSaveAction', 'as' => 'post.save'));
Route::post('admin/add',array('uses' => 'AdminController@postAddAction', 'as' => 'post.add'));
Route::put('admin/update/{id}',array('uses' => 'AdminController@postUpdateAction', 'as' => 'post.update'));
Route::put('admin/publish/{id}',array('uses' => 'AdminController@postPublishAction', 'as' => 'post.publish'));

Route::get('admin/adherents/{id}', 'AdminController@memberDetails');
Route::delete('admin/delete-member/{id}',array('uses' => 'AdminController@memberDeleteAction', 'as' => 'member.delete'));
Route::post('admin/add-member',array('uses' => 'AdminController@memberAddAction', 'as' => 'member.add'));
Route::put('admin/update-member/{id}',array('uses' => 'AdminController@memberUpdateAction', 'as' => 'member.update'));

Route::delete('admin/delete-messages/{id}',array('uses' => 'AdminController@messageDeleteAction', 'as' => 'message.delete'));
Route::get('admin/messages', 'AdminController@getMessages');
Route::get('admin/message-details/{id}', 'AdminController@messageDetails');
Route::get('admin/send-message', array('uses' => 'AdminController@sendMessageAction', 'as' => 'send.message'));

Route::post('admin/add-category', array('uses' => 'AdminController@categoryAddAction', 'as' => 'category.add'));





