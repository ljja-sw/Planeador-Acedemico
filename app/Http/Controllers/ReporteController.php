<?php

namespace App\Http\Controllers;

use App\AsignaturaDocente;
use App\TemaPlaneador;
use App\Metodologia;
use App\Asignatura;
use App\Docente;
use App\Reporte;
use App\Planeador;
use Illuminate\Http\Request;



class ReporteController extends Controller
{
    public function crear(Asignatura $asignatura){

        $planeador = $asignatura->planeador;

        $tema_planeador = $planeador->temas;

        $metodologia = Metodologia::all();

    return view('reporte.creacion', compact('asignatura','tema_planeador','metodologia'));

    }
    public function store(Request $request){

    	$this->validate($request, [
    		'semana_tema' => 'required',
    		'tema_planeador' => 'required',
    		'descripcion' => 'required',
            'tipo_clase' => 'required',
    		'reportes_docente' => 'required',
    		'reporte_asignatura' => 'required',
    	]);

        $information = $request->toArray();


    	$reportar = Reporte::create([
            'semana_tema' => $information['semana_tema'],
            'tema_planeador' => $information['tema_planeador'],
            'descripcion' => $information['descripcion'],
            'tipo_clase' => $information['tipo_clase'],     
            'justificacion' => $information['justificacion'],
            'reportes_docente' => $information['reportes_docente'],
            'reporte_asignatura' => $information['reporte_asignatura'],
            'programas_id' => $information['programas_id']
        ]);


    	if($reportar->save()){
       		return redirect()->route('reportes')->with('msj',"Reporte registrado");
    	}else{
    		return back()->with();
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


    public function editar(Reporte $report, Asignatura $asignatura)
    {
        $planeador = $asignatura->planeador;

        $tema_planeador = $planeador->temas;

        $metodologia = Metodologia::all();

       return view('reporte.editar', compact('report','metodologia','tema_planeador','asignatura'));

    }


    public function update(Request $request, Reporte $report)
    {
            $this->validate($request, [
            'semana_tema' => 'required',
            'tema_planeador' => 'required',
            'descripcion' => 'required',
            'tipo_clase' => 'required',
            'reportes_docente' => 'required',
            'reporte_asignatura' => 'required'

        ]);


        $data = $request->toArray();

        $report->semana_tema = $data['semana_tema'];
        $report->tema_planeador = $data['tema_planeador'];
        $report->descripcion = $data['descripcion'];
        $report->tipo_clase = $data['tipo_clase'];
        $report->justificacion = $data['justificacion'];
        $report->reportes_docente = $data['reportes_docente'];
        $report->reporte_asignatura = $data['reporte_asignatura'];
        $report->programas_id = $data['programas_id'];  


        if ($report->save()) {
            return redirect()->back()->with('msj',"Reporte Modificado");
        }
    }

        public function destroy(Reporte $report)
    {
        return $report;
       // $report = Reporte::find(id);

        if ($report->delete()){
            Alert::success('Reporte eliminada', '')->showCloseButton();
            return redirect()->back();
        }else{
            Alert::error('Hubo un error intentalo mas tarde', '')->showCloseButton();
            return redirect()->back();
        }
    }
   

}
