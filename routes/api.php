<?php

use Illuminate\Http\Request;

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

  $busqueda = App\Docente::
  where('nombre', 'like',  $term.'%')
  ->orWhere('apellido','like',  $term.'%')
  ->orWhere('documento_identidad','like',  $term.'%')
  ->get();

  $docentes = [];

  foreach ($busqueda as $docente) {
    $docentes[] = ['id' => $docente->id, 'text' => $docente->nombre_completo() ];
  }

  return \Response::json($docentes);
});

Route::get('/asignaturas-libres', function (Request $request) {
  $term = $request->term ?: '';

  $busqueda = App\Asignatura::doesntHave('asignada')
  ->where('nombre', 'like',  $term.'%')
  ->Where('codigo','like',  $term.'%')
  ->get();

  $asignaturas = [];

  foreach ($busqueda as $asignatura) {
    $asignaturas[] = ['id' => $asignatura->id, 'text' => $asignatura->nombre ];
  }

  return \Response::json($asignaturas);
});

Route::any('horarios-libres',function(Request $request){
  return App\Horario::where('salon_sala_id',$request->salon)
  ->doesntHave('ocupado')->get();
});

Route::any('/asignaturas-docente/{docente}',function(Request $request,App\Docente $docente){
  $term = $request->term ?: '';

  $busqueda = $docente->asignaturas()->doesntHave('planeador')
  ->where('nombre', 'like',  $term.'%')
  ->Where('codigo','like',  $term.'%')
  ->get();

  $asignaturas = [];

  foreach ($busqueda as $asignatura) {
    $asignaturas[] = ['id' => $asignatura->id, 'text' => $asignatura->nombre ];
  }

  return \Response::json($asignaturas);
});

Route::any('temas',function(Request $request){
  $tema = App\TemaPlaneador::find($request->id);
  return \Response::json($tema);

});
