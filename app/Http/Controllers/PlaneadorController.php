<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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

        $asignatura_docente = AsignaturaDocente::whereAsignaturaId($asignatura->id)
        ->get()->first();

        $dias[] = $asignatura_docente->horario->dia_semana->dia_semana;     
        if ($asignatura_docente->horario_2) {
          $dias[] = $asignatura_docente->horario_2->dia_semana->dia_semana;
      }else{

      }

      $configuracion = Configuracion::find(1);

      $metodologías = Metodologia::all();

      return view('planeador.create', compact('metodologías', 'asignatura', 'dias', 'configuracion'));
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
            $fechas_json = (count($fechas_explode) > 1) ? ["primera_clase" => $fechas_explode[0], "segunda_clase" => $fechas_explode[1]] : ["primera_clase" => $fechas_explode[0]];

            TemaPlaneador::create([
                'semana' =>  $tema['semana'],
                'fecha' =>  $fechas_json,
                'tema'  => $tema['tema'],
                'metodologia'  =>  $tema['metodologia'],
                'planeador_id' => $planeador->id,
                'slug' => str_slug($tema['tema'], "-")
            ]);
        }

        return redirect()->route('docente.planeador.ver', $planeador->asignatura_planeador);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Planeador  $planeador
     * @return \Illuminate\Http\Response
     */
    public function show(Asignatura $asignatura)
    {
        $metodologías = Metodologia::all();

        $configuracion = Configuracion::find(1);
        $planeador = $asignatura->planeador;

        return view('planeador.show', compact('planeador', 'configuracion', 'metodologías'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Planeador  $planeador
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignatura $asignatura)
    {
        $configuracion = Configuracion::find(1);
        $planeador = $asignatura->planeador;

        return view('planeador.edit', compact('planeador', 'configuracion'));
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

    public function editarPlaneador(Request $request, Planeador $planeador)
    {
        $planeador->evaluaciones = $request->evaluaciones;
        $planeador->save();

        toast('Evaluaciones editadas satisfactoriamente', 'success', 'top');
        return redirect()->back();
    }

    public function editarTema(Request $request)
    {
        $tema = TemaPlaneador::find($request->id);
        $planeador = Planeador::find($tema->planeador_id);

        $planeador->updated_at = now();
        $tema->tema = $request->tema;
        $tema->metodologia = $request->metodologia;
        $tema->slug = str_slug($request->tema);
        $tema->save();
        $planeador->save();

        toast('Tema editado satisfactoriamente', 'success', 'top');
        return redirect()->back();
    }

    public function generarPlaneadorForm(Request $request)
    {
        $asignatura = Asignatura::find($request->asignatura);
        return redirect()->route('docente.generar.planeador', $asignatura);
    }
}
