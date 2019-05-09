<?php

Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'LoginController@login')->name('admin.login');
Route::post('logout', 'LoginController@logout')->name('admin.logout');