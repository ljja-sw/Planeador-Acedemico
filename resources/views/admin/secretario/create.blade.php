@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body text-center">
                <i class="fa fa-user fa-3x py-2"></i>
                <h4 class="font-weight-bold h4-responsive">
                    Registrar Secretario Academico
                </h4>
            </div>
            <div class="card card-body">
                    <form action="/admin/secretarios/registrar" id="form-registrar-usuario" method="post" autocomplete="off">
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
                            <input type="email" name="correo" id="correo" class="form-control" required>
                            <label for="correo">Correo</label>
                        </div>

                        <div class="md-form md-outline">
                            <input type="text" name="documento_identidad" maxlength="10" id="documento_identidad"
                                class="form-control" length="10" required>
                            <label for="documento_identidad">Documento Identidad</label>
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
