<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Asignatura;
use App\Docente;
use App\Horario;
use App\SalonSala;
use App\AsignaturaDocente;
Use Alert;


class AsignaturaController extends Controller
{
    public function index(){
    	return view('admin.asignatura.crear');
    }


    public function ingreso(Request $request){

    	$this->validate($request, [
    		'nombre' => 'required',
    		'codigo' => 'required',
    		'grupo' => 'required|numeric',
    		'creditos' => 'required|numeric|max:6',
    		'intensidad_horaria' => 'required|numeric|max:6',
    		'habilitable' => 'required',
    		'validable' => 'required'
    	]);

        $data = $request->toArray();

        $asignatura = Asignatura::make([
            'nombre' => $data['nombre'],
            'codigo' => $data['codigo'],
            'grupo' => $data['grupo'],
            'creditos' => $data['creditos'],
            'intensidad_horaria' => $data['intensidad_horaria'],
            'habilitable' => $data['habilitable'],
            'validable' => $data['validable'],
            'slug' => str_slug($data['nombre'],"-")
        ]);

        if($asignatura->save()){
            Alert::success('Asignatura registrada Satisfactoriamente', '')->showCloseButton();
            return redirect()->route('asignatura.detalles',$asignatura);
        }else{
          return back();
      }
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
        Alert::success('Asignatura modificada Satisfactoriamente', '')->showCloseButton();
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


public function formDesignarAsignatura(Request $request)
{
    $docente = Docente::find($request->docente);
    $asignatura = Asignatura::find($request->asignatura);
    $salones = SalonSala::all();

    return view(
        'delegar_asignatura',
        compact('docente', 'asignatura', 'salones')
    );
}

public function DesignarAsignatura(Request $request)
{
    $docente = Docente::find($request->docente);
    $asignatura = Asignatura::find($request->asignatura);

    $horarios_docente = AsignaturaDocente::where('id',$docente->id)->get();
    $horario = Horario::find($request->horario[0]);

    foreach ($horarios_docente as $horarios) {

        if ($horarios->horario->cruceHorario($horario)) {
            $error = "Cruce de horarios con {$horarios->asignatura->nombre} de {$horarios->horario->hora_inicio} a {$horarios->horario->hora_fin} el día {$horarios->horario->dia_semana->dia}";
            return redirect()->back()->withErrors($error);

        }else if($horarios->horario_2 && $horarios->horario_2->cruceHorario($horario)){
            $error = "Cruce de horarios con {$horarios->asignatura->nombre} de {$horario->horario_2->hora_inicio} a {$horarios->horario_2->hora_fin} el día {$horarios->horario->dia_semana->dia}";
            return redirect()->back()->withErrors($error);
        }

    }

    if (count($request->horario)>1) {
        $horario_2 = Horario::find($request->horario[1]);

        foreach ($horarios_docente as $horarios) {

            if ($horarios->horario->cruceHorario($horario_2)) {
                $error = "Cruce de horarios con {$horarios->asignatura->nombre} de {$horarios->horario->hora_inicio} a {$horarios->horario->hora_fin} el día {$horarios->horario->dia_semana->dia}"; 
                return redirect()->back()->withErrors($error);


            }else if($horarios->horario_2 && $horarios->horario_2->cruceHorario($horario_2)){
                $error = "Cruce de horarios con {$horarios->asignatura->nombre} de {$horarios->horario_2->hora_inicio} a {$horarios->horario_2->hora_fin} el día {$horarios->horario_2->dia_semana->dia}";
                return redirect()->back()->withErrors($error);

            }

        }
        if ($request->horario[1] == $request->horario[0]) {
            return redirect()->back()->withErrors("No se puede asignar el mismo horario 2 veces");
        };

        AsignaturaDocente::create([
            'asignatura_id' => $request->asignatura,
            'docente_id'  => $request->docente,
            'horario_id'  => $request->horario[0],
            'horario_2_id'  => $request->horario[1]

        ]);
    }else{
     AsignaturaDocente::create([
        'asignatura_id' => $request->asignatura,
        'docente_id'  => $request->docente,
        'horario_id'  => $request->horario[0]
    ]);
 }

 return redirect('/')->with('msj', "Se ha asignado {$asignatura->nombre} al docente {$docente->nombre_completo()}");
}

}
