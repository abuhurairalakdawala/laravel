<?php
Route::get('/login', 'Begin\LoginController@index')->middleware('guest');
Route::post('/login_user', 'Begin\LoginController@login_user')->middleware('guest');
Route::get('/register', 'Begin\RegisterController@index')->middleware('guest');
Route::post('/register_user', 'Begin\RegisterController@register')->middleware('guest');
Route::get('/logout', 'Begin\LoginController@logout');
Route::get('/home', 'Profile\ProfileController@index');
