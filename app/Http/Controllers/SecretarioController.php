<?php

namespace App\Http\Controllers;

use App\User;
use Hash;
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
        return view('admin.secretario.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.secretario.edit',compact('user'));
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
        //
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
