@extends('layouts.app')
@section('title',$planeador->asignatura_planeador->asignatura->nombre)

@section('content')
@include('libs.ckeditor')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body responsive" id="planeador-div">
                <div class="table-responsive" id="contenido">
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
                                    <p class="m-0">Ultima modificacion</p>
                                    <p class="m-0">{{$planeador->updated_at->format("d / m / y")}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center" colspan="3">
                                    <h6 class="h6-responsive text-muted">Programa Académico</h6>
                                    <h4 class="h4-responsive font-weight-bold">{{$programa->nombre}}</h4>
                                </td>
                                <td style="text-align:center" colspan="2">
                                    <h6 class="h6-responsive text-muted">Código del Programa</h6>
                                    <h4 class="h4-responsive font-weight-bold">{{$programa->codigo}}</h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center">
                                    <h6 class="h6-responsive text-muted">Nombre de la Asignatura</h6>
                                    <h4 class="h4-responsive font-weight-bold">{{$planeador->asignatura_planeador->asignatura->nombre}}</h4>
                                </td>
                                <td style="text-align:center" colspan="2">
                                    <h6 class="h6-responsive text-muted">Código de la Asignatura</h6>
                                    <h4 class="h4-responsive font-weight-bold">{{$planeador->asignatura_planeador->asignatura->codigo}}-{{$planeador->asignatura_planeador->grupo->numero}}</h4>
                                </td>
                                <td style="text-align:center">
                                    <h6 class="h6-responsive text-muted">Periodo Académico</h6>
                                    <h4 class="h4-responsive font-weight-bold">{{$configuracion->mes_inicio_periodo->mes}} - {{$configuracion->mes_fin_periodo->mes}}</h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center">
                                    <h6 class="h6-responsive text-muted">Créditos</h6>
                                    <h4 class="h4-responsive font-weight-bold">{{$planeador->asignatura_planeador->asignatura->creditos}}</h4>
                                </td>
                                <td style="text-align:center">
                                    <h6 class="h6-responsive text-muted">Intesidad Horaria</h6>
                                    <h4 class="h4-responsive font-weight-bold">{{$planeador->asignatura_planeador->asignatura->intensidad_horaria}}</h4>
                                </td>
                                <td style="text-align:center">
                                    <h6 class="h6-responsive text-muted">Validable</h6>
                                    <h4 class="h4-responsive font-weight-bold"><i class="fa fa-{{($planeador->asignatura_planeador->asignatura->validable) ? "check" : "times"}}"></i></h4>
                                </td>
                                <td style="text-align:center">
                                    <h6 class="h6-responsive text-muted">Habilitable</h6>
                                    <h4 class="h4-responsive font-weight-bold"><i class="fa fa-{{($planeador->asignatura_planeador->asignatura->habilitable) ? "check" : "times"}}"></i></i></h4>
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
                    <div class="text-center" >
                        <a href="{{route('docente.planeador.pdf',[$planeador,$grupo])}}" class="btn btn-primary">
                            <i class="fa fa-file-pdf"></i>
                            Guardar como PDF
                        </a>
                        <hr>
                    </div>
                    <table class="table table-bordered ">
                        <tbody>
                            <tr>
                                <th class="text-center td-tema">
                                    <h4 class="font-weight-bold">
                                        Evaluacion
                                    </a>
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
                    <div class="col-md-12 table-responsive">
                        <table id="tabla" class="table table-bordered">
                            <tbody class="text-center">
                                <tr>
                                    <th colspan="4" >
                                        <h4 class="font-weight-bold">Contenido Temático</h4>
                                    </th>
                                </tr>
                                <tr class="text-center">
                                    <th scope="col" style="width:50px">
                                        <h6 class="font-weight-bold">Semana</h6>
                                    </th>
                                    <th scope="col" style="width:240px">
                                        <h6 class="font-weight-bold">Fecha(s)</h6>
                                    </th>
                                    <th scope="col">
                                        <h6 class="font-weight-bold">Temas - Actividades</h6>
                                    </th>
                                    <th scope="col" style="width:190px">
                                        <h6 class="font-weight-bold">Metodología*</h6>
                                    </th>
                                </tr>
                                @foreach ($planeador->temas as $tema)
                                @if (count($tema->fecha)>1)
                                @if ($tema->getFechas("primera_clase") == today()->format("d/m/Y") || $tema->getFechas("segunda_clase") == today()->format("d/m/Y"))
                                <tr class=" red lighten-4">
                                    <th scope="row" class="border-left"><p class="font-weight-bold m-0">{{ $tema->semana }}</p></th>
                                    <td> <p class="font-weight-bold m-0">{{ $tema->getFechas() }}</p></td>
                                    <td class="td-tema"> <p class="font-weight-bold m-0">{{ $tema->tema }}</p></td>
                                    <td> <p class="font-weight-bold m-0">{{ $tema->metodología_tema->nombre }}</p></td>
                                </tr>
                                @else
                                <tr>
                                    <th scope="row">{{ $tema->semana }}</th>
                                    <td  class="text-uppercase"> {{ $tema->getFechas() }} </td>
                                    <td  class="td-tema">{{ $tema->tema }} </td>
                                    <td>{{ $tema->metodología_tema->nombre }}</td>
                                </tr>
                                @endif
                                @else
                                @if ($tema->getFechas("primera_clase") == today()->format("d/m/Y"))
                                <tr class=" red lighten-4 border">
                                    <th scope="row">{{ $tema->semana }}</th>
                                    <td class="text-uppercase"> {{ $tema->getFechas() }} </td>
                                    <td  class="td-tema">{{ $tema->tema }}</td>
                                    <td>{{ $tema->metodología_tema->nombre }}</td>
                                </tr>
                                @else
                                <tr>
                                    <th scope="row">{{ $tema->semana }}</th>
                                    <td  class="text-uppercase"> {{ $tema->getFechas() }} </td>
                                    <td  class="td-tema">{{ $tema->tema }}</td>
                                    <td>{{ $tema->metodología_tema->nombre }}</td>
                                </tr>
                                @endif
                                @endif
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
