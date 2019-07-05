<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Horario extends Model
{
    protected $fillable = [
        'hora_inicio',
        'hora_fin',
        'dia',
        'salon_sala_id',
        'jornada_id'
    ];

    protected $casts = [
        'hora_inicio' => 'time',
        'hora_fin' => 'time',
    ];

    public function dia_semana()
    {
        return $this->belongsTo(Dia::class, 'dia');
    }

    public function salon()
    {
        return $this->belongsTo(SalonSala::class, 'salon_sala_id');
    }

    public function jornada()
    {
        return $this->belongsTo(Jornada::class, 'jornada_id');
    }

    public function tiempo_restante()
    {
        $hora = Carbon::now();
        $hora_fin = Carbon::parse($this->hora_fin);

        $horas = $hora_fin->diffInHours($hora, true);
        
        $tiempo_restante = $hora_fin->addMinutes(30)->diffForHumans([
            'parts' => 2,
        ]);
        return $tiempo_restante;
    }

    public function ocupado()
    {
        return $this->hasOne(AsignaturaDocente::class);
    }

    public function ocupado_2()
    {
        return $this->hasOne(AsignaturaDocente::class, 'horario_2_id');
    }
}
