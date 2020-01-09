<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Asignatura;
use App\TemaPlaneador;
use App\Docente;
use App\Horario;
use App\Programa;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/docentes', function (Request $request) {
  $term = $request->term ?: '';

  $busqueda = Docente::where('nombre', 'like',  $term . '%')
  ->orWhere('apellido', 'like',  $term . '%')
  ->orWhere('documento_identidad', 'like',  $term . '%')
  ->get();

  $docentes = [];

  foreach ($busqueda as $docente) {
    $docentes[] = ['id' => $docente->id, 'text' => $docente->nombre_completo()];
  }

  return \Response::json($docentes);
});

Route::get('/asignaturas-libres', function (Request $request) {
  $term = $request->term ?: '';

  $busqueda = Asignatura::doesntHave('asignada')
  ->where('nombre', 'like',  $term . '%')
  ->orWhere('codigo', 'like',  $term . '%')
  ->get();

  $asignaturas = [];

  foreach ($busqueda as $asignatura) {
    $asignaturas[] = ['id' => $asignatura->id, 'text' => $asignatura->nombre];
  }

  return \Response::json($asignaturas);
});

Route::any('horarios-libres', function (Request $request) {
  $busquedas = Horario::where('salon_sala_id', $request->salon)
  ->doesntHave('ocupado_2')
  ->doesntHave('ocupado')->get();

  $horarios = [];
  foreach ($busquedas as $busqueda) {
    $horarios[] = ['id' => $busqueda->id, 'text' => $busqueda->dia_semana->dia . " $busqueda->hora_inicio  $busqueda->hora_fin"];
  }

  return $horarios;
});

Route::any('horarios/', function () {
  return Horario::all();
});

Route::any('horarios/{horario}', function (Horario $horario) {
  return $horario;
});

Route::any('/asignaturas-docente/{docente}', function (Request $request, Docente $docente) {
  $term = $request->term ?: '';

  $busqueda = $docente->asignaturas()->doesntHave('planeador')
  ->where('nombre', 'like',  $term . '%')
  ->orWhere('codigo', 'like',  $term . '%')
  ->get();

  $asignaturas = [];

  foreach ($busqueda as $asignatura) {
    $asignaturas[] = ['id' => $asignatura->id, 'text' => $asignatura->nombre];
  }

  return \Response::json($asignaturas);
});

Route::get('/programas','Api\ProgramaController@index');
Route::get('/programas/{programa}','Api\ProgramaController@show');
Route::get('/programas/{programa}/asignaturas','Api\ProgramaController@asignaturasPrograma');

Route::get('/asignaturas','Api\AsignaturaController@index');
Route::get('/asignaturas/{asignatura}','Api\AsignaturaController@show');
Route::get('/asignaturas/{asignatura}/grupo','Api\AsignaturaController@porGrupos');


Route::any('temas', function (Request $request) {
  $tema = TemaPlaneador::find($request->id);
  return \Response::json($tema);
});
