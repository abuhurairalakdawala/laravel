<?php
Route::get('/', function(){return redirect('/home');});
Route::get('/login', 'Begin\LoginController@index')->middleware('guest');
Route::post('/login_user', 'Begin\LoginController@login_user')->middleware('guest');
Route::get('/register', 'Begin\RegisterController@index')->middleware('guest');
Route::post('/register_user', 'Begin\RegisterController@register')->middleware('guest');
Route::get('/logout', 'Begin\LoginController@logout');
Route::get('/home', 'Profile\ProfileController@index')->middleware('auth');
Route::post('/post_new_content', 'Profile\ProfileController@post_new_content')->middleware('auth');
Route::get('/delete_post/{id}', 'Profile\ProfileController@delete_post')->middleware('auth');


Route::get('/dash', 'My\MyDash@index');
Route::post('/dashAction', 'My\MyDash@indexAction');
Route::get('/generate_code', 'CodeGeneratorController@index');
Route::post('/generate_code_process', 'CodeGeneratorController@indexAction');
Route::post('/req', 'CodeGeneratorController@req');


Route::get('/dashboard', 'DashboardController@index')->middleware('auth');
Route::post('/dashboardAction', 'DashboardController@dashboardAction')->middleware('auth');
Route::post('/dashboardOptions', 'DashboardController@dashboardOptions')->middleware('auth');
