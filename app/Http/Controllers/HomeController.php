<?php

namespace App\Http\Controllers;

use PDF;
use Auth;
use App\Planeador;
use App\Configuracion;
use Carbon\Carbon;
use App\TemaPlaneador;
use App\AsignaturaDocente;
use Illuminate\Http\Request;

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
    
    public function planeador_pdf(Planeador $planeador)
    {
        $configuracion = Configuracion::find(1);
        
        $pdf = PDF::loadView('pdf.planeador', compact('planeador', 'configuracion')); 
        return $pdf->download($planeador->asignatura_planeador->nombre.".pdf");

    }
}
