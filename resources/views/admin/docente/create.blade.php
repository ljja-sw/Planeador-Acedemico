@extends('layouts.app')

@section('content')
@include('libs.select2')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body text-center">
                <i class="fa fa-user fa-3x py-2"></i>
                <h4 class="font-weight-bold h4-responsive">
                    Registrar Docente
                </h4>
            </div>
            <div class="card card-body">
                
                    @if(session()->has('msj'))
                    <div class="alert alert-success" role="alert">{{session('msj')}}</div>
                    @elseif(count($errors) > 0)
                    <div class="alert alert-danger">
                      <h6 class="font-weight-bold">Por favor corrija los siguientes errores:</h6>
                      <ul>
                        @foreach($errors->all() as $error)
                          <li>{{$error}}</li>
                        @endforeach
                      </ul>
                    </div>
                    @endif

                    <form action="{{url('/admin/docentes/update')}}" id="form-registrar-usuario" method="post" autocomplete="off">
                        @csrf
                        <div class="md-form md-outline">
                            <input type="text" name="nombre" id="nombre" class="form-control" required>
                            <label for="nombre">Nombre</label>
                        </div>

                        <div class="md-form md-outline">
                            <input type="text" name="apellido" id="apellido" class="form-control" required>
                            <label for="apellido">Apellido</label>
                        </div>

                        <div class="md-form md-outline">
                            <input type="email" name="email" id="correo" class="form-control" required>
                            <label for="correo">Correo</label>
                        </div>

                        <div class="md-form md-outline">
                            <input type="text" name="documento_identidad" maxlength="10" id="documento_identidad"
                                class="form-control" length="10" required>
                            <label for="documento_identidad">Documento Identidad</label>
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="dependencia" id="dependencia">
                                <option value="">Dependencia</option>
                                @foreach ($dependencias as $pd)
                                    <option value="{{$pd->id}}"> {{$pd->nombre}} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-primary">
                                <i class="fa fa-cloud-upload-alt"></i>
                                Registrar
                            </button>
                        </div>
                    </form>
            </div>
         </div>
    </div>
</div>
@endsection