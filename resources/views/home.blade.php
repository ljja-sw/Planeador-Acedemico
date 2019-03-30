@extends('layouts.app')

@section('content')
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
@endsection
