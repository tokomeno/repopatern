<?php

Route::resource('topics', 'TopicController');
Route::resource('addresses', 'AddressController');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
