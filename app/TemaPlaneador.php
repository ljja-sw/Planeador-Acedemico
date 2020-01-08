<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TemaPlaneador extends Model
{
	protected $fillable = [
		'semana',
		'fecha',
		'tema',
		'metodologia',
		'planeador_id',
		'slug'
	];

	protected $table = "temas_planeador";

	public $timestamps = false;

	protected $casts = [
		'fecha' => 'array',
	];

	public function getFechas($fecha = "")
	{
		if ($fecha == "") {
			if (count($this->fecha) > 1) {
				return Carbon::parse($this->fecha['primera_clase'])->formatLocalized('%d/%m/%Y') . " - " . Carbon::parse($this->fecha['segunda_clase'])->formatLocalized('%d/%m/%Y');
			} else {
				return Carbon::parse($this->fecha['primera_clase'])->formatLocalized('%d/%m/%Y');
			}
		} else {
			return Carbon::parse($this->fecha[$fecha])->formatLocalized('%d/%m/%Y');
		}
	}

	public function planeador()
	{
		return $this->belongsTo(Planeador::class, 'planeador_id');
	}

	public function metodología_tema()
	{
		return $this->belongsTo(Metodologia::class, 'metodologia');
	}

	public function horarioClase()
	{

		$dia_semana = Carbon::now()->dayOfWeek;

		$asignatura_grupo = $this->planeador->asignatura_planeador;
		$docente = $this->planeador->docente_planeador;

        $asignacion = AsignaturaDocente::
                              where('asignatura_grupo_id', $asignatura_grupo->id)
                            ->where('docente_id', $docente->id)
                            ->first();

		if ($asignacion->horario->dia == $dia_semana) {
			return $asignacion->horario;
		} elseif ($asignacion->horario_2 && $asignacion->horario_2->dia == $dia_semana) {
			return $asignacion->horario_2;
		} else {
			return [];
		}
	}

	public function reporte()
	{
		$hora = Carbon::now();

		$hora_inicio = Carbon::parse($this->horarioClase()['hora_inicio']);
		$hora_fin = Carbon::parse($this->horarioClase()['hora_fin']);

		if ($hora->gte($hora_inicio) && $hora->lte($hora_fin->addMinutes(30))) {
			return true;
		} else {
			return false;
		}
	}

	public function ReporteTema(){

		return $this->hasMany(Reporte::class);

    }

	public function getRouteKeyName()
	{
		return 'slug';
	}


}
