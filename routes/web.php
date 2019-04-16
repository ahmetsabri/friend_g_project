<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>['auth','is_admin'],'prefix'=>'admin'],function(){

  Route::get('/dashboard', 'BookController@index')->name('admin_dash');

  Route::post('/add-book','BookController@store')->name('addbook');

  Route::post('/edit-book/{id}','BookController@update')->name('editbook');

  Route::get('/delete-book/{id}','BookController@destroy')->name('deletebook');

  Route::get('/reservations','BookController@list_reservations')->name('all_reservations');

});

Route::post('/search','BookController@search')->name('search');
Route::get('/book/show/{id}','BookController@show')->name('show');
Route::post('/book/reserve_book/{id}','BookController@reserve')->name('reserve_book');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
