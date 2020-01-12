<?php

namespace App\Http\Controllers;
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
        // Obtener los horarios usando el modelo AsignaturaDocente
        $asignaturas = auth()->user()->asignaturas;

        switch (Auth::user()->getRoleNames()[0]) {
            case 'Docente':

            $planeadores = auth()->user()->planeadores;
            
            $asignaturas = auth()->user()->asignaturas;

                if (count($planeadores)>=1) {
                foreach ($planeadores as $planeador) {
                    $clases = $planeador->temas()
                        ->where("fecha->primera_clase", today()->format("Y-m-d"))
                        ->orWhere("fecha->segunda_clase", today()->format("Y-m-d"))
                        ->get();
                    }
                }else{
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

}
