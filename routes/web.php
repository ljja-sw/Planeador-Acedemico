<?php
use Illuminate\Support\Facades\Hash;

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

Route::group(['middleware' => 'auth:web,admin'], function () {
    Route::get('/', 'HomeController@index')->name('home');
});

Route::get('reporte/{tema}', function (App\TemaPlaneador $tema) {

    $planeador = $tema->planeador;

    $asignatura_tema = $planeador->asignatura_planeador;
    $docente_tema = $planeador->docente_planeador;

    return $planeador;

})->name('tema.reporte');

Route::group(['middleware' => 'auth:admin,web'], function () {
    Route::get('/perfil', 'ProfileController@index')->name('perfil');
    Route::post('/cambiar-contraseña', 'ProfileController@cambiar_contraseña');
    Route::post('/cambiar-avatar', 'ProfileController@cambiarAvatar');
});

Route::group(['middleware' => ['role:Admin', 'auth:admin']], function () {
    Route::get('/admin/secretarios', 'SecretarioController@index')->name('secretarios.index');
    Route::get('/admin/secretarios/registrar', 'SecretarioController@create')->name('secretarios.create');
    Route::get('/admin/secretarios/{user}', 'SecretarioController@show')->name('secretarios.show');
    Route::post('/admin/secretarios/registrar', 'SecretarioController@store')->name('secretarios.store');
    Route::post('/admin/secretarios/{user}/update', 'SecretarioController@update')->name('secretarios.update');
});

Route::group(['middleware' => ['role:Secretario', 'auth:admin']], function () {
    Route::get('/admin/configuraciones', 'AdminController@configuraciones')->name('admin.configuraciones');
    Route::post('/admin/configuraciones/guardar', 'AdminController@guardarConfiguraciones')->name('admin.configuraciones.guardar');
    Route::get('designar-asignatura-docente', 'SecretarioController@formDesignarAsignatura')->name('form.designar.asignatura');
    Route::post('designar-asignatura-docente', 'SecretarioController@DesignarAsignatura')->name('designar.asignatura.store');
    Route::get('docentes', 'DocenteController@index')->name('docentes.index');
    Route::get('/docentes/{docente}/detalles', 'DocenteController@show')->name('docentes.show');
    Route::get('docentes/registrar', 'DocenteController@create')->name('docentes.create');
    Route::get('docentes/exportar', 'DocenteController@exportar')->name('docentes.exportar');
    Route::post('docentes/importar', 'DocenteController@importar')->name('docentes.importar');
    Route::post('/admin/docentes/update', 'DocenteController@store')->name('docentes.store');
    Route::post('/admin/docentes/{docente}/update', 'DocenteController@update')->name('docentes.update');

    Route::get('/admin/salones-salas', 'SalonSalaController@index')->name('salon.index');
    Route::get('/admin/salones-salas/registrar', 'SalonSalaController@create')->name('salon.create');
    Route::get('/admin/salones-salas/{salon}', 'SalonSalaController@show')->name('salon.show');
    Route::post('/admin/salones-salas/registrar', 'SalonSalaController@store')->name('salon.store');
    Route::post('/admin/salones-salas/{salon}/agregar', 'SalonSalaController@agregarHorario')->name('salon.horario.agregar');
    Route::post('/admin/salones-salas/{salon}/update', 'SalonSalaController@update')->name('salon.update');
    Route::post( '/admin/salones-salas/{salon}/destroy', 'SalonSalaController@destroy')->name( 'salon.destroy');
    Route::post('/admin/horario/update', 'SalonSalaController@updateHorario')->name('salon.horario.update');
    Route::post( '/admin/horario/destroy', 'SalonSalaController@destroyHorario')->name( 'salon.horario.destroy');

    Route::get('/registro-asignaturas', 'AsignaturaController@index')->name('asignatura.crear');

    Route::post('/asignaturas', 'AsignaturaController@ingreso');
    Route::get('/vista-asignaturas', 'AsignaturaController@show')->name('asignaturas.show');
    Route::get('/vista-asignaturas/{asigna}', 'AsignaturaController@detalle')
        ->name('asignatura.detalles');
    Route::post('/vista-asignaturas/{asigna}/update', 'AsignaturaController@update')->name('asignaturas.update');
    Route::get('/vista-asignaturas/{asigna}/destroy', 'AsignaturaController@destroy')->name('asignaturas.destroy');

    Route::get('/vista-programas', 'ProgramaController@show')->name('programa.show');
    Route::post('/programas', 'ProgramaController@create')->name('programa.crear');
    Route::get('/detalles-programas/{programa}', 'ProgramaController@edit')->name('programa.detalles');
    Route::post('/editar-programas/{programa}', 'ProgramaController@update')->name('programa.update');
});

Route::group(['middleware' => ['role:Docente', 'auth:web']], function () {
    Route::get('/{asignatura}/planeador/crear', 'PlaneadorController@create')->name('docente.generar.planeador');
    Route::get('{asignatura}/planeador/ver', 'PlaneadorController@show')->name('docente.planeador.ver');
    Route::get('{planeador}/planeador/pdf', 'HomeController@planeador_pdf')->name('docente.planeador.pdf');

    Route::post('/guardar-planeador', 'PlaneadorController@store');
    Route::post('/generar-planeador', 'PlaneadorController@generarPlaneadorForm');
    Route::post('/editar/tema', 'PlaneadorController@editarTema');
    Route::post('/editar/planeador/{planeador}', 'PlaneadorController@editarPlaneador');

    Route::get('/reportes', 'DocenteController@reportes')->name('reportes');
    Route::get('/crear-reporte', 'ReporteController@crear')->name('reporte.creacion');
});


Route::get('/login-secretario', 'Auth\SecretarioLoginController@showLoginForm')->name('login.secretario');
Route::post('/login/secretario', 'Auth\SecretarioLoginController@login');

Route::get('/login-admin', 'Auth\AdminLoginController@showLoginForm')->name('login.admin');
Route::post('/login/admin', 'Auth\AdminLoginController@login');
