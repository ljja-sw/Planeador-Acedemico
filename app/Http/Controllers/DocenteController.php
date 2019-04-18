<?php

namespace App\Http\Controllers;

use App\Docente;
use App\Dependencia;
use Hash;
Use Alert;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.docente.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dependencias = Dependencia::all();
        return view('admin.docente.create',compact('dependencias'));
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
            'nombre' => 'required|min:3',
            'apellido' => 'required|min:3',
            'email' => 'required|email|unique:docentes',
            'documento_identidad' => 'required|numeric|min:10|unique:docentes',
            'dependencia' => 'required|numeric'
        ]);

        $data = $request->toArray();
        
        $role_docente = Role::findByName("Docente","web");
        
        $split_nombre = str_split($data['nombre']);
        $split_apellido = str_split($data['apellido']);
        $password = $split_nombre[0] . $data['documento_identidad'] . $split_apellido[0];

        $docente = Docente::create([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'documento_identidad' => $data['documento_identidad'],
            'email' => $data['email'],
            'password' => Hash::make($password),
            'dependencia' => $data['dependencia'],
        ]);
        
        $docente->assignRole($role_docente);

        return redirect()->route('docentes.index')->with('msj',"Docente: {$data['nombre']} Registrado");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function show(Docente $docente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function edit(Docente $docente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Docente $docente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Docente $docente)
    {
        //
    }
}
