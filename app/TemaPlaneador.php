<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemaPlaneador extends Model
{
	protected $fillable = [
		'semana',
		'fecha',
		'tema',
		'metodologia',
		'planeador_id',
		'slug'
	];
	
	protected $table = "temas_planeador";
	
	public $timestamps = false;
	
	protected $casts = [
		'fecha' => 'array',
	];

	public function getFechas($fecha = "")
	{
		if($fecha == ""){
			if (count($this->fecha) > 1) {
				return "{$this->fecha['primera_clase']} - {$this->fecha['segunda_clase']}";
			} else {
				return "{$this->fecha['primera_clase']}";
			}
		}else{
			return "{$this->fecha[$fecha]}";
		}
	}

	public function planeador()
	{
		return $this->belongsTo(Planeador::class, 'planeador_id');
	}
	
	public function metodología_tema()
	{
		return $this->belongsTo(Metodologia::class, 'metodologia');
	}
	
	public function getRouteKeyName()
	{
		return 'slug';
	}
}
