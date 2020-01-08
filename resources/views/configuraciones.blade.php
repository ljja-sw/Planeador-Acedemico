@extends('layouts.app')

@section('content')
@include('libs.daterangepicker')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6 mx-auto">
                <div class="card card-body">
                    <div class="card-title text-center">
                        <i class="fa fa-cog fa-2x"></i>
                        <h4 class="h4-responsive">
                            Configuraciones
                        </h4>
                    </div>
                    <form action="{{route('admin.configuraciones.guardar')}}" method="POST" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form md-outline">
                                    <label for="inicio_clases">Fecha Inicio de Clases</label>
                                    <input type="text" id="inicio_clases" name="inicio_clases" class="form-control" value="{{$configuraciones->inicio_clases->format('Y-m-d')}}">
                                </div>
                                <div class="form-row">
                                  <div class="md-form md-outline col-12">
                                      <label for="inicio_clases">Numero de Semanas</label>
                                      <input type="text" id="numero_semanas" name="numero_semanas" class="form-control" value="{{$configuraciones->numero_semanas}}">
                                  </div>
                              </div>
                              <h6 class="text-center">Peridodo Académico Actual</h6>
                              <div class="form-row">
                                <div class="form-group col-6">
                                    <select class="form-control custom-select" name="inicio-periodo" id="mes-inicio">
                                        @foreach ($meses as $mes)
                                        <option value="{{$mes->id}}" {{($configuraciones->inicio_periodo_academico == $mes->id)? 'selected' : ''}}>{{$mes->mes}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <select class="form-control custom-select" name="fin-periodo" id="mes-fin">
                                        @foreach ($meses as $mes_fin)
                                        <option value="{{$mes_fin->id}}" {{($configuraciones->fin_periodo_academico == $mes_fin->id)? 'selected' : ''}}>{{$mes_fin->mes}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row float-right">
                        <div class="col-12">
                            <button class="btn btn-primary">
                                <i class="fa fa-save"></i>
                            Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@push('scripts')
<script>
    $('#inicio_clases').daterangepicker({
        singleDatePicker: true,
        format: 'YYYY-MM-DD'
    });

    $('#inicio_clases').change(function(){
        let semanas = $('#numero_semanas').val()
        let fechaInicio = moment($(this).val(), "YYYY-MM-DD")
        let fechaFin = moment(fechaInicio).add(semanas, 'weeks')
        
        $('#mes-inicio').val(fechaInicio.month()+1)
        $('#mes-fin').val(fechaFin.month()+1)
    });
</script>
@endpush

@endsection
