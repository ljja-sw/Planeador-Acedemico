@extends('layouts.app')

@section('content')
@section('title',$planeador->asignatura_planeador->nombre)
@push('styles')
<style>
    h6{font-weight: bold}
    @media print {
        @page { margin: 20px; }
        body { margin: 1.6cm; }
        footer, #btn-print{display: none;} 
    }
</style>
@endpush
<div class="container"> 
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body responsive" id="planeador-div">
                <div id="contenido">
                <table class=" mb-5">
                    <tbody>
                        <tr>
                            <td>
                                <h1 class="h1-responsive font-weight-bold ml-1 ml-lg-5 mt-2">Planeador</h1>
                            </td>
                            <td style="padding-left:500px;text-align: center">
                                <img class="img-fluid" src="{{ asset('images/logo_color.png') }}" alt="Planeador Academico">
                            </td>
                        </tr>
                    </tbody>
                </table>
                    <table class="table text-center table-stripped">
                    <tbody>
                        <tr>
                            <td colspan="3">
                                <p class="text-muted m-0">Programa Académico</p>
                                <h4 class="h4-responsive font-weight-bold">(pendiente)</h4>
                            </td>
                            <td colspan="3">
                                <p class="text-muted m-0">Código del Programa</p>
                                <h4 class="h4-responsive font-weight-bold">(pendiente)</h4>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p class="text-muted m-0">Nombre de la Asignatura</p>
                                <h4 class="h4-responsive font-weight-bold">{{$planeador->asignatura_planeador->nombre}}</h4>
                            </td>
                            <td colspan="2">
                                <p class="text-muted m-0">Código de la Asignatura</p>
                                <h4 class="h4-responsive font-weight-bold">{{$planeador->asignatura_planeador->codigo}}</h4>
                            </td>
                            <td colspan="2">
                                <p class="text-muted m-0">Periodo Académico</p>
                                <h4 class="h4-responsive font-weight-bold">{{$configuracion->mes_inicio_periodo->mes}} - {{$configuracion->mes_fin_periodo->mes}}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p class="text-muted m-0">Créditos</p>
                                <h4 class="h4-responsive font-weight-bold">{{$planeador->asignatura_planeador->creditos}}</h4>
                            </td>
                            <td colspan="2">
                                <p class="text-muted m-0">Intesidad Horaria</p>
                                <h4 class="h4-responsive font-weight-bold">{{$planeador->asignatura_planeador->intensidad_horaria}}</h4>
                            </td>
                            <td colspan="2" class="d-flex">
                                <div class="col-6">
                                  <p class="text-muted m-0">Validable</p>
                                  <h4 class="h4-responsive font-weight-bold"><i class="fa fa-{{($planeador->asignatura_planeador->validable) ? "check" : ""}}"></i></h4>
                              </div>
                              <div class="col-6">
                                <p class="text-muted m-0">Habilitable</p>
                                <h4 class="h4-responsive font-weight-bold"><i class="fa fa-{{($planeador->asignatura_planeador->habilitable) ? "check" : ""}}"></i></i></h4>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <p class="text-muted m-0">Nombre del Docente</p>
                            <h4 class="h4-responsive font-weight-bold">{{auth()->user()->nombre_completo()}}</h4>
                        </td>

                        <td colspan="3">
                            <p class="text-muted m-0">Correo del Docente</p>
                            <h4 class="h4-responsive font-weight-bold"><a href="mailto:{{auth()->user()->email}}">{{auth()->user()->email}}</a></h4>
                        </td>
                    </tr>
                </tbody>
            </table>
                    <div class="text-center" id="btn-print" >
                        <button onclick="window.print()" class="btn btn-primary">
                            <i class="fa fa-print"></i> Guardar como pdf
                        </button>
                        <hr>
                    </div>
                    <table class="table table-bordered ">
                        <tbody>
                            <tr>
                                <th class="text-center">
                                    <h4 class="font-weight-bold">
                                        Evaluacion
                                    </h4>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    {!! $planeador->evaluaciones !!}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="tabla" class="table table-bordered">
                                <tbody class="text-center">
                                    <tr>
                                        <th colspan="4" >
                                            <h4 class="font-weight-bold">Contenido Temático</h4>
                                        </th>
                                    </tr>
                                    <tr class="text-center" >
                                        <th scope="col">
                                            <h6>Semana</h6>
                                        </th>
                                        <th scope="col">
                                            <h6>Fecha(s)</h6>
                                        </th>
                                        <th scope="col">
                                            <h6>Temas - Actividades</h6>
                                        </th>
                                        <th scope="col">
                                            <h6>Metodología*</h6>
                                        </th>
                                    </tr>
                                    @foreach ($planeador->temas as $tema)
                                    <tr>
                                        <th scope="row">{{ $tema->semana }}</th>
                                        <td> {{ $tema->fecha->format("d-M-Y") }} </td>
                                        <td>{{ $tema->tema }}</td>
                                        <td>{{ $tema->metodología_tema->nombre }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>               
            </div>
        </div>
    </div>
</div>
@endsection