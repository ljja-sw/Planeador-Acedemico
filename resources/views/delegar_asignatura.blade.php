@extends('layouts.app')

@section('content')
@include('libs.select2')

<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card card-body">
                <h4 class="h4-responsive card-title font-weight-bold">
                    <i class="fa fa-user"></i>
                    Delegar de Asignatura <small>a Docente</small></h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 mx-auto">
                <form action="{{ route('designar.asignatura.store') }}" method="POST" id="form-asignaturas-docentes">
                    @csrf
                    <div class="asignatura card card-body">
                        <div class="card-title">
                            <h5 class="h5-responsive font-weight-bold">
                                <i class="fa fa-list-ul fa-2x"></i>
                                Materia
                            </h5>
                        </div>

                        <input type="text" name="asignatura" value="{{ $asignatura->id }}" hidden>

                        <div class="asignatura--datos">
                            <h5 class="h5-responsive font-weight-bold">
                                {{ $asignatura->nombre }}
                            </h5>
                            <p class="m-0 ml-1">{{ $asignatura->codigo }} - {{ $asignatura->grupo }}</p>
                            <small class="text-muted">
                                Programa academico
                            </small>

                        </div>
                    </div>

                    <div class="docentes card card-body">
                        <div class="card-title">
                            <h4 class="h4-responsive font-weight-bold">
                                <i class="fa fa-chalkboard-teacher fa-2x"></i>
                                Docente
                            </h4>
                        </div>

                        <input type="text" name="docente" value="{{ $docente->id }}" hidden>

                        <div class="docente--datos mx-2">
                            <div class="row align-items-center">
                                <div class="col-md-3 text-center">
                                    <img class="img-fluid rounded-circle z-depth-1 img-avatar-full mx-3" src="{{ $docente->getAvatar() }}" alt="Foto de {{ $docente->nombre }}">
                                </div>
                                <div class="col-md pl-sm-2 pl-lg-5">
                                    <h5 id="nombre" class="h5-responsive font-weight-bold m-0">{{ $docente->nombre_completo() }}</h5>
                                    <p class="m-0">{{ $docente->email }}</p>
                                    <hr>
                                    <small class="text-muted">Cedula Ciudadania</small>
                                    <p class="m-0 ml-1">{{ $docente->documento_identidad }}</p>
                                    <small class="text-muted">Dependencia</small>
                                    <p class="m-0 ml-1">{{ $docente->dependencia_docente->nombre }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row py-2">
                        <div class="col-12">
                            <div class="card card-body">
                                {{--
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label for="salon_asignatura">Salon/Sala</label>
                                            <div class="input-group px-3">
                                                <select class="form-control custom-select" id="salon_asignatura" name="salon">
                                                    @foreach($salones as $salon)
                                                    <option value="{{ $salon->id }}">
                                                        {{ $salon->nombre }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="horarios">Horarios Disponibles</label>
                                            <div class="input-group px-3">
                                                <select class="form-control custom-select" id="horarios" name="horario">

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    --}}
                                        @if ($asignatura->intensidad_horaria >= 5)
                                          <div class="row">

                                        <div class="form-group col">
                                            <label for="asignaturas_select">Selecciona el primer dia de Clases</label>
                                            <select name="dias[1]" class="form-control" id="dias_select" required>
                                                <option value="1">Lunes</option>
                                                <option value="2">Martes</option>
                                                <option value="3">Miercoles</option>
                                                <option value="4">Jueves</option>
                                                <option value="5">Viernes</option>
                                                <option value="6">Sabado</option>
                                            </select>
                                        </div>
                                        <div class="form-group col">
                                            <label for="asignaturas_select">Selecciona el segundo dia de Clases</label>
                                            <select name="dias[2]" class="form-control" id="dias_select" required>
                                                <option value="1">Lunes</option>
                                                <option value="2">Martes</option>
                                                <option value="3">Miercoles</option>
                                                <option value="4">Jueves</option>
                                                <option value="5">Viernes</option>
                                                <option value="6">Sabado</option>
                                            </select>
                                        </div>
                                      </div>
                                        @else
                                          <div class="row">
                                        <div class="form-group col">
                                            <label for="asignaturas_select">Selecciona el dia de Clases</label>
                                            <select name="dias" class="form-control" id="dias_select" required>
                                                <option value="1">Lunes</option>
                                                <option value="2">Martes</option>
                                                <option value="3">Miercoles</option>
                                                <option value="4">Jueves</option>
                                                <option value="5">Viernes</option>
                                                <option value="6">Sabado</option>
                                            </select>
                                        </div>
                                      </div>

                                        @endif
                                    <div class="p-2 text-right">
                                        <button type="submit" class="btn btn-elegant"> <i class="fa fa-save"></i> Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endsection
        @push('scripts')
        <script>
            $("#salon_asignatura,#horarios").select2({
                theme: 'bootstrap4',
            });
            $("#salon_asignatura").on("change", function(e) {
                $("#horarios").html("")
                getHorarios(this.value)
            })
            function getHorarios(id) {
                $.ajax({
                    url: '{{ url('/api/horarios-libres') }}',
                    type: 'POST',
                    data: 'salon=' + id,
                    dataType: 'json',
                    success: function(json) {
                        $.each(json, function(i, value) {
                            $("#horarios").append('<option value="' + value.id + '">' + value.dia + ', ' + value
                                .hora_inicio + '-' + value.hora_fin + '</option>')
                            });
                        }
                    });
                }
            </script>
            @endpush
