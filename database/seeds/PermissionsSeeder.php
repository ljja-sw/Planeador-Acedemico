<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrador = Role::find(1);
        $secretario = Role::find(2);
        $docente = Role::find(3);

        $crud_docentes = Permission::create(['name' => 'crud docentes','guard_name' => 'admin']);
        $crud_asignaturas = Permission::create(['name' => 'crud asignaturas','guard_name' => 'admin']);
        $asignar_materias = Permission::create(['name' => 'asignar materias','guard_name' => 'web']);

        $administrador->givePermissionTo('crud docentes' , 'crud asignaturas');
        $docente->givePermissionTo('asignar materias');
    }
}
