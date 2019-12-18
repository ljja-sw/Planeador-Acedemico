<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $admin = Role::findByName("Admin",'admin');

      $user =  User::create([
        'nombre' => "Administrador",
        'apellido' => "Planeador Virtual",
        'documento_identidad' => "0000000000",
        'email' => "admin.planeador@univalle.edu.co",
        'password' => Hash::make("adminplaneadoru"),
      ]);
      $user->assignRole($admin);
    }
}
