@extends('layouts.app')

@section('content')
@section('title','Planeador Academico: '.$asignatura->nombre)

@include('libs.ckeditor')
@include('libs.daterangepicker')

@push('styles')
@endpush
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body" id="planeador-div">
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
                  <table class="table text-center table-stripped">
                    <tbody>
                        <tr>
                            <td colspan="3">
                                <h6 class="h6-responsive text-muted">Programa Académico</h6>
                                <h4 class="h4-responsive font-weight-bold">(pendiente)</h4>
                            </td>
                            <td colspan="3">
                                <h6 class="h6-responsive text-muted">Código del Programa</h6>
                                <h4 class="h4-responsive font-weight-bold">(pendiente)</h4>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <h6 class="h6-responsive text-muted">Nombre de la Asignatura</h6>
                                <h4 class="h4-responsive font-weight-bold">{{$asignatura->nombre}}</h4>
                            </td>
                            <td colspan="2">
                                <h6 class="h6-responsive text-muted">Código de la Asignatura</h6>
                                <h4 class="h4-responsive font-weight-bold">{{$asignatura->codigo}}</h4>
                            </td>
                            <td colspan="2">
                                <h6 class="h6-responsive text-muted">Periodo Académico</h6>
                                <h4 class="h4-responsive font-weight-bold">{{$configuracion->mes_inicio_periodo->mes}} - {{$configuracion->mes_fin_periodo->mes}}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <h6 class="h6-responsive text-muted">Créditos</h6>
                                <h4 class="h4-responsive font-weight-bold">{{$asignatura->creditos}}</h4>
                            </td>
                            <td colspan="2">
                                <h6 class="h6-responsive text-muted">Intesidad Horaria</h6>
                                <h4 class="h4-responsive font-weight-bold">{{$asignatura->intensidad_horaria}}</h4>
                            </td>
                            <td colspan="2" class="d-flex">
                                <div class="col-6">
                                  <h6 class="h6-responsive text-muted">Validable</h6>
                                  <h4 class="h4-responsive font-weight-bold"><i class="fa fa-{{($asignatura->validable) ? "check" : ""}}"></i></h4>
                              </div>
                              <div class="col-6">
                                <h6 class="h6-responsive text-muted">Habilitable</h6>
                                <h4 class="h4-responsive font-weight-bold"><i class="fa fa-{{($asignatura->habilitable) ? "check" : ""}}"></i></i></h4>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <h6 class="h6-responsive text-muted">Nombre del Docente</h6>
                            <h4 class="h4-responsive font-weight-bold">{{auth()->user()->nombre_completo()}}</h4>
                        </td>

                        <td colspan="3">
                            <h6 class="h6-responsive text-muted">Correo del Docente</h6>
                            <h4 class="h4-responsive font-weight-bold"><a href="mailto:{{auth()->user()->email}}">{{auth()->user()->email}}</a></h4>
                        </td>
                    </tr>
                </tbody>
            </table>

            <form action="{{url('guardar-planeador')}}" method="POST" autocomplete="off">
                @csrf
                <table class="table table-bordered ">
                    <input type="text" name="docente" value="{{ auth()->user()->id }}" hidden>
                    <input type="text" name="asignatura" value="{{ $asignatura->id }}" hidden>
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
                                <div class="md-form md-outline m-0">
                                    <textarea class="form-control" name="evaluaciones" id="evaluaciones" cols="30" rows="40" style="height: 100px" required>
                                        <ul>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                        </ul>
                                    </textarea>
                                </div>
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
                                    <th scope="col" width="30px">Semana</th>
                                <th scope="col" width="{{(count($dias)>1) ? '300px' : "200px"}}">Fecha(s)</th>
                                    <th scope="col">Temas - Actividades</th>
                                    <th scope="col" width="270px">Metodología*</th>
                                </tr>
                                @for ($i = 1; $i <= $configuracion->numero_semanas; $i++)
                                <tr>
                                    <th scope="row">
                                        <div class="md-form md-outline">
                                            <input required class="form-control text-center" type="text" name="temas[{{ $i }}][semana]" id="semana_tema_{{$i}}" readonly value="{{$i}}">
                                        </div>
                                    </th>
                                    <td style>
                                        <div class="md-form md-outline">
                                                @if (count($dias)>1)
                                                <input class="form-control text-center fechas" type="text" name="temas[{{ $i }}][fecha]" id="fecha_tema_{{$i}}" value="{{$configuracion->inicio_clases->add($i-1,'week')->weekday($dias[1]-1)->format("Y-m-d")}} - {{$configuracion->inicio_clases->add($i-1,'week')->weekday($dias[2]-1)->format("Y-m-d")}}">
                                                @else
                                                <input class="form-control text-center fechas" type="text" name="temas[{{ $i }}][fecha]" id="fecha_tema_{{$i}}" value="{{$configuracion->inicio_clases->add($i-1,'week')->weekday($dias)->format("Y-m-d")}}">
                                                @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="md-form md-outline">
                                            <label for="tema_tema_{{$i}}">Temas - Actividades Semana {{$i}}</label>
                                            <input required class="form-control" type="text" name="temas[{{ $i }}][tema]" id="tema_tema_{{$i}}">
                                        </div>
                                    </td>
                                    <td>
                                      <select class="form-control text-center mt-4" name="temas[{{ $i }}][metodologia]" id="metodologia" style="height:50px">
                                        @foreach($metodologías as $metodologia)
                                        <option value="{{$metodologia->id}}">{{$metodologia->nombre}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </form>
                <div class="text-right">
                  <button type="submit" class="btn btn-elegant">
                      <i class="fa fa-save"></i>
                  Guardar Planeador</button>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
@push("scripts")
@if (count($dias)>1)
<script>
        $('.fechas').daterangepicker({
            singleDatePicker: false,
            format: 'YYYY-MM-DD'
        })
</script>
@else
<script>
        $('.fechas').daterangepicker({
            singleDatePicker: true,
            format: 'YYYY-MM-DD'
        })
</script>
@endif

<script>
    ClassicEditor
    .create(document.querySelector('#evaluaciones'))
    .then(function (editor) {

    })
    .catch(function (error) {
        console.error(error)
    })
</script>
@endpush
