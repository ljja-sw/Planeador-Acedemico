<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemaPlaneador extends Model
{
	protected $fillable = ['semana',
						   'fecha',
						   'tema',
						   'metodología',
						   'planeador_id',
						   'slug'];
	
	protected $table = "temas_planeador";
	
	protected $casts = [
		'fecha' => 'datetime',
	];

	public function planeador()
	{
		return $this->belongsTo(Planeador::class,'planeador_id');
	}
	
	public function metodología_tema()
	{
		return $this->belongsTo(Metodologia::class,'metodología');
	}

	public function getRouteKeyName()
	{
		return 'slug';
	}
}
