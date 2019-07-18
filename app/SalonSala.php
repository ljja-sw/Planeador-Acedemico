<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalonSala extends Model
{
    protected $fillable = ['nombre','slug','capacidad'];
    protected $table = "salones_salas";

    public function asignaturas()
    {
    	return $this->hasMany(Asignatura::class);
    }

    public function horarios()
    {
    	return $this->hasMany(Horario::class,'salon_sala_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
