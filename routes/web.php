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

Route::get('/', function(){
    return view('top');
});

Route::get('welcome', 'PostsController@index')->name('welcome');


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

//ユーザ詳細表示機能
Route::get('users/{id}','UsersController@show')->name('users.show');
// Route::post('icon.upload/{id}', 'UsersController@upload')->name('icon.upload');

// ユーザ検索機能
Route::get('Search','SearchController@index')->name('search');
// Route::post('Search','SearchController@index')->name('search.post');

// タグ検索機能
Route::get('post/{id}/searchTag', 'TagsController@search')->name('tag.search');

// ログイン後機能
Route::group(['middleware' => ['auth']], function (){
    
    //ユーザ情報編集機能(ログイン後)
    Route::resource('users','UsersController', ['only' => ['update','edit','destroy']]);
    
    //画像投稿(ログイン後)
    Route::post('upload', 'PostsController@upload')->name('upload');
    Route::delete('delete/{id}', 'PostsController@destroy')->name('delete');
    
    // 参考になった機能(ログイン後)
    Route::group(['prefix' => 'references/{id}'], function () {
        Route::post('add_reference', 'ReferenceController@store')->name('reference.store');
        Route::delete('delete_reference', 'ReferenceController@destroy')->name('reference.destroy');
        Route::get('get_reference', 'ReferenceController@show')->name('reference.show');
    });
    
    // フォロー機能(ログイン後)
    Route::group(['prefix' => 'user/{id}'], function () {
        Route::post('follow', 'FollowController@store')->name('user.follow');
        Route::delete('unfollow', 'FollowController@destroy')->name('user.unfollow');
        Route::get('followings', 'FollowController@followings')->name('users.following');
        Route::get('followers', 'FollowController@followers')->name('users.follower');
    });
    
    // タグ機能(ログイン後)
    Route::group(['prefix' => 'post/{id}'], function () {
        //  post/id1/tag/id2 ならid1のpostにid2のタグをつける
        Route::post('tag', 'TagsController@store')->name('tag.store');
        Route::delete('untag', 'TagsController@destroy')->name('tag.delete');
        Route::get('tags', 'TagsController@index')->name('tag.index');
        
       
    });
});

// 管理者機能
Route::group(['prefix' => 'admin'], function(){


//login
    Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\Auth\LoginController@login')->name('admin.login');
    
//register
    Route::get('register', 'Admin\Auth\RegisterController@showRegisterForm')->name('admin.register');
    Route::post('register', 'Admin\Auth\RegisterController@register')->name('admin.register');
    
    Route::group(['middleware' => ['auth:admin']], function (){
//home
        Route::get('home', 'Admin\HomeController@index')->name('admin.home');
//logout
        Route::get('logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
//search
        Route::get('Search','Admin\SearchController@index')->name('admin.search');
//ユーザ詳細    
        Route::get('users/{id}','Admin\UsersController@show')->name('admin.users.show');
// ユーザの投稿削除
        Route::delete('delete/{id}', 'Admin\PostsController@destroy')->name('admin.delete');
    });
});