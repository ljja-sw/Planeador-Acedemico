<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\User;

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
    	$role = Role::create(['name' => 'Secretario','guard_name' => 'admin']);
    	$role = Role::create(['name' => 'Docente']);

      $user =  User::create([
          'nombre' => "The Programers",
          'apellido' => "United",
          'documento_identidad' => "1111764777",
          'email' => "the.programmers@gmail.com",
          'password' => Hash::make("programador"),
        ]);

      $user->assignRole($admin);
    }
}
