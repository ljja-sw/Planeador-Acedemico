@extends('layouts.app')

@section('content')

@guest
<div class="container-fluid p-0">
    <section class="hero"></section>
</div>

<!-- Contenido -->
<div class="container my-3" id="contenidoPrincipal">
    <section class="row funciones text-center">
        <div class="col-md-4">
            <a class="card card-body flex-center hoverable">
                <i class="fa fa-list-ol fa-4x"></i>
                <hr>
                <h4>Generar Planeadores</h4>
                <p class="text-muted">Genera los planeadores academicos para tus clases</p>
            </a>
        </div>
        <div class="col-md-4">
            <a class="card card-body flex-center hoverable">
                <i class="fa fa-chalkboard-teacher fa-4x"></i>
                <hr>
                <h4>Gestion de Materas</h4>
                <p class="text-muted">Gestione sus materias asignadas por el Coodirnador de Carrera</p>
            </a>
        </div>
        <div class="col-md-4">
            <a class="card card-body flex-center hoverable">
                <i class="fa fa-plus-circle fa-4x"></i>
                <hr>
                <h4>y Más</h4>
                <p class="text-muted">Seguimiento de clases, reportes, entre otros.</p>
            </a>
        </div>
    </section>
</div>
@else
    <div class="container">
        <div class="row">
            <div class="col-md-10 card-deck">
                <div class="card card-body m-2">
                <h4 class="h4-responsive font-weight-bold card-title">
                    Enlaces temporales
                </h4>
                @foreach (auth()->user()->getRoleNames() as $rol)
                @switch($rol)
                {{-- Poner los enlaces de cada rol en su case correspondiente --}}
                @case('Admin')
                <small class="text-muted">
                    Enlaces para admins
                </small>
                <a href="{{ route('secretarios.index') }}">Secretarios Académicos</a>
                @break

                @case("Secretario")
                <small class="text-muted">
                    Enlaces para secretarios
                </small>
                @break

                @case("Docente")
                <small class="text-muted">
                    Enlaces para docentes
                </small>
                @break
                @default

                @endswitch
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
@endsection
