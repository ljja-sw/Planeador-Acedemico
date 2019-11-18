@extends('layouts.app')

@section('content')

@include('libs.select2')
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card card-body">
                <small class="text-muted pb-2">Clases para hoy</small>
                @forelse ($clases as $clase)
                <div class="d-flex flex-column">
                    <div class="pl-2 py-3">
                        <p class="m-0 text-muted">
                            {{$clase->planeador->asignatura_planeador->nombre}}</p>
                            <h4 class="m-0 h4-responsive font-weight-bold">{{$clase->tema}}
                                <span class="float-right badge badge-danger badge-pill">
                                    Sin Reporte
                                </span>
                            </h4>
                            <p class="m-0">{{$clase->metodología_tema->nombre}}</p>
                            <p class="m-0 text-muted">{{$clase->horarioClase()->hora_inicio}} -
                                {{$clase->horarioClase()->hora_fin}}</p>
                                <div class="text-right">
                                </div>
                            </div>

                        </div>
                        <ul class="nav mx-auto text-center">
                            @if($clase->reporte())
                            <li class="nav-item">
                                <a href="{{route('tema.reporte',$clase)}}" class="btn btn-elegant nav-link">
                                    <i class="fa fa-clock"></i>
                                Registrar Reporte</a>
                                <p class="m-0 text-muted">Reportes cerrados <b
                                    class="font-weight-bold">{{ $clase->horarioClase()->tiempo_restante() }}</b>.</p>
                                </li>
                                @endif
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
                                    @forelse ($asignaturas as $asignatura)
                                    <li class="list-group-item">
                                        <a>{{$asignatura->nombre}} - {{$asignatura->grupo}}
                                            <small class="tex-muted">{{$asignatura->asignada->horario->dia_semana->dia}} de {{$asignatura->asignada->horario->getHoraInicio()->format("H:i")}} a {{$asignatura->asignada->horario->getHoraFin()->format("H:i")}} en <b>{{$asignatura->asignada->horario->salon->nombre}}</b></small>
                                        </a>
                                        <span class="float-right">
                                            @if(!is_null($asignatura->planeador))
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
                    </div>
                </div>
            </div>
            @endsection