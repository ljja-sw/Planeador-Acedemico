<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $fillable = [
        'numero',
    ];

    public function asignaturas()
    {
    	return $this->belongsToMany(Asignatura::class,'asignaturas_grupos','id_asignatura','id_grupo');
    }

    public function getRouteKeyName()
    {
    	return "numero";
    }
}
