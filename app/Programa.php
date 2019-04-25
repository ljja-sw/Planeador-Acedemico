<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    protected $fillable = ['nombre','codigo'];


    public function asignaturas()
    {
    	$this->hasMany(Asignatura::class);
    }
}
