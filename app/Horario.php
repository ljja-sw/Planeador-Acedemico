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

    public function getHoraInicio()
    {
        $datetime = today()->format('Y-m-d')."T".$this->hora_inicio.".000000Z"; 
        return Carbon::parse($datetime);
    }

    public function getHoraFin()
    {
        $datetime = today()->format('Y-m-d')."T".$this->hora_fin.".000000Z"; 
        return Carbon::parse($datetime);
    }

    public function cruceHorario(Horario $horario_comparar)
    {     
        // "hora_inicio horario a asignar >= Horario a comparar <= hora_fin horario a asignar"

        $dia_horario = $horario_comparar->dia;
        $hora_inicio = $horario_comparar->getHoraInicio();
        $hora_fin = $horario_comparar->getHoraFin();
        
        return ($dia_horario == $this->dia 
                  && $this->getHoraInicio()->gte($hora_inicio)
                  && $this->getHoraFin()->lte($hora_fin));
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
