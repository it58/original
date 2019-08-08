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

Route::get('/', 'PostsController@index');


// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

// コメント機能
Route::resource('comments','CommentsController', ['only' => ['show','destroy']]);
Route::post('comments/{id}','CommentsController@store')->name('store');
Route::get('show.reference/{id}','CommentsController@show_reference')->name('show.reference');



//ユーザ機能
Route::resource('users','UsersController', ['only' => 'show']);

// ユーザ検索機能
Route::get('Search','SearchController@index')->name('search');
Route::post('Search','SearchController@index')->name('search.post');

Route::group(['middleware' => ['auth']], function (){
    //画像およびタイトル投稿(ログイン後)
    Route::post('upload', 'PostsController@upload')->name('upload');
    Route::delete('delete/{id}', 'PostsController@destroy')->name('delete');
    
    // 参考になった機能
    Route::group(['prefix' => 'references/{id}'], function () {
        Route::post('add_reference', 'ReferenceController@store')->name('reference.store');
        Route::get('get_reference', 'ReferenceController@show')->name('reference.show');
        
    });
});