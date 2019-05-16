<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
	protected $fillable = ['inicio_clases','inicio_periodo_academico','fin_periodo_academico'];
    protected $dates = ['inicio_clases'];

    public function mes_inicio_periodo()
    {
        return $this->belongsTo(Mes::class, 'inicio_periodo_academico');
    }

    public function mes_fin_periodo()
    {
        return $this->belongsTo(Mes::class, 'fin_periodo_academico');
    }
}