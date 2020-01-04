<?php

use Illuminate\Database\Seeder;
use App\Configuracion;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      Configuracion::create([
        'inicio_clases' => now(),
        'inicio_periodo_academico' => 1,
        'fin_periodo_academico' =>1,
        'numero_semanas' => 16
      ]);

      $this->call(RolesSeeder::class);
      $this->call(AdminSeeder::class);
      $this->call(DiasSemanasSeeder::class);
      $this->call(PermissionsSeeder::class);
      $this->call(MetodologiasSeeder::class);
      $this->call(JornadasSeeder::class);

      if(env('APP_ENV') != "production"){
      $this->call(DeveloperSeeder::class);
      }
    }
}
