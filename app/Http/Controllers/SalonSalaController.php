<?php

namespace App\Http\Controllers;

use App\SalonSala;
use App\Horario;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Dia;
use App\Jornada;
use Carbon\Carbon;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jornadas = Jornada::all();
        $dias = Dia::all();
        return view('admin.salon.create', compact('jornadas', 'dias'));
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

        for ($h = 0; $h < count($request["hora_inicio"]); $h++) {
            $horario = Horario::make([
                'hora_inicio' => $request['hora_inicio'][$h],
                'hora_fin' => $request['hora_fin'][$h],
                'dia' => $request['dia'][$h],
                'jornada_id' => $request['jornada'][$h],
                'salon_sala_id'  => $salon_sala->id,
            ]);

            $salon_sala->horarios()->save($horario);
        }
        $numero_horarios = count($salon_sala->horarios);

        return redirect()->route("salon.index")->with('msj', "Se ha registrado {$request['nombre']} con {$numero_horarios} horarios disponibles");
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

        toast('Salon/Sala editado satisfactoriamente', 'success', 'top');
        return redirect()->back();
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

        toast('Horario editado satisfactoriamente', 'success', 'top');
        return redirect()->back();
    }

    public function agregarHorario(Request $request, SalonSala $salon)
    {
        $hora_inicio = Carbon::createFromTimeString($request['hora_inicio'], 'America/Bogota');
        $hora_fin = Carbon::createFromTimeString($request['hora_fin'], 'America/Bogota');

        if ($hora_fin->lessThanOrEqualTo($hora_inicio)) {
            return redirect()->back()->withErrors("Hora Inicio debe ser menor Hora Fin ");
        };

        Horario::create([
            'hora_inicio' => $request['hora_inicio'],
            'hora_fin' => $request['hora_fin'],
            'dia' => $request['dia'],
            'jornada_id' => $request['jornada'],
            'salon_sala_id'  => $salon->id,
        ]);

        toast('Horario creado satisfactoriamente', 'success', 'top');
        return redirect()->back();
    }

    public function destroyHorario(Request $request)
    {
        $horario = Horario::find($request->id);

        try {
            $horario->delete();
            toast('Horario eliminado satisfactoriamente', 'success', 'top');
            return redirect()->back();
        } catch (QueryException  $th) {
            alert('Hubo un error eliminando el horario', 'Verifica que no esté ocupado', 'error')->showConfirmButton('Entendido');
            return redirect()->back();
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
            toast('Salon/Sala eliminado satisfactoriamente', 'success', 'top');
            return redirect()->back();
        } catch (QueryException  $th) {
            toast('Hubo un error eliminando el Salon/Sala, intentalo de nuevo', 'error', 'top');
            return redirect()->back();
        }
    }
}
