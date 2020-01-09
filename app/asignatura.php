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


    public function programa(){
        return $this->belongsToMany(Programa::class);
    }

    public function grupo()
    {
        return $this->belongsToMany(Grupo::class,'asignaturas_grupos','id_asignatura','id_grupo');
    }

    public function salonesSalas(){
    	return $this->belongsTo(SalonSala::class);
    }

    public function asignada()
    {
    }

    public function planeador(){
        return $this->hasOne(Planeador::class,'asignatura_grupo_id');
    }

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function reportesAsignatura(){
        return $this->hasMany(Reporte::class,'asignatura_id');
    }


}
