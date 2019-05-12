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
                    <table class="table table-bordered ">
                        <tbody>
                            <tr>
                              <td style="text-align:center" colspan="4">
                                    <h6 class="h6-responsive text-muted">Fecha</h6>
                                    <h4 class="h4-responsive font-weight-bold">{{$planeador->created_at->format("d / m / y")}}</h4>
                                </td>  
                            </tr>
                            <tr>
                                <td style="text-align:center" colspan="2">
                                    <h6 class="h6-responsive text-muted">Programa Académico</h6>
                                    <h4 class="h4-responsive font-weight-bold">(pendiente)</h4>
                                </td>
                                <td style="text-align:center" colspan="2">
                                    <h6 class="h6-responsive text-muted">Código del Programa</h6>
                                    <h4 class="h4-responsive font-weight-bold">(pendiente)</h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center">
                                    <h6 class="h6-responsive text-muted">Nombre de la Asignatura</h6>
                                    <h4 class="h4-responsive font-weight-bold">{{$planeador->asignatura_planeador->nombre}}</h4>
                                </td> 
                                <td style="text-align:center" colspan="2">
                                    <h6 class="h6-responsive text-muted">Código de la Asignatura</h6>
                                    <h4 class="h4-responsive font-weight-bold">{{$planeador->asignatura_planeador->codigo}}</h4>
                                </td> 
                                <td style="text-align:center">
                                    <h6 class="h6-responsive text-muted">Periodo Académico</h6>
                                    <h4 class="h4-responsive font-weight-bold">MMM - MMM</h4>
                                </td> 
                            </tr>
                            <tr>
                                <td style="text-align:center">
                                    <h6 class="h6-responsive text-muted">Créditos</h6>
                                    <h4 class="h4-responsive font-weight-bold">{{$planeador->asignatura_planeador->creditos}}</h4>
                                </td> 
                                <td style="text-align:center">
                                    <h6 class="h6-responsive text-muted">Intesidad Horaria</h6>
                                    <h4 class="h4-responsive font-weight-bold">{{$planeador->asignatura_planeador->intensidad_horaria}}</h4>
                                </td> 
                                <td style="text-align:center">
                                    <h6 class="h6-responsive text-muted">Validable</h6>
                                    <h4 class="h4-responsive font-weight-bold"><i class="fa fa-{{($planeador->asignatura_planeador->validable) ? "check" : "times"}}"></i></h4>
                                </td> 
                                <td style="text-align:center">
                                    <h6 class="h6-responsive text-muted">Habilitable</h6>
                                    <h4 class="h4-responsive font-weight-bold"><i class="fa fa-{{($planeador->asignatura_planeador->habilitable) ? "check" : "times"}}"></i></i></h4>
                                </td> 
                            </tr>
                            <tr>
                                <td style="text-align:center" colspan="2">
                                    <h6 class="h6-responsive text-muted">Nombre del Docente</h6>
                                    <h4 class="h4-responsive font-weight-bold">{{auth()->user()->nombre_completo()}}</h4>
                                </td> 
                                
                                <td style="text-align:center" colspan="2">
                                    <h6 class="h6-responsive text-muted">Correo del Docente</h6>
                                    <h4 class="h4-responsive font-weight-bold"><a href="mailto:{{auth()->user()->email}}">{{auth()->user()->email}}</a></h4>
                                </td> 
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center" id="btn-print" >
                        <button onclick="window.print()" class="btn btn-primary">
                            <i class="fa fa-print"></i> Generar PDF
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