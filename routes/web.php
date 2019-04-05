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
Auth::routes();

Route::group(['middleware'=> 'auth:web,admin'],function(){
	Route::get('/', 'HomeController@index')->name('home');
});

Route::group(['middleware' => 'auth:admin,web'],function(){
	    Route::get('/perfil', 'ProfileController@index')->name('perfil');
	    Route::post('/cambiar-contraseña','ProfileController@cambiar_contraseña');
});

Route::group(['middleware'=> 'auth:admin'],function(){

    Route::get('/admin/secretarios', 'SecretarioController@index')->name('secretarios.index');
    Route::get('/admin/secretarios/registrar', 'SecretarioController@create')->name('secretarios.create');
    Route::get('/admin/secretarios/{user}', 'SecretarioController@show')->name('secretarios.show');
    Route::post('/admin/secretarios/registrar', 'SecretarioController@store');
});

Route::get('/login-secretario','Auth\SecretarioLoginController@showLoginForm')->name('login.secretario');
Route::post('/login/secretario','Auth\SecretarioLoginController@login');

Route::get('/login-admin','Auth\AdminLoginController@showLoginForm')->name('login.admin');
Route::post('/login/admin','Auth\AdminLoginController@login');

