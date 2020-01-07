@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        @forelse(auth()->user()->asignaturas as $asignatura)
        <div class="col-md-10 mx-auto">
            <div class="card card-body">
                <div class="text-center">
                    <small class="text-muted">Asignatura</small>
                    <h2 class="font-weight-bold card-title">{{$asignatura->asignatura->nombre}}</h2>
                    <small class="text-muted">Codigo</small>
                    <h3 class="font-weight-bold card-title">{{$asignatura->asignatura->codigo}}</h3>
                </div>
                <div class="mx-auto">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="{{ route('reporte.creacion',$asignatura->asignatura)}}" class="btn btn-elegant">
                                <i class="fa fa-align-justify"></i>
                                Crear
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('reporte.show',array($asignatura->asignatura,$usiario=auth()->user()) )}}" class="btn btn-elegant">
                                <i class="fa fa-folder-open"></i>
                                Visualizar
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        @empty
        <div class="col-md-10 mx-auto">
            <div class="card card-body text-center">
                <h4 class="h4-responsive font-weight-bold"><i class="fa fa-times fa-2x"></i><br>
                    !Lo sentimos por el momento no hay materias asignadas¡</h4>
                </div>
            </div>
            @endforelse
            <div class="mx-auto text-center font-weight-bold">
                    <hr>
                        @if (count(auth()->user()->asignaturas)<=2)
                        No hay mas materias asignadas
                    @endif
                </div>
        </div>
    </div>
    @endsection
