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
<li class="nav-item">
	{{-- Enlaces Administradores --}}
	<a class="nav-link" href="{{route('admin.configuraciones')}}">
		<i class="fa fa-cog"></i>
	Configuraciones</a>
</li>
{{-- <li class="nav-item">
	<a href="{{ route('salon.index') }}" class="nav-link">
		<i class="far fa-calendar-alt"></i>
		Salones y Horarios
	</a>
</li> --}}
@break

@case("Secretario")
<li class="nav-item">
	{{-- Enlaces Secretarios --}}
		<a class="nav-link" href="{{route('asignaturas.show')}}">
			<i class="fa fa-chalkboard-teacher "></i>		
		<a class="nav-link" href="/registro-asignaturas">
			<i class="fa fa-chalkboard-teacher "></i>
			Asignaturas
		</a>
	</li>

	<li class="nav-item">
		{{-- Enlaces Docentes --}}
		<a class="nav-link" href="{{ route('docentes.index') }}">
			<i class="fa fa-users"></i>
		Docentes</a>
	</li>

	<li class="nav-item">
	{{-- Enlaces Docentes --}}
		<a class="nav-link" href="{{ route('programa.show') }}">
			<i class="fa fa-tasks"></i>
		Programas</a>
	</li>
	@break

	@case("Docente")
	<li class="nav-item">
		{{-- Enlaces Docentes --}}
		<a class="nav-link" href="{{route('docente.asignaturas')}}">
			<i class="fa fa-chalkboard-teacher"></i>
		Mis Asignaturas</a>
	</li>
	@break
	@default
	@endswitch
	@endforeach
