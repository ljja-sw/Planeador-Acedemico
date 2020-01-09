<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignaturaGrupo extends Model
{
	protected $fillable = [
		'id_asignatura',
		'id_grupo',
	];

	protected $casts = [
	];

    protected $table = 'asignaturas_grupos';

	public $timestamps = false;

	public function asignatura()
	{
		return $this->belongsTo(Asignatura::class,'id_asignatura');
	}

	public function grupo()
	{
		return $this->belongsTo(Grupo::class,'id_grupo');
    }

    public function programa()
    {
        return $this->belongsToMany(Programa::class,'asignatura_programa','asignatura_grupo_id');
    }
}
