@extends('layouts.app')

@section('title','Secretarios Academicos')

@section('content')
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
          <h1 class="text-center">Aqui va la tabla</h1>
        </table>
      </div>
    </div>
  </div>
</div>
@push('scripts')
<script src="{{ asset('vendor/datatables/datatables.min.js') }}"></script>
<script>
  $('#tabla_docentes').DataTable();
  $('.dataTables_length').addClass('bs-select');
</script>
@endpush 
@endsection
