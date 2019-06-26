@extends('layouts.app')

@section('title',$salon->nombre)
@section('content')
@include('libs.datatables')
@include('admin.salon.modals.edit')
@include('admin.salon.modals.delete')
@include('admin.salon.modals.horario_edit')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card card-body">
                <div class="px-3 pt-3">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="font-weight-bold">
                                {{$salon->nombre}}
                            </h4>
                            <p class="m-0">Capacidad: <span class="font-weight-bold">{{$salon->capacidad}}</span>
                                estudiantes</p>
                        </div>
                        <div class="col-md-4 mx-auto">
                            <a href="#modal_editar_salon" data-toggle="modal" class="btn btn-primary"><i class="fa fa-pen"></i> Editar</a>
                            <a href="#modal_delete_salon" data-toggle="modal" class="btn btn-outline-primary"><i class="fa fa-trash"></i> Eliminar</a>
                        </div>
                    </div>
                </div>
                <hr class="py-2">
                <div class="px-3 table-responsive text-muted">
                    <h4 class="font-weight-bold">Horarios</h4>
                    <table id="tabla_horarios" class="table datatable table-striped">
                        <thead class="text-center">
                            <tr>
                                <th>
                                    <b>Dia</b>
                                </th>
                                <th>
                                    <b>Hora Inicio</b>
                                </th>
                                <th>
                                    <b>Hora Fin</b>
                                </th>
                                <th>
                                    <b>Jornada</b>
                                </th>
                                <th>
                                    <b>Ocupado</b>
                                </th>
                                <th style="width:230px;">
                                    <b>Acciones</b>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($salon->horarios as $horario)
                            <tr>
                                <td>{{$horario->dia_semana->dia}}</td>
                                <td>{{$horario->hora_inicio}}</td>
                                <td>{{$horario->hora_fin}}</td>
                                <td>NOC/DIU</td>
                                <td>{{($horario->ocupado) ? "Si" : "No"}}</td>
                                <td class="d-flex justify-content-center py-2">
                                    <ul class="nav">
                                        <li class="nav-item">
                                            <a href="#modal_editar_horario" data-id="{{$horario->id}}" data-toggle="modal" class="nav-link"><i class="fa fa-pen"></i> Editar</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#!Eliminar" data-toggle="modal" class="nav-link"> <i class="fa fa-trash"></i>
                                                Eliminar</a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $('#tabla_horarios').DataTable({
        "paging": false,
        "ordering": true,
        "info": true,
        "searching": false
    });
    $('.dataTables_length').addClass('bs-select');
</script>
@endpush