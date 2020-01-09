<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planeador extends Model
{
    protected $fillable = [
    	'programa_academico',
    	'asignatura_grupo_id',
    	'docente_id',
    	'evaluaciones',
    ];

    protected $casts = [

    ];

    protected $table = "planeadores";

    public function temas()
    {
        return $this->hasMany(TemaPlaneador::class,'planeador_id');
    }

    public function asignatura_planeador()
    {
        return $this->belongsTo(AsignaturaGrupo::class,'asignatura_grupo_id');
    }

    public function docente_planeador()
    {
        return $this->belongsTo(Docente::class,'docente_id');
    }
}
