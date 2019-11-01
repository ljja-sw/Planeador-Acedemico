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
        'inicio_clases' => "2001-01-01",
        'inicio_periodo_academico' => 1,
        'fin_periodo_academico' =>1,
        'numero_semanas' => 18
      ]);

      factory('App\Programa',20)->create();
      factory('App\Asignatura',30)->create();

      $this->call(RolesSeeder::class);
      $this->call(DiasSemanasSeeder::class);
      $this->call(PermissionsSeeder::class);
      $this->call(MetodologiasSeeder::class);
      $this->call(JornadasSeeder::class);
      $this->call(SalonesHorarios::class);

    }
}
