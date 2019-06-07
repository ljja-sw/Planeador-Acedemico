@extends('layouts.app')
@section('title',$planeador->asignatura_planeador->nombre)

@section('content')
@include('modals.editar_tema_planeador')
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
                                    <h4 class="h4-responsive font-weight-bold">{{$configuracion->mes_inicio_periodo->mes}} - {{$configuracion->mes_fin_periodo->mes}}</h4>
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
                                    <tr>
                                        <th scope="row">{{ $tema->semana }}</th>
                                        <td  class="text-uppercase"> {{ $tema->getFechas() }} </td>
                                        <td class="td-tema">{{ $tema->tema }} <a href="#!{{$tema->id}}" class="editarTema" data-toggle='modal' target="#modalEditarTema"><i class="fa fa-pen"></i></a></td>
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
@push('styles')
<style>
    .editarTema{
        display: none;
    }
    .td-tema:hover .editarTema{
        display: inline;
    }
</style>
@endpush
@push('scripts')
<script>
    $(document).ready(function(){
        $('.editarTema').on('click',function(){
            var dataURL = $(this).attr('data-href');
                        $('#modalEditarTema').modal({show:true});

        }); 
    });
</script>
@endpush