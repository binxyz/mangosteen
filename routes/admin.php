<?php

Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Admin\Auth\LoginController@login')->name('admin.login');
Route::post('logout', 'LoginController@logout')->name('admin.logout');

Route::get('create', 'Admin\CarBrandController@create')->name('brand.create');
Route::post('store', 'Admin\CarBrandController@store')->name('brand.store');
Route::get('search', 'Admin\CarBrandController@search')->name('brand.search');