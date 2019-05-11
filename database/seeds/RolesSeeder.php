<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\User;
use App\Docente;

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

      $user =  User::create([
        'nombre' => "The Programers",
        'apellido' => "United",
        'documento_identidad' => "1111764777",
        'email' => "the.programmers@gmail.com",
        'password' => Hash::make("programador"),
      ]);
      $user->assignRole($admin);

      $docente =  Docente::create([
        'nombre' => "Jean Antonio",
        'apellido' => "Solis Montaño",
        'documento_identidad' => "1111431542",
        'email' => "antonio.solis@gmail.com",
        'dependencia' => 2,
        'password' => Hash::make("docente"),
      ]);
      $docente->assignRole($role_docente);

      $secretario =  User::create([
        'nombre' => "Jean Antonio",
        'apellido' => "Solis Montaño",
        'documento_identidad' => "1111431542",
        'email' => "antonio.solis@gmail.com",
        'password' => Hash::make("secretario"),
      ]);
      $secretario->assignRole($role_secretario);

      for ($d=1; $d <= 20; $d++) {
        $secretario = factory('App\User')->make();
        $secretario->save();
        $secretario->assignRole($role_secretario);
      }

      for ($i=1; $i < 10; $i++) {
        $docente = factory('App\Docente')->make();
        $docente->save();
        $docente->assignRole($role_docente);
      }

    }
  }

//