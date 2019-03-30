<?php
/**
 *
 */
class DocenteController extends Controller
{

    public function index()
    {
        $roles = self::modelo("Rol")->buscar(1);
        $programas = self::modelo("Programa")->obtenerTodos();
        $docentes = self::modelo("Docente")->obtener("rol", "=", 1);
        
        self::vista("Docentes/index",
            ['roles' => $roles, 'programas' => $programas, 'docentes' => $docentes]);
    }

    public function detalles_docente()
    {
      $docente = self::modelo("Docente");
      $docente = $docente->buscar(Request::get("c"));

      self::vista("Docentes/detalles",
        ['docente'=> $docente]);
    }

    public function registrar_docente()
    {
        $docente = self::modelo("Docente");
        $data = Request::toArray($_POST);

        $split_nombre = str_split($data['nombre']);
        $split_apellido = str_split($data['apellido']);

        $password = ucwords($split_nombre[0]) . $data['codigo'] . ucwords($split_apellido[0]);

        if ($docente->crear([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'correo' => $data['correo'],
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'documento_identidad' => $data['documento_identidad'],
            'codigo' => $data['codigo'],
            'rol' => $data['rol'],
            'programa_dependencia' => $data['programa_dependencia'],
        ])) {
            Helpers::redirect("/docentes");
            Helpers::alert("success", "Docente registrado");
        } else {
            Helpers::redirect("/docentes");
            Helpers::alert("danger", "Hubo un error al registrar al docente");
        }
    }
    public function generarPlaneador(){
        self::vista("Planeador/generar-planeador");
    }
}
