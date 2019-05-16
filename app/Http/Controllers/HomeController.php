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
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        switch (Auth::user()->getRoleNames()[0]) {
          case 'Docente':
              $clases = TemaPlaneador::whereFecha(now()->format("Y-m-d"))->get();
              return view('home.docente',compact('clases'));
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
