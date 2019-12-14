<?php

namespace App\Imports;

use Hash;
use App\Docente;
use Spatie\Permission\Models\Role;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DocentesImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\rowbase\Eloquent\Model|null
     */
    public function model(array $row)
    {     
      $split_nombre = str_split($row['nombre']);
      $split_apellido = str_split($row['apellido']);
      $password = $split_nombre[0] . $row['cedula'] . $split_apellido[0];

      $docente = Docente::firstOrNew([
        'documento_identidad' => $row['cedula']
      ]);

      $docente->nombre = $row['nombre'];
      $docente->apellido = $row['apellido'];
      $docente->email = $row['correo'];
      $docente->documento_identidad = $row['cedula'];
      $docente->password = Hash::make($password);

      $docente->save();
      
      $role_docente = Role::findByName("Docente", "web");
      $docente->assignRole($role_docente);

      return $docente;
    }

    public function headingRow(): int
    {
      return 1;
    }
  }
