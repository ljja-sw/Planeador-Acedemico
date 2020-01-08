<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$admin = Role::create(['name' => 'Admin','guard_name' => 'admin']);
    	$role_secretario = Role::create(['name' => 'Secretario','guard_name' => 'admin']);
    	$role_docente = Role::create(['name' => 'Docente']);
    }
  }

//
