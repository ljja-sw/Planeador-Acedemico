@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card card-body">
        <form action="{{ route('salon.store') }}" method="POST" autocomplete="off">
            @csrf
            <div class="row"> 
                <div class="col-md-6">
                    <div class="mx-auto my-5">
                        <div class="text-center">
                            <i class="fa fa-calendar-alt fa-3x m-2"></i>
                            <p class="text-muted m-0">Registrar</p>
                            <h3 class="h3-responsive font-weight-bold">
                                Salon/Sala
                            </h3>
                        </div>
                        <hr>
                        <div class="mx-auto">
                            <div class="md-form md-outline">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" required>
                            </div>
                            <div class="md-form md-outline">
                                <label for="capacidad">Capacidad</label>
                                <input type="number" class="form-control" name="capacidad" id="capacidad" min="10" max="30" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mx-auto my-5">
                        <div class="text-center">
                            <i class="fa fa-clock fa-3x m-2"></i>
                            <h3 class="h3-responsive font-weight-bold">
                                Horarios
                            </h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-sm " id="table_horario">
                                <thead class="text-center">
                                    <tr>
                                        <td colspan="3">
                                            <button class="btn btn-elegant btn-sm" id="btn_agregar_row" type="button">
                                                <i class="fa fa-plus"></i>
                                                Agregar Horario
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <b>Hora Inicio</b>
                                        </th>
                                        <th>
                                            <b>Hora Fin</b>
                                        </th>
                                        <th>
                                            <b>Día</b>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="cuerpo_tabla_horarios">
                                    <tr id="1" class="fila_horario">
                                        <td>
                                            <div class="md-form md-outline">
                                                <input type="time" class="form-control" name="hora_inicio[]" required min="7:00" max="22:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="md-form md-outline">
                                                <input type="time" class="form-control" name="hora_fin[]" irequired min="7:00" max="22:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="md-form md-outline">
                                                <select class="custom-select" name="dia[]" style="height:50px" required>
                                                    <option value="1">Lunes</option>
                                                    <option value="2">Martes</option>
                                                    <option value="3">Miercoles</option>
                                                    <option value="4">Jueves</option>
                                                    <option value="5">Viernes</option>
                                                    <option value="6">Sabado</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button class="btn btn-elegant" type="submit">
                    <i class="fa fa-save"></i> Registrar
                </button>
            </div>
        </div>
    </form>          
</div>
</div>
@endsection
@push('scripts')
<script>
    var count = 2;
    
    $("#btn_agregar_row").click(function(){
       $("#cuerpo_tabla_horarios").append(nueva_fila())
        
    })
    
    function nueva_fila()
    {
        var fila = $(".fila_horario").first().clone();
        fila.attr( "id",count++);
        return fila;
    }
</script>
@endpush