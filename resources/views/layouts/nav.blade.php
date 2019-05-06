@foreach (auth()->user()->getRoleNames() as $rol)
@switch($rol)
{{-- Poner los enlaces de cada rol en su case correspondiente --}}
@case('Admin')
<li class="nav-item">
	{{-- Enlaces Administradores --}}
	<a class="nav-link" href="{{ route('secretarios.index') }}">
		<i class="fa fa-users"></i>
	Secretarios Académicos</a>
</li>
@break

@case("Secretario")
<li class="nav-item">
	{{-- Enlaces Secretarios --}}
	<a class="nav-link" href="{{route('asignaturas.show')}}">
	<i class="fa fa-chalkboard-teacher "></i>		
	Asignaturas</a>
</li>
<li class="nav-item">
	{{-- Enlaces Docentes --}}
	<a class="nav-link" href="{{ route('docentes.index') }}">
		<i class="fa fa-users"></i>
	Docentes</a>
</li>
@break

@case("Docente")
<li class="nav-item">
	{{-- Enlaces docentes --}}
	<a class="nav-link" href="#">Enlaces Docente</a>
</li>

@break
@default

@endswitch
@endforeach