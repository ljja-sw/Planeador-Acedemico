<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asignatura extends Model
{

    protected $fillable = ['nombre','codigo','grupo','creditos','intensidad_horaria','habilitable','validable'];


    public function programas(){
    	return $this->belongsToMany(Programas::class);
    }

    public function Salones_salas(){
    	
    }
}
