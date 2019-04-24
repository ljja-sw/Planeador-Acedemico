@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto card-deck">
            <div class="card card-body table-responsive">
                <h3 class="font-weight-bold card-title m-4">
                <i class="far fa-clipboard text-muted"></i>
                Generar planeador
                </h3>
                <div class="text-right">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="mr-2">
                                <input type="text" class="form-control" name="Semana" id="Semana" placeholder="Semana">
                            </div>
                            <div class="mr-2">
                                <input type="date" class="form-control" name="facha" id="fecha" value="fecha">
                            </div>
                            <div class="mr-2 w-25">
                                    <input type="text" class="form-control" name="tema" id="tema" placeholder="Tema">
                            </div>
                            <div class="mr-2">
                                <select class="form-control" name="metodo" id="metodo">
                                    <option value="">Metodología</option>
                                    <option value="CM">Clase Magistral</option>
                                    <option value="CMTL">Clase Magistral - Taller</option>
                                    <option value="CMEXP">Clase Magistral - Exposición</option>
                                    <option value="CMEMP">Clase Magistral - EMP</option>
                                </select> 
                            </div>
                            <div>
                                <a href="{{ route('secretarios.create') }}" class="btn btn-elegant">
                                    <i class="fa fa-plus"></i>
                                    Añadir tema
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <table id="tabla_secretarios" class="table datatable table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Semana</th>
                        <th class="th-sm">Fecha</th>
                        <th class="th-sm">Temas - Actividades</th>
                        <th class="th-sm">Metodología</th>
                        <th class="th-sm"></th>
                        <th class="th-sm"></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach($secretarios as $secretario) --}}
                    <tr>
                        <th>1</th>
                        <th>22/08/2018</th>
                        <th>Acuerdos pedagogicos</th>
                        <th>CM</th>
                        <th>
                            <div class="text-right">
                                <a href="#!" class="btn btn-elegant text-white">
                                    <i class="fa fa-edit"></i>
                                    Editar
                                </a>
                            </div>
                        </th>
                        <th>
                            <div class="text-right">
                                <a href="#!" class="btn btn-danger text-white">
                                    <i class="fa fa-trash"></i>
                                    Eliminar
                                </a>
                            </div>
                        </th>
                    </tr>
                    {{-- @endforeach --}}
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
