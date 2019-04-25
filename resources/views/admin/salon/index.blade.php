@extends('layouts.app')

@section('content')
@include('libs.datatables')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card card-body">
                <div class="d-flex flex-row justify-content-between">
                    <h3 class="font-weight-bold card-title m-4">
                        <i class="far fa-calendar-alt text-muted"></i>
                        Salones y Horarios
                    </h3>}
                </div>
                
                <div class="text-right">
                    <a href="{{route('salon.create')}}" class="btn btn-elegant">
                        <i class="fa fa-plus"></i>
                        Registrar Salon
                    </a>
                </div>
                <div class="table-responsive">
                    <table id="tabla_salones_salas" class="table datatable table-striped">
                        <thead class="text-center">
                            <tr>
                                <th>
                                    <b>Nombre</b>
                                </th>
                                <th>
                                    <b>Capacidad</b> <small class="text-muted">Estudiantes</small>
                                </th>
                                <th>
                                    <b>Horarios</b>
                                </th>
                                <th>
                                    <b>Horarios Reservados</b>
                                </th>
                                <th>
                                    <b>Acciones</b>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($salones as $salon)
                            <tr>
                                <td>{{$salon->nombre}}</td>
                                <td>{{$salon->capacidad}}</td>
                                <td>{{ count($salon->horarios) }}</td>
                                <td>{{ count($salon->ocupados) }}</td>
                            <td><a href="{{ route("salon.show",$salon) }}">Detalles</a></td>
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
    $('#tabla_salones_salas').DataTable();
    $('.dataTables_length').addClass('bs-select');
</script>
@endpush