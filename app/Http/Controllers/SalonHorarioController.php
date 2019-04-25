<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Horario;
use App\SalonSala;

class SalonHorarioController extends Controller
{
    public function index()
    {
    	return "Listado de salones/salas";
    }

    public function create()
    {
    	return "Formulario para registrar un salon/sala con sus horarios incluidos";
    }

    public function store()
    {
    	return "Aqui se guarda el salon y se le sincronizan los horarios usando Laravel";
    }

    public function show(SalonSala $salon_sala)
    {
    	return $salon_sala;
    }
}
