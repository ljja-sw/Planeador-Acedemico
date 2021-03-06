@extends('layouts.auth')

@section('title','Iniciar Sesión')


@section('content')
<form class="form-iniciar-session" action="/login" method="POST">
    @csrf
    <div class="text-center">
        <span class="text-primary p-2">
            <i class="fa fa-user fa-4x "></i>
          </span>
        <h5 class="h3 text-primary">Iniciar Sesión</h5>
        <p class="p-0 font-weight-bold">Docentes y Secretarios Académicos</p>
    </div>
    <hr class="hr-padding">
    <div class=" md-outline md-form">
        <input class="form-control" name="email" type="email" id="input_username" value="{{ old('email') }}"  required autofocus>
        <label for="input_username">Correo Electrónico</label>
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

    <div class="text-center d-flex flex-column">

        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input"  {{ old('remember') ? 'checked' : '' }} name="remember" id="defaultLoginFormRemember">
          <label class="custom-control-label" for="defaultLoginFormRemember">Recordar mis Credenciales</label>
        </div>
        <div>
            <button class="btn btn bg-primary text-white" type="submit"><i class="fa fa-sign-in-alt"></i> Iniciar Sesión</button>

        </div>
        <a href="{{route('recuperar.cuenta')}}">Olvidé mi contraseña</a>
    </div>


</form>
@endsection
