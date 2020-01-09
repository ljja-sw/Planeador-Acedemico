<?php

namespace App\Http\Controllers;

use App\AsignaturaDocente;
use App\Asignatura;
use App\SalonSala;
use App\Docente;
use App\Reporte;
use App\User;
use Hash;
use Alert;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class SecretarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $secretarios = User::role('secretario')->get();
        return view('admin.secretario.index', compact('secretarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.secretario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->toArray();
        $rol = Role::findByName("Secretario");

        $split_nombre = str_split($data['nombre']);
        $split_apellido = str_split($data['apellido']);
        $password = ucwords($split_nombre[0]) . $data['documento_identidad'] . ucwords($split_apellido[0]);

        $secretario_academico = User::create([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'documento_identidad' => $data['documento_identidad'],
            'email' => $data['correo'],
            'password' => Hash::make($password),
        ]);

        $secretario_academico->assignRole($rol);

        return redirect()->route('secretarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.secretario.show', compact('user'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->toArray();
        $user->nombre = $data['nombre'];
        $user->apellido = $data['apellido'];
        $user->documento_identidad = $data['documento_identidad'];
        $user->email = $data['correo'];

        if ($user->save()) {
            Alert::success('Secretario modificado', '')->showCloseButton();
            return redirect()->route('secretarios.show', $data['documento_identidad']);
        } else {
            Alert::error('Hubo un error intentalo mas tarde', '')->showCloseButton();
            return redirect()->route('secretarios.show', $data['documento_identidad']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
