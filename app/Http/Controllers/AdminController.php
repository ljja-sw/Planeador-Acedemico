<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuracion;
use App\Dia;
use App\Mes;


class AdminController extends Controller
{
    public function configuraciones()
    {
        $configuraciones = Configuracion::find(1);
        $dias = Dia::all();
        $meses = Mes::all();
        return view('configuraciones',compact('dias','meses','configuraciones'));
    }

    public function guardarConfiguraciones(Request $request)
    {
        $data = $request->toArray();
        $configuraciones = Configuracion::find(1);

        $configuraciones->inicio_clases = $data['inicio_clases'];
        $configuraciones->inicio_periodo_academico = $data['inicio-periodo'];
        $configuraciones->fin_periodo_academico = $data['fin-periodo'];

        $configuraciones->save();

        return redirect()->back()->with('msj','Configuraciones guardadas');
    }
}
