@extends('layouts.auth')

@section('theme','dark')
@section('title','Iniciar Sesión | Administrador')

@section('content')
<form class="form-signin" action="/login/admin" method="POST">
    @csrf

    <div class="text-center mb-4">
            <img class="mb-1 img-fluid w-75" src="{{ asset('images/logo_color.png') }}" alt="">
            <h1 class="h3 mb-0  text-elegant font-weight-normal">Inicio de Sesión</h1>
            <h5 class="font-weight-bold">Administrador</h5>
    </div>

    <div class=" md-outline md-form">
        <input class="form-control" name="email" type="email" id="input_email" value="{{ old('email') }}" required autofocus>
        <label for="input_email">Correo Electrónico</label>
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

    <div class="md-outline md-form">
        <input class="form-control" name="password" type="password" id="input_password" required>
        <label for="input_password"> Contraseña</label>
    </div>
    <button class="btn btn-lg btn-elegant text-white btn-block" type="submit"><i class="fa fa-sign-in-alt"></i> Iniciar Sesión</button>
</form>
@endsection
