<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Asignatura;
Use Alert;


class AsignaturaController extends Controller
{
    public function index(){
    	return view('admin.asignatura.crear');
    }


    public function ingreso(Request $request){

    	$this->validate($request, [
    		'nombre' => 'required',
    		'codigo' => 'required|numeric',
    		'grupo' => 'required|numeric',
    		'creditos' => 'required|numeric',
    		'intensidad_horaria' => 'required|numeric|max:10',
    		'habilitable' => 'required',
    		'validable' => 'required'
    	]);

    	if(Asignatura::create($request->all())){
    		return back()->with('msj','Asignatura registrada exitosamente!');
    	}else{
    		return back()->with();
    	}

    	//$request->session()->flash('alert-success', 'User was successful added!');
    }

    public function show()
    {
        $asignaturas = asignatura::all();

        return view('admin.asignatura.show', compact('asignaturas'));
    }


    public function detalle(asignatura $asigna)
    {
        return view('admin.asignatura.detalles', compact('asigna'));
    }


    public function update(Request $request, asignatura $asigna)
    {

        $this->validate($request, [
            'nombre' => 'required',
            'codigo' => 'required',
            'grupo' => 'required',
            'creditos' => 'required',
            'intensidad_horaria' => 'required',
            'habilitable' => 'required',
            'validable' => 'required'
        ]);

        $data = $request->toArray();

        $asigna->nombre = $data['nombre'];
        $asigna->codigo = $data['codigo'];
        $asigna->grupo = $data['grupo'];
        $asigna->creditos = $data['creditos'];
        $asigna->intensidad_horaria = $data['intensidad_horaria'];
        $asigna->habilitable = $data['habilitable'];
        $asigna->validable = $data['validable'];
            
            if ($asigna->save()) {
                Alert::success('Asignatura modificado', '')->showCloseButton();
                return redirect()->route('asignatura.detalles',$asigna);
            }else{
                Alert::error('Hubo un error intentalo mas tarde', '')->showCloseButton();
                return redirect()->route('asignatura.detalles',$asigna);
            }
    }

    public function destroy(asignatura $asigna)
    {
        if ($asigna->delete()){
            Alert::success('Asignatura eliminada', '')->showCloseButton();
            return redirect()->route('asignaturas.show');
        }else{
            Alert::error('Hubo un error intentalo mas tarde', '')->showCloseButton();
            return redirect()->route('asignaturas.show');
        }
    }


}
