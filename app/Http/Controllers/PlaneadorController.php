<?php

namespace App\Http\Controllers;

use App\Planeador;
use App\Asignatura;
use App\Configuracion;
use App\TemaPlaneador;
use App\AsignaturaDocente;
use App\Metodologia;
use Illuminate\Http\Request;

class PlaneadorController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Asignatura $asignatura)
    {

        $dias = AsignaturaDocente::whereAsignaturaId($asignatura->id)
            ->get()->first()->dias;

        $configuracion = Configuracion::find(1);

        $metodologías = Metodologia::all();
        return view('planeador.create',compact('metodologías','asignatura','dias','configuracion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $planeador = Planeador::create([
            'programa_academico' => 1,
            'asignatura' =>  $request->asignatura,
            'docente' =>  $request->docente,
            'evaluaciones' =>  $request->evaluaciones,
        ]);

        foreach ($request->temas as $tema) {

            $fechas_explode = explode(' - ', $tema['fecha']);
            $fechas_json = (count($fechas_explode)>1) ? ["primera_clase" => $fechas_explode[0], "segunda_clase" => $fechas_explode[1]] :["primera_clase" => $fechas_explode[0]];

            TemaPlaneador::create([
                'semana' =>  $tema['semana'],
                'fecha' =>  $fechas_json,
                'tema'  => $tema['tema'],
                'metodologia'  =>  $tema['metodologia'],
                'planeador_id' => $planeador->id,
                'slug' => str_slug($tema['tema'],"-")
            ]);
        }

            return redirect()->route('docente.planeador.ver',$planeador->asignatura_planeador);
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Planeador  $planeador
     * @return \Illuminate\Http\Response
     */
    public function show(Asignatura $asignatura)
    {
      $configuracion = Configuracion::find(1);
      $planeador = $asignatura->planeador;

      return view('planeador.show',compact('planeador','configuracion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Planeador  $planeador
     * @return \Illuminate\Http\Response
     */
    public function edit(Planeador $planeador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Planeador  $planeador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Planeador $planeador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Planeador  $planeador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Planeador $planeador)
    {
        //
    }

    public function generarPlaneadorForm(Request $request)
    {
       $asignatura = Asignatura::find($request->asignatura);
       return redirect()->route('docente.generar.planeador',$asignatura);
    }
}
