<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Reporte extends Model
{

    protected $dates = ['deleted_at'];


	protected $fillable = [
        'semana_tema',
        'descripcion',
        'tipo_clase',
        'justificacion',
        'programas_id',
        'docente_id',
        'asignatura_id',
        'tema_planeador_id'];

	public function docente(){

		return $this->belongsTo(Docente::class,'docente_id');
	}


	public function asignatura(){

		return $this->belongsTo(asignatura::class,'asignatura_id');

	}
    
    public function tema(){

		return $this->belongsTo(TemaPlaneador::class,'tema_planeador_id');

    }


}
