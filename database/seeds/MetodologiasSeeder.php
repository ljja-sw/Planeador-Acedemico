<?php

use Illuminate\Database\Seeder;
use App\Metodologia;

class MetodologiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Metodologia::create(['nombre' => "Clase Magistral"]);
        Metodologia::create(['nombre' => "Clase Magistral - Taller"]);
        Metodologia::create(['nombre' => "Clase Magistral - Exposicion"]);
        Metodologia::create(['nombre' => "Ninguna"]);
    }
}
