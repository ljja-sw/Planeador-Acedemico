@extends('layouts.app')

@section('content')
@include('modals.seleccionar_asignatura_planeador')
@include('libs.select2')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body">
                <div class="text-center">
                    <img class="img-fluid rounded-circle z-depth-1 img-avatar-full" src="{{ Auth::user()->getAvatar() }}" alt="Foto de {{ auth()->user()->nombre }}">
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
                <ul class="nav mx-auto">
                    <li class="nav-item">
                        <a href="#!/asistencia/{{$clase->slug}}/nuevo" class="btn btn-elegant nav-link">
                            <i class="fa fa-clock"></i>
                            Registrar Asistencia</a>
                        </li>
                        <li class="nav-item">
                            <a href="#!/asistencia/{{$clase->slug}}" class="btn btn-elegant nav-link">
                                <i class="fa fa-clock"></i>
                                Ver Reporte de Asistencia</a>
                            </li>
                        </ul>
                        <hr>
                        @empty
                        <div class="pl-2 py-3">
                            <h4 class="m-0 h4-responsive font-weight-bold">No hay clases programadas para hoy.</h4>
                        </div>
                        @endforelse
                    </div>
                    <div class="card card-body">
                        <small class="text-muted pb-2">Mis Asignaturas</small>
                        <div class="my-2">
                            <ul class="list-group list-group-flush font-weight-bold">
                                @forelse (auth()->user()->asignaturas as $asignatura)
                                <li class="list-group-item ">
                                    <a href="#">{{$asignatura->nombre}} - {{$asignatura->grupo}}</a>
                                    <span class="float-right">
                                        @if(count($asignatura->planeador)>=1)
                                        <a href="{{ route('docente.planeador.ver',$asignatura)  }}">
                                            <i class="fa fa-eye"></i>
                                            Ver Planeador
                                        </a>
                                        @else
                                        <a href="{{ route('docente.generar.planeador',$asignatura) }}">
                                            <i class="fa fa-plus"></i>
                                            Crear Planeador
                                        </a>
                                        @endif
                                    </span>
                                </li>
                                @empty
                                <p class="font-weight-bold">
                                    No tienes asignaturas delegadas
                                </p>
                                @endif
                            </ul>
                        </div>
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
