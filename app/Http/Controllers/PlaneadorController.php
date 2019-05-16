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
        $dia = AsignaturaDocente::whereAsignaturaId($asignatura->id)
            ->get()
            ->first()
            ->dia;

        $configuracion = Configuracion::find(1);

        $metodologías = Metodologia::all();
        return view('planeador.create',compact('metodologías','asignatura','dia','configuracion'));
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
            'fecha_registro' => now(),
            'programa_academico' => 1,
            'asignatura' =>  $request->asignatura,
            'docente' =>  $request->docente,
            'evaluaciones' =>  $request->evaluaciones,
            'firmado' => 1,
            'revisado' => 1
        ]);

        for ($i=0; $i < count( $request->semana) ; $i++) {
            $temas[] = TemaPlaneador::create([
                'semana' =>  $request->semana[$i],
                'fecha' =>  $request->fecha[$i],
                'tema'  => $request->tema[$i],
                'metodología'  =>  $request->metodologia[$i],
                'planeador_id' => $planeador->id,
                'slug' => str_slug("-",$request->tema[$i])
            ]);}

            return redirect()->route('docente.planeador.ver',$planeador);
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Planeador  $planeador
     * @return \Illuminate\Http\Response
     */
    public function show(Planeador $planeador)
    {
      $configuracion = Configuracion::find(1);
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
