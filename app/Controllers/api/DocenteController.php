<?php
/**
 *
 */
class DocenteController extends Controller
{
    public function listado()
    {
        header("content-type: application/json");
        $docentes = self::modelo("Docente")->obtener("rol", "=", 1);
        echo json_encode($docentes);
    }
}