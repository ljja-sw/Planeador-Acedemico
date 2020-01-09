<?php

namespace App\Http\Controllers;

use Alert;
use App\Docente;
use App\Exports\DocentesExport;
use App\Imports\DocentesImport;
use App\TemaPlaneador;
use Excel;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $docentes = Docente::all();
        return view('admin.docente.index', compact("docentes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.docente.create');
    }

    public function reportes()
    {
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
        ]);

        $data = $request->toArray();

        $role_docente = Role::findByName("Docente", "web");

        $split_nombre = str_split($data['nombre']);
        $split_apellido = str_split($data['apellido']);
        $password = $split_nombre[0] . $data['documento_identidad'] . $split_apellido[0];

        $docente = Docente::create([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'documento_identidad' => $data['documento_identidad'],
            'email' => $data['email'],
            'password' => Hash::make($password),
        ]);

        $docente->assignRole($role_docente);

        Alert::success("Docente: {$data['nombre']} Registrado", '')->showCloseButton();
        return redirect()->route('docentes.show',$docente);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function show(Docente $docente)
    {

        $planeadores = $docente->planeadores;
        
        if (count($planeadores) >= 1) {
            foreach ($planeadores as $planeador) {
                $clases = TemaPlaneador::where("fecha->primera_clase", today()->format("Y-m-d"))
                ->orWhere("fecha->segunda_clase", today()->format("Y-m-d"))
                ->wherePlaneadorId($planeadores->first()->id)
                ->get();
            }
        } else {
            $clases = [];
        }

        return view('admin.docente.show', compact('docente', 'clases'));
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
            return redirect()->back()->with('msj', "Docente: {$data['nombre']} Editado");
        }
    }

    public function exportar()
    {
        $headers = array(
            'Content-Type' => 'application/xlsx'
        );

        $nombre_archivo = "docentes_" . now()->format("d_m_y") . ".xlsx";

        $url = Storage::url("exports/" . $nombre_archivo);

        (new DocentesExport)->store($nombre_archivo, 'exports');

        return url($url);
    }

    public function importar(Request $request)
    {
        Excel::import(new DocentesImport, $request->file( 'listado'));

        toast('Importacion exitosa', 'success', 'top');
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Docente $docente)
    {
        $docente->delete();
    }
}
