@extends('layouts.auth')

@section('title','Recuperar cuenta')


@section('content')
<form class="form-signin mb-4 formRecuperarCuenta" action="/login" method="POST">
    @csrf
    <div class="text-center mb-4">
        <img class="mb-1 img-fluid w-75" src="{{ asset('images/logo_color.png') }}" alt="">
        <h1 class="h3 mb-0  text-primary font-weight-normal">Olvide mi contraseña</h1>
        {{-- <h5 class="font-weight-bold">Docentes</h5> --}}
    </div>
    <div class=" md-outline md-form">
        <input class="form-control" name="email" type="email" id="input_username" value="{{ old('email') }}"  required autofocus>
        <label for="input_codigo">Correo Electrónico</label>
    </div>

    <button class="btn btn-lg bg-primary text-white btn-block" type="submit">Recuperar</button>

</form>
@endsection