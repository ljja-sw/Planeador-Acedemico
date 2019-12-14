<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Asignatura;
use DB;

class AsignaturaController extends Controller
{
	public function index()
	{

	}

	public function show($asignatura)
	{
		return Asignatura::findOrFail($asignatura);
	}

	public function porGrupos($asignatura)
	{
		$asignaturas = [];
		
		$busqueda = DB::table('asignaturas_grupos')
		->join('asignaturas','asignaturas_grupos.id_asignatura','asignaturas.id')
		->join('grupos','asignaturas_grupos.id_grupo','grupos.id')
		->leftJoin('asignaturas_docentes','asignaturas_grupos.id','asignaturas_docentes.asignatura_grupo_id')
		->where('asignaturas.id',$asignatura)
		->whereNull('asignaturas_docentes.id')
		->select('asignaturas.nombre as asignatura','asignaturas_grupos.id as id','asignaturas.codigo as codigo_asignatura','grupos.numero as codigo_grupo')
		->get();

		foreach ($busqueda as $asignatura) {
			$asignaturas[] = ['id' => $asignatura->id, 'text' => "{$asignatura->asignatura} {$asignatura->codigo_asignatura}-{$asignatura->codigo_grupo}"];
		}

		return $asignaturas;
	}
}
