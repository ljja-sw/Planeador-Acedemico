@extends('layouts.app')

@section('content')
@section('title','LOREM IPSUM DOLOR-II')
<style>
    @media print {
        @page { margin: 0; }
        body { margin: 1.6cm; }
        footer, #btn-print{display: none;} 
        #no-print-tema, #no-print-evalua{display: none;}
    }
</style>

<div class="container"> 
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body tabñe responsive" id="planeador-div">
                <div class="text-right" id="btn-print" >
                    <button id="generarPDF" onclick="imprimircontenido('contenido')" class="btn btn-primary">
                        <i class="fa fa-print"></i> Generar PDF
                    </button>
                    <hr>
                </div>
                <div id="contenido">
                    <table class=" mb-5">
                        <tbody>
                            <tr>
                                <td>
                                    <h1 class="h1-responsive font-weight-bold ml-1 ml-lg-5 mt-2">Planeador</h1>
                                </td>
                                <td style="width:400px">
                                    <img class="img-fluid" src="{{ asset('images/logo_color.png') }}" alt="Planeador Academico">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered ">
                        <tbody>
                            <tr>
                                <td style="text-align:center" colspan="2">
                                    <h6 class="h6-responsive text-muted">Programa Académico</h6>
                                    <h4 class="h4-responsive font-weight-bold">Lorem Ipsum Dolor Sit</h4>
                                </td>
                                <td style="text-align:center" colspan="2">
                                    <h6 class="h6-responsive text-muted">Código del Programa</h6>
                                    <h4 class="h4-responsive font-weight-bold">0000</h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center">
                                    <h6 class="h6-responsive text-muted">Nombre de la Asignatura</h6>
                                    <h4 class="h4-responsive font-weight-bold">Lorem Ipsum Dolor</h4>
                                </td> 
                                <td style="text-align:center" colspan="2">
                                    <h6 class="h6-responsive text-muted">Código de la Asignatura</h6>
                                    <h4 class="h4-responsive font-weight-bold">00000M</h4>
                                </td> 
                                <td style="text-align:center">
                                    <h6 class="h6-responsive text-muted">Periodo Académico</h6>
                                    <h4 class="h4-responsive font-weight-bold">MMM - MMM</h4>
                                </td> 
                            </tr>
                            <tr>
                                <td style="text-align:center">
                                    <h6 class="h6-responsive text-muted">Créditos</h6>
                                    <h4 class="h4-responsive font-weight-bold">0</h4>
                                </td> 
                                <td style="text-align:center">
                                    <h6 class="h6-responsive text-muted">Intesidad Horaria</h6>
                                    <h4 class="h4-responsive font-weight-bold">0</h4>
                                </td> 
                                <td style="text-align:center">
                                    <h6 class="h6-responsive text-muted">Validable</h6>
                                    <h4 class="h4-responsive font-weight-bold"><i class="fa fa-check"></i></h4>
                                </td> 
                                <td style="text-align:center">
                                    <h6 class="h6-responsive text-muted">Habilitable</h6>
                                    <h4 class="h4-responsive font-weight-bold"><i class="fa fa-times"></i></h4>
                                </td> 
                            </tr>
                            <tr>
                                <td style="text-align:center" colspan="2">
                                    <h6 class="h6-responsive text-muted">Nombre del Docente</h6>
                                    <h4 class="h4-responsive font-weight-bold">Mr. Lorem Ipsum Dolor Sit</h4>
                                </td> 
                                
                                <td style="text-align:center" colspan="2">
                                    <h6 class="h6-responsive text-muted">Correo del Docente</h6>
                                    <h4 class="h4-responsive font-weight-bold"><a href="mailto:lorem.ipsum.info@example.com">lorem.ipsum.info@example.com</a></h4>
                                </td> 
                            </tr>
                        </tbody>
                    </table>
                    <div class="col-md-12 d-flex justify-content-end">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" id="no-print-evalua" data-toggle="modal" data-target="#exampleModal2">
                        Nuevo evaluación
                        </button>
                    </div>
                    <table class="table table-bordered ">
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
                                    <ul style="list-style-type: none;" id="listaEv">
                                        
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-end">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" id="no-print-tema" data-toggle="modal" data-target="#exampleModal">
                            Nuevo tema
                            </button>
                        </div>
                        <div class="col-md-12">
                            <table id="tabla" class="table table-bordered">
                                <tbody class="text-center">
                                    <tr>
                                        <th colspan="4" >
                                            <h4 class="font-weight-bold">Contenido Temático</h4>
                                        </th>
                                    </tr>
                                    <tr class="text-center" >
                                        <th scope="col">Semana</th>
                                        <th scope="col">Fecha(s)</th>
                                        <th scope="col">Temas - Actividades</th>
                                        <th scope="col">Metodología*</th>
                                    </tr>
                                    {{-- @for ($i = 1; $i <= 18; $i++)
                                    <tr>
                                        <th scope="row">{{$i}}</th>
                                        <td> 21/08/2018</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    @endfor --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>               
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 form-group">
                                <label for="evaluacion">Evaluación</label>
                                <input type="text" class="form-control" name="evaluacion" id="evaluacion" placeholder="Evaluación">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="nuevoeva()" id="addtema">Añadir evaluación</button>
                </div>
            </form>
        </div>
    </div>
</div>
      
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo tema</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 form-group">
                                <label for="semana">Semana:</label>
                                <input type="number" class="form-control" name="semana" id="semana">
                            </div>
                            <div class="col-12 form-group">
                                <label for="fecha">Fecha:</label>
                                <input type="date" class="form-control" name="fecha" id="fecha">
                            </div>
                            <div class="col-12 form-group">
                                <label for="tema">Tema - Actividad</label>
                                <input type="text" class="form-control" name="tema" id="tema" placeholder="Tema">
                            </div>
                            <div class="col-12 form-group">
                                <label for="metodologia">Metodología</label>
                                <select class="form-control" name="metodologia" id="metodologia">
                                    <option value="">Metodología</option>
                                    <option value="CM">Clase Magistral</option>
                                    <option value="CM-TL">Clase magistal - Taller</option>
                                    <option value="CM-EXP">Clase Magistral - Exposición</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="nuevotema()" id="addtema">Añadir tema</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
