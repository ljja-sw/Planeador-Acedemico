<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{

	public function docente(){

		return $this->belongsTo(Docente::class);
	}


	public function asignatura(){

		return $this->belongsTo(asignatura::class);

	}

    
    public function tema(){

		return $this->belongsTo(TemaPlaneador::class);

    }
}
