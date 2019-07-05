<?php

use Illuminate\Database\Seeder;
use App\Jornada;

class JornadasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jornada::create(['nombre'=> "NOC"]);
        Jornada::create(['nombre'=> "DIU"]);
    }
}
