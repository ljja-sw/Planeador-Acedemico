@foreach (auth()->user()->getRoleNames() as $rol)
@switch($rol)
{{-- Poner los enlaces de cada rol en su case correspondiente --}}
@case('Admin')
<li class="nav-item {{request()->is('admin/secretarios*') ? "active" : ''}}">
	{{-- Enlaces Administradores --}}
	<a class="nav-link" href="{{ route('secretarios.index') }}">
		<i class="fa fa-users"></i>
	Secretarios Académicos</a>
</li>
@break

@case("Secretario")
<li class="nav-item {{request()->is('asignatura*') ? "active" : ''}}">
	{{-- Enlaces Secretarios --}}
	<a class="nav-link" href="{{route('asignaturas.show')}}">
		<i class="fa fa-chalkboard "></i>
		Asignaturas
	</a>
</li>

<li class="nav-item {{request()->is('docentes*') ? "active" : ''}}">
	{{-- Enlaces Docentes --}}
	<a class="nav-link" href="{{ route('docentes.index') }}">
		<i class="fa fa-chalkboard-teacher"></i>
	Docentes</a>
</li>
<li class="nav-item {{request()->is('programas*') ? "active" : ''}}">
	{{-- Enlaces Docentes --}}
	<a class="nav-link" href="{{ route('programa.index') }}">
		<i class="fa fa-graduation-cap"></i>
	Programas</a>
</li>

<li class="nav-item {{request()->is('salones-salas*') ? "active" : ''}}">
	<a href="{{ route('salon.index') }}" class="nav-link">
		<i class="far fa-bookmark"></i>
		Salones
	</a>
</li>
@break

@case("Docente")

<li class="nav-item {{request()->is('reportes*') ? "active" : ''}}">
	{{-- Enlaces Docentes --}}
	@if(!is_null(auth()->user()->planeadores))
	<a class="nav-link" href="{{ route('reportes') }}">
		<i class="fa fa-tasks"></i>
		Reportes</a>
	@else

	@endif
</li>
@break
@default
@endswitch
@endforeach
