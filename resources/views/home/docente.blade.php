@extends('layouts.app')

@section('content')
@include('modals.seleccionar_asignatura_planeador')
@include('libs.select2')
<div class="container">
  <div class="row">
    <div class="col-md-4 oder-md-1">
      <div class="card card-body">
        <div class="text-center">
					<img class="img-fluid rounded-circle z-depth-2 img-avatar-full" src="{{ Auth::user()->getAvatar() }}" alt="Foto de {{ auth()->user()->nombre }}">
					<h6 class="text-muted">Bienvenido de vuelta</h6>
					<h4 class="font-weight-bold">{{ auth()->user()->nombre }}</h4>
				</div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="card card-body">
        <small class="text-muted pb-2">Clases para hoy</small>
        @forelse ($clases as $clase)
        <div class="pl-2 py-3">
          <p class="m-0 text-muted">{{$clase->planeador->asignatura_planeador->nombre}}</p>
          <h4 class="m-0 h4-responsive font-weight-bold">{{$clase->tema}}</h4>
          <p class="m-0">{{$clase->metodología_tema->nombre}}</p>
        </div>
        @empty
        <div class="pl-2 py-3">
          <h4 class="m-0 h4-responsive font-weight-bold">No hay clases programadas para hoy.</h4>
        </div>
        @endforelse
      </div>
<div class="card card-body">
  <small class="text-muted pb-2">Enlaces Rápidos</small>

  <div class="my-2">
    <ul class="nav font-weight-bold flex-center">
      <li class="nav-item">
        <a href="#!" data-target="#modal_planeador_asignatura" data-toggle="modal" class="btn btn-elegant  text-center ">
          <i class="fa fa-list"></i>
          Crear Planeador Académico
        </a>
      </li>
    </ul>
  </div>
</div>
    </div>
  </div>
</div>
@endsection
