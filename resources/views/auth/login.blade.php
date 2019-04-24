@extends('layouts.auth')

@section('title','Iniciar Sesión | Docentes')


@section('content')
<form class="form-signin" action="/login" method="POST">
    @csrf
    <div class="text-center mb-4">
        <img class="mb-1 img-fluid" src="{{ asset('images/logo_color.png') }}" alt="">
        <h1 class="h3 mb-0  text-primary font-weight-normal">Inicio de Sesión</h1>
        <h5 class="font-weight-bold">Docentes</h5>
    </div>
    <div class=" md-outline md-form">
        <input class="form-control" name="email" type="email" id="input_username" value="{{ old('email') }}"  required autofocus>
        <label for="input_codigo">Correo Electrónico</label>
    </div>


    <div class="md-outline md-form">
        <input class="form-control" name="password" type="password" id="input_password" required>
        <label for="input_password"> Contraseña</label>
    </div>

    <div class=" my-2">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input"  {{ old('remember') ? 'checked' : '' }} name="remember" id="defaultLoginFormRemember">
          <label class="custom-control-label" for="defaultLoginFormRemember">Recordar mis Credenciales</label>
      </div>
  </div>

  <button class="btn btn-lg bg-primary text-white btn-block" type="submit"><i class="fa fa-sign-in-alt"></i> Iniciar Sesión</button>

  <div class="text-right">
    <a href="">Olvidé mi contraseña</a>
</div>

</form>
@endsection
