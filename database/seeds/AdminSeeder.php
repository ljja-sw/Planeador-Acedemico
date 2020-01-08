<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
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
        // $admin = Role::findByName("Admin",'admin');

        //   $user =  User::create([
        //     'nombre' => "Administrador",
        //     'apellido' => "Planeador Virtual",
        //     'documento_identidad' => "0000000000",
        //     'email' => "admin.planeador@univalle.edu.co",
        //     'password' => Hash::make("adminplaneadoru"),
        //   ]);
        //   $user->assignRole($admin);
        // }

        $admin = Role::findByName("Admin", 'admin');
        $correo_admin = md5(uniqid(rand(), true)) . "@univalle.edu.co";
        $contraseña_admin = md5(uniqid(rand(), true));

        $user =  User::create([
            'nombre' => "Administrador",
            'apellido' => "Planeador Virtual",
            'documento_identidad' => "0000000000",
            'email' => $correo_admin,
            'password' => Hash::make($contraseña_admin),
        ]);
        $user->assignRole($admin);

        Log::info('Correo y contraseña de usuario administrador: ');
        Log::info('Correo: ' . $correo_admin);
        Log::info('Contraseña: ' . $contraseña_admin);
        $this->command->info('Correo y contraseña de usuario administrador: ');
        $this->command->info('Correo: ' . $correo_admin);
        $this->command->info('Contraseña: ' . $contraseña_admin);
    }
}
