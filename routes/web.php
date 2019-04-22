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
	    Route::post('/cambiar-avatar','ProfileController@cambiarAvatar');
});



Route::group(['middleware'=> 'auth:admin'],function(){

    Route::get('/admin/docentes', 'DocenteController@index')->name('docentes.index');
    Route::get('/docentes/{docente}/detalles','DocenteController@show')->name('docentes.show');
    Route::get('/admin/docentes/registrar', 'DocenteController@create')->name('docentes.create');
    Route::post('/admin/docentes/update', 'DocenteController@store');
    Route::post('/admin/docentes/{docente}/update', 'DocenteController@update')->name('docentes.update');

    Route::get('/admin/secretarios', 'SecretarioController@index')->name('secretarios.index');
    Route::get('/admin/secretarios/registrar', 'SecretarioController@create')->name('secretarios.create');
    Route::get('/admin/secretarios/{user}', 'SecretarioController@show')->name('secretarios.show');
    Route::post('/admin/secretarios/registrar', 'SecretarioController@store');
    Route::post('/admin/secretarios/{user}/update', 'SecretarioController@update')->name('secretarios.update');


    Route::get('/registro-asignaturas', 'AsignaturaController@index');
    Route::post('/asignaturas', 'AsignaturaController@ingreso');



});



Route::get('/login-secretario','Auth\SecretarioLoginController@showLoginForm')->name('login.secretario');
Route::post('/login/secretario','Auth\SecretarioLoginController@login');

Route::get('/login-admin','Auth\AdminLoginController@showLoginForm')->name('login.admin');
Route::post('/login/admin','Auth\AdminLoginController@login');

Route::get('/generar-planedor','DocenteController@GenerarPlaneador')->name('generar.planeador');


