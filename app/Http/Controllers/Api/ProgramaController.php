<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Programa;
use App\Asignatura;

class ProgramaController extends Controller
{
	public function index(Request $request)
	{
		$term = $request->term ?: '';

		$busqueda = Programa::where('nombre', 'like',  '%' .$term . '%')
		->orWhere('codigo', 'like', '%'. $term . '%')
		->get();

		$programas = [];

		foreach ($busqueda as $programa) {
			$programas[] = ['id' => $programa->id, 'text' => "{$programa->codigo}-{$programa->nombre}"];
		}

		return $programas;
	}

	public function show(Programa $programa)
	{
		return $programa->with('asignaturas')->get();
	}

	public function asignaturasPrograma(Programa $programa,Request $request)
	{
		$term = $request->term ?: '';

		$asignaturas = [];
        $busqueda = [];

        foreach($programa->asignaturas as $asignatura){
            $busqueda[] = $asignatura->asignatura;
        }

		foreach ($busqueda as $asignatura) {
			$asignaturas[] = ['id' => $asignatura->id, 'text' => "{$asignatura->nombre} {$asignatura->codigo}"];
		}

		return $asignaturas;
	}
}
