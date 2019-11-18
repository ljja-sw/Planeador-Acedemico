<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Asignatura extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nombre',
        'codigo',
        'grupo',
        'creditos',
        'intensidad_horaria',
        'habilitable',
        'validable',
        'slug'];


    public function programas(){
        return $this->belongsToMany(Programa::class,'programa_academico');
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
        return "slug";
    }


}
