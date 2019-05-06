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
    	'validable'];


    public function programas(){
    	return $this->belongsToMany(Programa::class);
    }

    public function SalonesSalas(){
    	return $this->belongsTo(SalonSala::class);
    }

    public function asignada()
    {
        return $this->hasOne(AsignaturaDocente::class);
    }
}
