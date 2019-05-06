<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planeador extends Model
{
    protected $fillable = [
    	'fecha_registro',
    	'programa_academico',
    	'asignatura',
    	'docente',
    	'evaluaciones',
    	'firmado',
    	'revisado'
    ];

    protected $casts = [
        'fecha_registro' => 'datetime',
    ];

    protected $table = "planeadores";

    public function temas()
    {
        return $this->hasMany(TemaPlaneador::class,'planeador_id');
    }

    public function asignatura_planeador()
    {
        return $this->belongsTo(Asignatura::class,'asignatura');
    }

    public function docente_planeador()
    {
        return $this->belongsTo(Docente::class,'docente');
    }
}
