<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $fillable = [
    	'hora_inicio',
    	'hora_fin',
    	'dia',
    	'salon_sala_id'
    ];

    public function salon()
    {
    	return $this->hasOne(SalonSala::class);
    }

    public function ocupado()
    {
        return $this->hasOne(AsignaturaDocente::class);
    }
}
