<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{

    protected $fillable = [
        'nombre',
        'codigo',
        'grupo',
        'creditos',
        'intensidad_horaria',
        'habilitable',
        'validable'];


    public function programas(){
        return $this->belongsTo(Programa::class);
    }

    public function salonesSalas(){
        return $this->belongsTo(SalonSala::class);
    }

    public function asignada()
    {
        return $this->hasOne(AsignaturaDocente::class);
    }

    public function planeador(){
        return $this->hasOne(Planeador::class,'asignatura');
    }

    public function getRouteKeyName()
    {
        return "codigo";
    }


}
