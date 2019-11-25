<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
	protected $fillable = ['nombre','codigo'];

	public function asignaturas(){
        return $this->belongsToMany(AsignaturaGrupo::class,'asignatura_programa','programa_id');
    }

	public function getRouteKeyName()
	{
		return "id";
	}
}
