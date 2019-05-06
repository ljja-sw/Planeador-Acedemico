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

    protected $casts = [
        'hora_inicio' => 'time',
        'hora_fin' => 'time',
    ];

    public function salon()
    {
    	return $this->belongsTo(SalonSala::class,'salon_sala_id');
    }

    public function ocupado()
    {
        return $this->hasOne(AsignaturaDocente::class);
    }
}