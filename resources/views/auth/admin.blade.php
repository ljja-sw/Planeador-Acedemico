@extends('layouts.auth')

@section('theme','dark')
@section('title','Iniciar Sesión | Administrador')

@section('content')
<form class="form-iniciar-session" action="/login/admin" method="POST">
    @csrf

    <div class="text-center">
        <span class="text-primary p-2">
            <i class="fa fa-user fa-4x "></i>
          </span>
        <h5 class="h3 text-primary">Iniciar Sesión</h5>
        <p class="p-0 font-weight-bold">Administrador</p>
    </div>
    <hr class="hr-padding">

    <div class=" md-outline md-form">
        <input class="form-control" name="email" type="email" id="input_email" value="{{ old('email') }}" required autofocus>
        <label for="input_email">Correo Electrónico</label>
    </div>

    <div class="md-outline md-form">
        <input class="form-control" name="password" type="password" id="input_password" required>
        <label for="input_password"> Contraseña</label>
    </div>

    @if ($errors->has('email'))
    <p class="alert alert-danger">
        {{ $errors->first('email') }}
    </p>
    @endif
    @if ($errors->has('password'))
    <p class="alert alert-danger">
        {{ $errors->first('password') }}
    </p>
    @endif

    <div class="mx-auto text-center">
        <button class="btn btn-elegant text-white" type="submit"><i class="fa fa-sign-in-alt"></i> Iniciar Sesión</button>

    </div>
</form>
@endsection
