<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.table.css')}}">
    
    <title>{{$planeador->asignatura_planeador->nombre}}</title>
</head>

<body>
    
    <div class="planeador_wrapper">
        <table class="table table-sm table-borderless">
            <tr>
                <td rowspan="2"  style="width:500px;">LOGO</td>
                <td class="text-center font-weight-bold">Planeador Académico</td>
            </tr>
            <tr>
                <td style="text-align:center">
                <h6 class="m-0 text-muted">Fecha</h6>
                <h6 class="h6-responsive font-weight-bold">{{$planeador->created_at->formatLocalized("%d/%B/%Y")}}
                </h6>
            </td>
            </tr>
        </table> 
        <table class="table table-bordered table-sm">
            <tbody>
                <tr>
                    <td style="text-align:center" colspan="2">
                        <h6 class="m-0 text-muted">Programa Académico</h6>
                        <h6 class="h6-responsive font-weight-bold">
                            (pendiente)
                        </h6>
                    </td>
                    <td style="text-align:center" colspan="2">
                        <h6 class="m-0 text-muted">Código del Programa</h6>
                        <h6 class="h6-responsive font-weight-bold">
                            (pendiente)
                        </h6>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center">
                        <h6 class="m-0 text-muted">Nombre de la Asignatura</h6>
                        <h6 class="h6-responsive font-weight-bold">{{$planeador->asignatura_planeador->nombre}}</h6>
                    </td>
                    <td style="text-align:center" colspan="2">
                        <h6 class="m-0 text-muted">Código de la Asignatura</h6>
                        <h6 class="h6-responsive font-weight-bold">{{$planeador->asignatura_planeador->codigo}}</h6>
                    </td>
                    <td style="text-align:center">
                        <h6 class="m-0 text-muted">Periodo Académico</h6>
                        <h6 class="h6-responsive font-weight-bold">{{$configuracion->mes_inicio_periodo->mes}} -
                            {{$configuracion->mes_fin_periodo->mes}}</h6>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center">
                            <h6 class="m-0 text-muted">Créditos</h6>
                            <h6 class="h6-responsive font-weight-bold">{{$planeador->asignatura_planeador->creditos}}
                            </h6>
                        </td>
                        <td style="text-align:center">
                            <h6 class="m-0 text-muted">Intensidad Horaria</h6>
                            <h6 class="h6-responsive font-weight-bold">
                                {{$planeador->asignatura_planeador->intensidad_horaria}}</h6>
                            </td>
                            <td style="text-align:center">
                                <h6 class="m-0 text-muted">Validable</h6>
                                <h6 class="h6-responsive font-weight-bold">
                                    {{($planeador->asignatura_planeador->validable) ? "Si" : "No"}}
                                </h6>
                            </td>
                            <td style="text-align:center">
                                <h6 class="m-0 text-muted">Habilitable</h6>
                                <h6 class="h6-responsive font-weight-bold">
                                    {{($planeador->asignatura_planeador->habilitable) ? "Si" : "No"}}
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:center" colspan="2">
                                <h6 class="m-0 text-muted">Nombre del Docente</h6>
                                <h6 class="h6-responsive font-weight-bold">{{auth()->user()->nombre_completo()}}</h6>
                            </td>
                            
                            <td style="text-align:center" colspan="2">
                                <h6 class="m-0 text-muted">Correo del Docente</h6>
                                <h6 class="h6-responsive font-weight-bold">{{auth()->user()->email}}</h6>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-bordered table-sm">
                    <tbody>
                        <tr>
                            <th class="text-center bg-th">
                                <h6 class="font-weight-bold">
                                    Evaluaciones
                                </h6>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <h6>{!! $planeador->evaluaciones !!}</h6>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-12 table-sm">
                        <table id="tabla" class="table table-bordered">
                            <tbody>
                                <tr class="bg-th">
                                    <th colspan="4" class="text-center">
                                        <h6 class="font-weight-bold">Contenido Temático</h6>
                                    </th>
                                </tr>
                                <tr class="text-center bg-th">
                                    <th scope="col" style="width:50px">
                                        <h6 class="font-weight-bold">Semana</h6>
                                    </th>
                                    <th scope="col" style="width:150px">
                                        <h6 class="font-weight-bold">Fecha(s)</h6>
                                    </th>
                                    <th scope="col">
                                        <h6 class="font-weight-bold">Temas - Actividades</h6>
                                    </th>
                                    <th scope="col" style="width:160px">
                                        <h6 class="font-weight-bold">Metodología*</h6>
                                    </th>
                                </tr>
                                @foreach ($planeador->temas as $tema)
                                <tr>
                                    <td class="text-center">
                                        <h6 class="font-weight-bold">{{ $tema->semana }}</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6 class="font-weight-bold">{{ $tema->getFechas() }}</h6>
                                    </td>
                                    <td>
                                        <h6>{{ $tema->tema }}</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6>{{ $tema->metodología_tema->nombre }}</h6>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </body>
        
        </html>