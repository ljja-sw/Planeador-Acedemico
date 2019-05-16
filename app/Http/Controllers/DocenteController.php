<?php

namespace App\Http\Controllers;

use App\Asignatura;
use App\Docente;
use App\AsignaturaDocente;
use App\Metodologia;
use App\Configuracion;
use App\Dependencia;
use App\Reporte;
use Hash;
Use PDF;
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
        $docentes = Docente::with('dependencia_docente:nombre,id')->get();
        return view('admin.docente.index',compact("docentes"));
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

    public function reportes(){

        //$DocenteReportes = AsignaturaDocente::find($id);
        
        return view("reportes");

        
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
        $password = $split_nombre[0].$data['documento_identidad'].$split_apellido[0];

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

    public function asignaturas()
    {
        $configuracion = Configuracion::find(1);
        return view("mis_asignaturas",compact('configuracion'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function show(Docente $docente)
    {
        return view('admin.docente.show',compact('docente'));
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
        $request->validate([
            'nombre' => 'required|min:3',
            'apellido' => 'required|min:3',
            'correo' => 'required|email',
            'documento_identidad' => 'required|numeric|min:10',
        ]);

        $data = $request->toArray();
        
        $docente->nombre = $data['nombre'];
        $docente->apellido = $data['apellido'];
        $docente->email = $data['correo'];
        $docente->documento_identidad = $data['documento_identidad'];
        
        if ($docente->save()) {
            return redirect()->back()->with('msj',"Docente: {$data['nombre']} Editado");
        }
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
