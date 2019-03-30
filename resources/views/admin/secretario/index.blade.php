@extends('layouts.app')

@section('title','Secretarios Academicos')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-9 card-deck">
            <div class="card card-body">

            </div>
         </div>

         <div class="col-md">
            <div class="card card-body">
                <a href="{{ route('secretarios.create') }}" class="btn btn-elegant">
                    <i class="fa fa-plus"></i>
                    Registrar Secretario
                </a>
            </div>
         </div>
    </div>
</div>
@endsection
