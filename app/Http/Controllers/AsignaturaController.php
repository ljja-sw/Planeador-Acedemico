<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Asignatura;


class AsignaturaController extends Controller
{
    public function index(){
    	return view('admin.asignatura');
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
    		return back()->with('msj','subject was successful added!');
    	}else{
    		return back()->with();
    	}

    	//$request->session()->flash('alert-success', 'User was successful added!');
    }
}
