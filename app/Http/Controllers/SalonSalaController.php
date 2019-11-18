<?php

namespace App\Http\Controllers;

use App\SalonSala;
use App\Horario;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Dia;
use App\Jornada;
use Carbon\Carbon;
use Alert;

class SalonSalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salones = SalonSala::with('horarios')->get();
        return view('admin.salon.index', compact('salones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:3|unique:salones_salas',
            'capacidad' => 'required|numeric',
        ]);

        $salon_sala = SalonSala::create([
            'nombre' => $request['nombre'],
            'slug' => str_slug($request['nombre'], '-'),
            'capacidad' => $request['capacidad']
        ]);

        return redirect()->route("salon.show",$salon_sala);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SalonSala  $salonSala
     * @return \Illuminate\Http\Response
     */
    public function show(SalonSala $salon)
    {
        $jornadas = Jornada::all();
        return view('admin.salon.show', compact('salon', 'jornadas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SalonSala  $salonSala
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalonSala $salon)
    {
        $request->validate([
            'nombre' => 'required|min:4',
            'capacidad' => 'required|numeric',
        ]);

        $salon->nombre = $request->nombre;
        $salon->capacidad = $request->capacidad;
        $salon->slug = str_slug($request->nombre);
        $salon->save();

        Alert::success('Salon editado satisfactoriamente');
        return redirect()->route('salon.show',$salon);
    }

    public function updateHorario(Request $request, Horario $horario)
    {
        $hora_inicio = Carbon::createFromTimeString($request['hora_inicio'], 'America/Bogota');
        $hora_fin = Carbon::createFromTimeString($request['hora_fin'], 'America/Bogota');

        if ($hora_fin->lessThanOrEqualTo($hora_inicio)) {
            return redirect()->back()->withErrors("Hora Inicio debe ser menor Hora Fin ");
        };

        $horario = Horario::find($request->id);
        $horario->hora_inicio = $request->hora_inicio;
        $horario->hora_fin = $request->hora_fin;
        $horario->dia = $request->dia;
        $horario->save();

        Alert::success('Horario editado satisfactoriamente');
        return redirect()->back();
    }

    public function agregarHorario(Request $request, SalonSala $salon)
    {
        $hora_inicio = Carbon::createFromTimeString($request['hora_inicio'], 'America/Bogota');
        $hora_fin = Carbon::createFromTimeString($request['hora_fin'], 'America/Bogota');

        if ($hora_fin->lessThanOrEqualTo($hora_inicio)) {
            return redirect()->back()->withErrors("Hora Inicio debe ser menor Hora Fin ");
        };


        $horario = Horario::make([
            'hora_inicio' => date("H:i", strtotime($request['hora_inicio'])),
            'hora_fin' => date("H:i", strtotime($request['hora_fin'])),
            'dia' => $request['dia'],
            'jornada_id' => $request['jornada'],
            'salon_sala_id'  => $salon->id,
        ]);

        foreach($salon->horarios as $horario_salon){
         if ($horario_salon->cruceHorario($horario)) {
            $error = "Conflicto de horarios entre {$horario_salon->dia_semana->dia} de {$horario_salon->hora_inicio} a {$horario_salon->hora_fin} y {$horario->dia_semana->dia} de {$horario->hora_inicio} a {$horario->hora_fin}.";

            return redirect()->back()->withErrors($error);
        }
    }

    try {
        $horario->save();
        Alert::success('Horario creado satisfactoriamente');
        return redirect()->back();
    } catch (QueryException  $th) {
        alert('Hubo un error registrando el horario', 'Vuelve a intentarlo después', 'error')->showConfirmButton('Entendido');
        return redirect()->route('salon.index');
    }
}

public function destroyHorario(Request $request)
{
    $horario = Horario::find($request->id);

    try {
        $horario->delete();
        Alert::success('Horario eliminado satisfactoriamente');
        return redirect()->back();
    } catch (QueryException  $th) {
        alert('Hubo un error eliminando el horario', 'Verifica que no esté ocupado', 'error')->showConfirmButton('Entendido');
        return redirect()->route('salon.index');
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SalonSala  $salonSala
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalonSala $salon)
    {
        try {
            $salon->delete();
            Alert::success('Salon eliminado satisfactoriamente');
            return redirect()->route('salon.index');
        } catch (QueryException  $th) {
            Alert::error('Hubo un error eliminando el Salon, intentalo de nuevo');
            return redirect()->back();
        }
    }
}
