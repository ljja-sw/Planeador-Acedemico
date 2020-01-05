<?php

use Illuminate\Database\Seeder;
use App\Docente;
use App\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DeveloperSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        factory("App\Programa",10)->create();

        $role_docente = Role::findByName("Docente");
        $role_secretario = Role::findByName("Secretario",'admin');

        $docente =  Docente::create([
            'nombre' => "Jean Antonio",
            'apellido' => "Solis Riascos",
            'documento_identidad' => "1111431542",
            'email' => "antonio.solis@gmail.com",
            'password' => Hash::make("docente"),
            ]);
            $docente->assignRole($role_docente);

            $secretario =  User::create([
                'nombre' => "Jean Antonio",
                'apellido' => "Solis Riascos",
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

                for ($i=1; $i < 50; $i++) {
                    $docente = factory('App\Docente')->make();
                    $docente->save();
                    $docente->assignRole($role_docente);
                }

                $this->call(SalonesHorarios::class);
            }
        }
