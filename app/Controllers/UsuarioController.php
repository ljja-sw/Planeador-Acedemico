<?php
/**
 *
 */
class UsuarioController extends Controller
{

    public function index()
    {
        $roles = self::modelo("Rol")->buscar(2);
        $usuarios = self::modelo("Usuario")->obtener("rol", "=", 2);

        self::vista("Admin/Usuarios/index",
            ['roles' => $roles, 'usuarios' => $usuarios]);
    }

    public function detalles_usuario()
    {
        $docente = self::modelo("Docente");
        $docente = $docente->buscar(Request::get("c"));

        self::vista("Admin/Usuarios/detalles",
            ['docente' => $docente]);
    }

    public function registrar_usuario()
    {
        $usuario = self::modelo("Usuario");
        $data = Request::toArray($_POST);

        $split_nombre = str_split($data['nombre']);
        $split_apellido = str_split($data['apellido']);

        $password = ucwords($split_nombre[0]) . $data['documento_identidad'] . ucwords($split_apellido[0]);

        if ($usuario->crear([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'correo' => $data['correo'],
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'documento_identidad' => $data['documento_identidad'],
            'rol' => $data['rol'],
        ])) {
            Helpers::redirect("/admin/usuarios");
            Helpers::alert("success", "Usuario registrado");
        } else {
            Helpers::redirect("/admin/usuarios");
            Helpers::alert("danger", "Hubo un error al registrar al Usuario");
        }
    }

    public function asignaturas_docentes()
    {
      if (isset($_POST['docente'])) {
        $docente = self::modelo("Docente")
            ->setCampos(
                ['id', 'nombre', 'apellido', 'correo', 'codigo', 'documento_identidad'])
            ->where("id = {$_POST['docente']}")
            ->get();

        $salas = self::modelo("Salon")
            ->obtenerTodos();

        self::vista("Admin/asignar-materias-docente",
        [ 'docente' => $docente,
          'asignatura' => [],
          'salones' => $salas ]);

      }else{
        $docentes = self::modelo("Docente")
            ->setCampos(
                ['id', 'nombre', 'apellido', 'documento_identidad'])
            ->obtenerTodos();

        self::vista("Admin/asignar-materias-docente",["docentes" => $docentes]);

      }
    }

    public function asignaturas_docentes_guardar()
    {
      echo Helpers::toJson($_POST);
    }
}
