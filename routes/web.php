<?php

Route::get('login/{driver}', 'Auth\loginController@redirectToProvider')->name('social_auth');
Route::get('login/{driver}/callback', 'Auth\loginController@handleProviderCallback');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
