<?php

Route::get('/', function () {
    return view('welcome');
});

//検索用
Route::get('/cooks/search', 'CooksController@search')->name('cooks.search');

Route::resource('cooks', 'CooksController');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');


//認証済みユーザだけがアクセスできる
Route::group(['middleware' => ['auth']], function () {
  Route::resource('cooks', 'CooksController', ['only' => ['store', 'destroy']]);
});
