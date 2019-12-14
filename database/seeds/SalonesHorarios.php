<?php

use Illuminate\Database\Seeder;

class SalonesHorarios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=1; $i < 20; $i++) {
    		$salon = factory('App\SalonSala')->make();
    		$salon->save();
    		factory('App\Horario',5)->create(['salon_sala_id' => $salon->id]);
    	};
    }
 }
