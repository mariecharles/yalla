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

Route::prefix(App::getLocale())->group(function() {

    Route::get('/', 'UserController@index');
    Route::get(Lang::get('pagination.actu'),'UserController@pageActu');
    Route::get(Lang::get('pagination.detailactu'), 'UserController@actuDetails');
    Route::get(Lang::get('pagination.contact'), 'PageController@contactAction');

});


/*ROUTES POUR LE FRONT OFFICE*/



Route::post('contact/add-message',array('uses' => 'userController@messageAddAction', 'as' => 'message.add'));


/*ROUTES POUR LE BACK OFFICE*/

Route::prefix('admin')->group(function() {

    Route::get('/', 'AdminController@index');
    Route::get('archives', 'AdminController@getArchives');

    Route::get('ajouter-un-article', 'PageController@postAddAction');
    Route::get('modifier-un-article/{id}', 'PageController@postEditAction');
    Route::get('ajouter-un-membre', 'PageController@memberAddAction');
    Route::get('modifier-un-membre/{id}', 'PageController@memberEditAction');
    Route::get('ajouter-une-categorie', 'PageController@categoryAddAction');

    Route::get('articles', 'AdminController@actuAction');
    Route::delete('delete/{id}',array('uses' => 'AdminController@postDeleteAction', 'as' => 'post.delete'));
    Route::get('save/{id}',array('uses' => 'AdminController@postSaveAction', 'as' => 'post.save'));
    Route::post('add',array('uses' => 'AdminController@postAddAction', 'as' => 'post.add'));
    Route::put('update/{id}',array('uses' => 'AdminController@postUpdateAction', 'as' => 'post.update'));
    Route::put('publish/{id}',array('uses' => 'AdminController@postPublishAction', 'as' => 'post.publish'));

    Route::get('membres', 'AdminController@getMembers');
    Route::delete('delete-member/{id}',array('uses' => 'AdminController@memberDeleteAction', 'as' => 'member.delete'));
    Route::post('add-member',array('uses' => 'AdminController@memberAddAction', 'as' => 'member.add'));
    Route::put('update-member/{id}',array('uses' => 'AdminController@memberUpdateAction', 'as' => 'member.update'));

    Route::delete('delete-messages/{id}',array('uses' => 'AdminController@messageDeleteAction', 'as' => 'message.delete'));
    Route::get('messages', 'AdminController@getMessages');
    Route::get('message-details/{id}', 'AdminController@messageDetails');
    Route::get('send-message', array('uses' => 'AdminController@sendMessageAction', 'as' => 'send.message'));

    Route::get('partenaires', 'AdminController@getPartners');
    Route::get('ajouter-un-partenaire', 'PageController@partnerAddAction');
    Route::post('add-partner',array('uses' => 'AdminController@partnerAddAction', 'as' => 'partner.add'));
    Route::delete('delete-partner/{id}',array('uses' => 'AdminController@partnerDeleteAction', 'as' => 'partner.delete'));

    Route::post('add-category', array('uses' => 'AdminController@categoryAddAction', 'as' => 'category.add'));


});







