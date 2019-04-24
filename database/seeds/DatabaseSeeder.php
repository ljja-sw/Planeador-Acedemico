<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $docente = factory('App\Dependencia',15)->create();
      $docente = factory('App\Asignatura',30)->create();

      $this->call(RolesSeeder::class);
      $this->call(PermissionsSeeder::class);
    }
}
