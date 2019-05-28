@extends('layouts.app')

@section('title','Docente')

@section('content')
@include('libs.datatables')

<div class="container">
  <div class="row">
    <div class="col-md-12 mx-auto card-deck">
      <div class="card card-body table-responsive">
        <h3 class="font-weight-bold card-title m-4">
          <i class="fa fa-users text-muted"></i>
          Docentes
        </h3>
        <div class="text-right">
          <a href="{{ route('docentes.create') }}" class="btn btn-elegant">
            <i class="fa fa-plus"></i>
            Registrar Docente
          </a>
        </div>
        <table id="tabla_docentes" class="table datatable table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Documento de Identidad</th>
                <th>Correo Electrónico</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($docentes as $docente)
                    <tr>
                    <td>{{ $docente->nombre }}</td>
                    <td>{{ $docente->apellido }}</td>
                    <td>{{ $docente->documento_identidad }}</td>
                    <td>{{ $docente->email }}</td>
                    <th><a href="{{route('docentes.show',$docente)}}"> <i class="fa fa-plus"></i> Detalles</a></th>
                    </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@push('scripts')
<script>
  $('#tabla_docentes').DataTable();
  $('.dataTables_length').addClass('bs-select');
</script>
@endpush 
@endsection
