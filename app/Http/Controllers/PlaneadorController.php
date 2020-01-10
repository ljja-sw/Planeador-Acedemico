<?php

namespace App\Http\Controllers;

use PDF;
use App\Grupo;
use App\Planeador;
use App\Asignatura;
use App\Configuracion;
use App\TemaPlaneador;
use App\AsignaturaGrupo;
use App\AsignaturaDocente;
use App\Metodologia;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PlaneadorController extends Controller
{
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create(Asignatura $asignatura,Grupo $grupo)
    {
        $asignatura_grupo = AsignaturaGrupo::
        where('id_asignatura',$asignatura->id)
        ->where('id_grupo',$grupo->id)->first();

        $asignatura_docente = AsignaturaDocente::
        where('asignatura_grupo_id',$asignatura_grupo->id)->first();

        $programa = $asignatura_grupo->programa->first();

        $dias[] = $asignatura_docente->horario->dia_semana->dia_semana;
        if ($asignatura_docente->horario_2) {
            $dias[] = $asignatura_docente->horario_2->dia_semana->dia_semana;
        }else{

        }

        $configuracion = Configuracion::find(1);

        $metodologías = Metodologia::all();

        return view('planeador.create', compact('metodologías', 'asignatura', 'dias', 'configuracion','programa','asignatura_grupo'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $grupo = AsignaturaGrupo::find($request->asignatura_grupo)->grupo;

        $planeador = Planeador::create([
            'asignatura_grupo_id' =>  $request->asignatura_grupo,
            'docente_id' =>  $request->docente,
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

        return redirect()->route('docente.planeador.ver', [$planeador->asignatura_planeador->asignatura,$grupo]);
    }

            /**
            * Display the specified resource.
            *
            * @param  \App\Planeador  $planeador
            * @return \Illuminate\Http\Response
            */
            public function show(Asignatura $asignatura,Grupo $grupo)
            {
                $asignatura_grupo = AsignaturaGrupo::
                where('id_asignatura',$asignatura->id)
                ->where('id_grupo',$grupo->id)->first();

                $asignatura_docente = AsignaturaDocente::
                where('asignatura_grupo_id',$asignatura_grupo->id)->first();

                $programa = $asignatura_grupo->programa->first();

                $metodologías = Metodologia::all();

                $configuracion = Configuracion::find(1);
                $planeador = $asignatura->planeador;

                return view('planeador.show', compact('planeador','grupo','programa', 'configuracion', 'metodologías'));
            }

            /**
            * Show the form for editing the specified resource.
            *
            * @param  \App\Planeador  $planeador
            * @return \Illuminate\Http\Response
            */
            public function edit(Asignatura $asignatura,Grupo $grupo)
            {
                $asignatura_grupo = AsignaturaGrupo::
                where('id_asignatura',$asignatura->id)
                ->where('id_grupo',$grupo->id)->first();

                $asignatura_docente = AsignaturaDocente::
                where('asignatura_grupo_id',$asignatura_grupo->id)->first();

                $programa = $asignatura_grupo->programa->first();

                $metodologías = Metodologia::all();

                $configuracion = Configuracion::find(1);
                $planeador = $asignatura->planeador;

                return view('planeador.edit', compact('planeador','grupo','programa', 'configuracion', 'metodologías'));
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

            public function actualizarFechas(Planeador $planeador,Grupo $grupo)
            {
                $asignatura_grupo = AsignaturaGrupo::find($planeador->asignatura_grupo_id);

                $asignatura_docente = AsignaturaDocente::
                where('asignatura_grupo_id',$asignatura_grupo->id)->first();

                $programa = $asignatura_grupo->programa->first();

                $dias[] = $asignatura_docente->horario->dia_semana->dia_semana;
                if ($asignatura_docente->horario_2) {
                    $dias[] = $asignatura_docente->horario_2->dia_semana->dia_semana;
                }else{

                }
                $configuracion = Configuracion::find(1);

                foreach ($planeador->temas as $tema) {
                    if(count($dias)>1){
                        $fechas = [$configuracion->inicio_clases->add($tema->semana-1,'week')->weekday($dias[0])->format("Y-m-d"),
                    $configuracion->inicio_clases->add($tema->semana-1,'week')->weekday($dias[1])->format("Y-m-d")];
                         $fechas_json = ["primera_clase" => $fechas[0], "segunda_clase" => $fechas[1]];
                    }else{
                        $fechas = $configuracion->inicio_clases->add($tema->semana-1,'week')->weekday($dias[0])->format("Y-m-d");
                        $fechas_json = ["primera_clase" => $fechas];
                    }
                    $tema->fecha = $fechas_json;
                    $tema->save();
                }
                toast('Fechas actualizadas', 'success', 'top');
                return redirect()->back();
            }

            public function generarPlaneadorForm(Request $request)
            {
                $asignatura = Asignatura::find($request->asignatura);
                return redirect()->route('docente.generar.planeador', $asignatura);
            }


            public function planeador_pdf(Planeador $planeador,Grupo $grupo)
            {
                $asignatura_grupo = AsignaturaGrupo::
                where('id_asignatura',$planeador->asignatura_planeador->asignatura->id)
                ->where('id_grupo',$grupo->id)->first();

                $asignatura_docente = AsignaturaDocente::
                where('asignatura_grupo_id',$asignatura_grupo->id)->first();

                $programa = $asignatura_grupo->programa->first();

                $configuracion = Configuracion::find(1);


                $pdf = PDF::loadView('pdf.planeador', compact('planeador', 'configuracion','programa'));                
                return $pdf->download($planeador->asignatura_planeador->asignatura->nombre.".pdf");

            }
        }

