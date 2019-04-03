@foreach (auth()->user()->getRoleNames() as $rol)
@switch($rol)
{{-- Poner los enlaces de cada rol en su case correspondiente --}}
@case('Admin')
<li class="nav-item">
	<a class="nav-link" href="{{ route('secretarios.index') }}">
	<i class="fa fa-users"></i>
	Secretarios Académicos</a>
</li>
@break

@case("Secretario")
<li class="nav-item">
	<a class="nav-link" href="#">Enlaces Secretarios</a>
</li>

@break

@case("Docente")
<li class="nav-item">
	<a class="nav-link" href="#">Enlaces Docente</a>
</li>

@break
@default

@endswitch
@endforeach