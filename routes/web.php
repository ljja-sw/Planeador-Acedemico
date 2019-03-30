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

Route::group(['middleware'=> 'auth:admin'],function(){
    Route::get('/admin/secretarios', 'SecretarioController@index')->name('secretarios.index');
    Route::get('/admin/secretarios/registrar', 'SecretarioController@create')->name('secretarios.create');
    Route::post('/admin/secretarios/registrar', 'SecretarioController@store');
});


Route::get('/login/admin','Auth\AdminLoginController@showLoginForm');
Route::post('/login/admin','Auth\AdminLoginController@login');


