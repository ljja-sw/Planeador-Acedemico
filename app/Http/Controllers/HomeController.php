<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuracion;
use App\TemaPlaneador;
use Auth;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  { }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    switch (Auth::user()->getRoleNames()[0]) {
      case 'Docente':
        $planeadores = auth()->user()->planeadores;
        $asignaturas = auth()->user()->asignaturas;

        if (count($planeadores) >= 1) {
          foreach ($planeadores as $planeador) {
            $clases = TemaPlaneador::where("fecha->primera_clase", today()->format("Y-m-d"))
              ->orWhere("fecha->segunda_clase", today()->format("Y-m-d"))
              ->wherePlaneadorId($planeadores->first()->id)
              ->get();
          }
        } else {
          $clases = [];
        }

        return view('home.docente', compact('clases', 'asignaturas'));

        break;

      case 'Secretario':
        return view('home');
        break;

      case 'Admin':
        return view('home');
        break;
    }
  }

  public function daterange_spanish()
  {
    return response()->json('{
      "format": "MM/DD/YYYY",
      "separator": " - ",
      "applyLabel": "Apply",
      "cancelLabel": "Cancel",
      "fromLabel": "From",
      "toLabel": "To",
      "customRangeLabel": "Custom",
      "daysOfWeek": [
        "Su",
        "Mo",
        "Tu",
        "We",
        "Th",
        "Fr",
        "Sa"
      ],
      "monthNames": [
        "Enero",
        "Febrero",
        "Marzo",
        "Abril",
        "Mayo",
        "Junio",
        "Julio",
        "Agusto",
        "Septiembre",
        "Octubre",
        "Noviembre",
        "Diciembre"
      ],
      "firstDay": 1
    }');
  }
}
