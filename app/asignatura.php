<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Programa;

class asignatura extends Model
{

    protected $fillable = ['nombre','codigo','grupo','creditos','intensidad_horaria','habilitable','validable'];


    public function programas(){
    	return $this->belongsToMany(Programa::class);
    }

    public function Salones_salas(){
    	
    }
}
