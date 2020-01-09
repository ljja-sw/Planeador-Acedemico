<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignaturaDocente extends Model
{
    protected $fillable = [
        'asignatura_grupo_id',
        'docente_id',
        'salon_id',
        'horario_id',
        'horario_2_id',

    ];

    protected $casts = [
    ];

    protected $table = 'asignaturas_docentes';

    public function asignatura()
    {
        return $this->belongsToMany(AsignaturaGrupo::class);
    }

    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }

    public function salon()
    {
        return $this->belongsTo(SalonSala::class,"salon_id");
    }

    public function horario(){
    	return $this->belongsTo(Horario::class);
    }

    public function horario_2(){
        return $this->belongsTo(Horario::class,'horario_2_id');
    }

    // public function dia()
    // {
    //     return $this->belongsTo(Dia::class);
    // }
}
