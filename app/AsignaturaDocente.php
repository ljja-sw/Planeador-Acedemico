<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignaturaDocente extends Model
{
	protected $fillable = ['asignatura_id','docente_id','salon_id','horario_id'];
	protected $table = 'asignaturas_docentes';

    public function asignatura(){
    	return $this->belongsTo(Asignatura::class);
    }

    public function docente(){
    	return $this->belongsTo(Docente::class);
    }

    public function salon(){
    	return $this->belongsTo(SalonSala::class);
    }

    public function horario(){
    	return $this->belongsTo(Horario::class);
    }
}
