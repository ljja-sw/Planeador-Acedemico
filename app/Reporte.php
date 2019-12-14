<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    protected $dates = ['deleted_at'];

	protected $fillable = [
        'semana_tema',
        'tema_planeador',
        'descripcion',
        'tipo_clase',
        'justificacion',
        'reportes_docente',
        'reporte_asignatura',
        'programas_id'];

	public function docente(){

		return $this->belongsTo(Docente::class,'reportes_docente');
	}


	public function asignatura(){

		return $this->belongsTo(asignatura::class,'reporte_asignatura');

	}

    
    public function tema(){

		return $this->belongsTo(TemaPlaneador::class);

    }
}
