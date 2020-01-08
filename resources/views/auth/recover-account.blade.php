@extends('layouts.auth')

@section('title','Recuperar cuenta')


@section('content')
<form class="form-iniciar-session" action="/login" method="POST">
    @csrf
    <div class="text-center">
        <span class="text-primary p-2">
            <i class="fa fa-user fa-4x "></i>
          </span>
        <h5 class="h3 text-primary">Recuperar Contraseña</h5>
        <p class="p-0 font-weight-bold">Docentes y Secretarios Académicos</p>
    </div>
    <hr class="hr-padding">
    <div class=" md-outline md-form">
        <input class="form-control" name="email" type="email" id="input_username" value="{{ old('email') }}"  required autofocus>
        <label for="input_username">Correo Electrónico</label>
    </div>

    <div class="text-center">
        <button class="btn bg-primary text-white" type="submit"><i class="fa fa-paper-plane"></i> Recuperar</button>
        </div> 

</form>
@endsection