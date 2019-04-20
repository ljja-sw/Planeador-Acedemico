@extends('layouts.app')

@section('title','Secretarios Academicos')

@section('content')
@include('libs.datatables')

<div class="container">
  <div class="row">
    <div class="col-md-12 mx-auto card-deck">
      <div class="card card-body table-responsive">
        <h3 class="font-weight-bold card-title m-4">
          <i class="fa fa-users text-muted"></i>
          Secretarios Académicos
        </h3>
        <div class="text-right">
          <a href="{{ route('secretarios.create') }}" class="btn btn-elegant">
            <i class="fa fa-plus"></i>
            Registrar Secretario
          </a>
        </div>
        <table id="tabla_secretarios" class="table datatable table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th class="th-sm">Nombre
              </th>
              <th class="th-sm">Apellido
              </th>
              <th class="th-sm">Documento de Identidad
              </th>
              <th class="th-sm">Correo Electrónico
              </th>
              <th class="th-sm">Acciones
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($secretarios as $secretario)
            <tr>
              <th>{{ $secretario->nombre }}</th>
              <th>{{ $secretario->apellido }}</th>
              <th>{{ $secretario->documento_identidad }}</th>
              <th>{{ $secretario->email }}</th>
              <th>
                <div class="nav justify-content-center">
                  <a title="Detalles" href="{{ route('secretarios.show',$secretario) }}" class="nav-item btn-table--edit"><i class="fa fa-plus"></i> Detalles</a>
                </div>
              </th>
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
  $('#tabla_secretarios').DataTable();
  $('.dataTables_length').addClass('bs-select');
</script>
@endpush 
@endsection
