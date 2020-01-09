<?php

namespace App\Http\Controllers;

use App\AsignaturaDocente;
use App\AsignaturaGrupo;
use App\TemaPlaneador;
use App\Metodologia;
use App\Asignatura;
use App\Docente;
use App\Reporte;
use App\Planeador;
use App\Programa;
use Illuminate\Http\Request;
use Alert;
use DB;


class ReporteController extends Controller
{
    public function crear(Asignatura $asignatura){

        $metodologia = Metodologia::all();


        $planeador = $asignatura->planeador;
        

        $tema_planeador = TemaPlaneador::DoesntHave('ReporteTema')->get();    

        //$asignatura_grupo = $planeador->asignatura_grupo_id;


        $asignatura_grupo = AsignaturaGrupo::where('id_asignatura',$asignatura->id)->first();

        $programa = $asignatura_grupo->programa->first();



    return view('reporte.creacion', compact('asignatura','tema_planeador','metodologia','planeador','programa'));

    }
    public function store(Request $request){

    	$this->validate($request, [
    		'semana_tema' => 'required',
    		'tema_planeador_id' => 'required',
    		'descripcion' => 'required',
            'tipo_clase' => 'required',
    		'docente_id' => 'required',
    		'asignatura_id' => 'required',
            'programas_id' => 'required'
    	]);

        $information = $request->toArray();


        $tema = TemaPlaneador::where('id',$information['tema_planeador_id'])->first();

    	$reportar = Reporte::create([
            'semana_tema' => $information['semana_tema'],
            'descripcion' => $information['descripcion'],
            'tipo_clase' => $information['tipo_clase'],     
            'justificacion' => $information['justificacion'],
            'programas_id' => $information['programas_id'],            
            'docente_id' => $information['docente_id'],
            'asignatura_id' => $information['asignatura_id'],
            'tema_planeador_id' => $information['tema_planeador_id']

        ]);


    	if($reportar->save()){
            Alert::success('Reporte del tema: '.$tema->tema.' guardado con exito','')->showCloseButton();
       		return redirect()->route('reportes')->with('msj',"Reporte registrado");
    	}else{
            Alert::error('Hubo un error intentalo mas tarde', '')->showCloseButton();
            return redirect()->back();
        }

    	//$request->session()->flash('alert-success', 'User was successful added!');
    }

    public function listareporteSecretario()
    {
        $reportes = Reporte::all();

        return view('admin.reportes.listado-reportes', compact('reportes'));

    }

    public function show(Asignatura $asignatura, Docente $usuario)
    {


        $report = $asignatura->reportesAsignatura;


       return view('reporte.show', compact('report','asignatura'));
    }

      public function showsecretario()
    {
        $reportes = Reporte::all();

        return view('reporte.show', compact('reportes'));
    }

    public function detalle(Reporte $reporte)
    {
        $ReporteDetalleD = $reporte->reportes_docente;
        $ReporteDetalleA = $reporte->reporte_asignatura;
        //$ReporteDetalleP = $reporte->programas_id;

        $reporteD = Docente::where('id',$ReporteDetalleD)
                           ->get();

        $reporteA = Asignatura::where('id',$ReporteDetalleA)
                           ->get();


        return view('admin.reportes.detalles', compact('reporte','reporteD','reporteA'));
    }


    public function detalleDocente(Reporte $reporte, Asignatura $asignatura)
    {

        return view('reporte.detalles', compact('reporte','asignatura'));
    }


    public function editar(Reporte $reporte, Asignatura $asignatura)
    {
        $planeador = $asignatura->planeador;

        $tema_planeador = $planeador->temas;

        $metodologia = Metodologia::all();

        $asignatura_grupo = AsignaturaGrupo::where('id_asignatura',$asignatura->id)->first();

        $programa = $asignatura_grupo->programa->first();        

       return view('reporte.editar', compact('reporte','metodologia','tema_planeador','asignatura','programa'));

    }


    public function update(Request $request, Reporte $reporte)
    {
            $this->validate($request, [
            'semana_tema' => 'required',
            'descripcion' => 'required',
            'tipo_clase' => 'required',
            'docente_id' => 'required',
            'programa_id' => 'required',            
            'asignatura_id' => 'required',
            'tema_planeador_id' => 'required'
        ]);


        $data = $request->toArray();

        $reporte->semana_tema = $data['semana_tema'];
        $reporte->descripcion = $data['descripcion'];
        $reporte->tipo_clase = $data['tipo_clase'];
        $reporte->justificacion = $data['justificacion'];
        $reporte->docente_id = $data['docente_id'];
        $reporte->programas_id = $data['programas_id']; 
        $reporte->asignatura_id = $data['asignatura_id'];        
        $reporte->tema_planeador_id = $data['tema_planeador_id'];



        if($reporte->save()){
          Alert::success('Reporte del tema: '.$tema->tema.' Actualizado con exito','')->showCloseButton();
            return redirect()->route('reportes')->with('msj',"Reporte registrado");
        }else{
            Alert::error('Hubo un error intentalo mas tarde', '')->showCloseButton();
            return redirect()->back();
        }
    }

        public function destroy(Reporte $reporte)
    {
        //return $report;
       //$report = Reporte::find($reporte->id);
       // $report = Reporte::where('reporte')->find('id');

        if ($reporte->delete()){
            Alert::success('Reporte eliminada', '')->showCloseButton();
            return redirect()->back();
        }else{
            Alert::error('Hubo un error intentalo mas tarde', '')->showCloseButton();
            return redirect()->back();
        }
    }
   

}
