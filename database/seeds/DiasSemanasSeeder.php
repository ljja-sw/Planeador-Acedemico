<?php

use Illuminate\Database\Seeder;
use App\Mes;
use App\Dia;

class DiasSemanasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dia::create(['dia'=> "Lunes",'dia_semana'=> 0]);
        Dia::create(['dia'=> "Martes",'dia_semana'=> 1]);
        Dia::create(['dia'=> "Miercoles",'dia_semana'=> 2]);
        Dia::create(['dia'=> "Jueves",'dia_semana'=> 3]);
        Dia::create(['dia'=> "Viernes",'dia_semana'=> 4]);
        Dia::create(['dia'=> "Sabado",'dia_semana'=> 5]);

        Mes::create(['mes'=> "Enero",'mes_anio'=> 0]);
        Mes::create(['mes'=> "Febrero",'mes_anio'=> 0]);
        Mes::create(['mes'=> "Marzo",'mes_anio'=> 0]);
        Mes::create(['mes'=> "Abril",'mes_anio'=> 0]);
        Mes::create(['mes'=> "Mayo",'mes_anio'=> 0]);
        Mes::create(['mes'=> "Junio",'mes_anio'=> 0]);
        Mes::create(['mes'=> "Julio",'mes_anio'=> 0]);
        Mes::create(['mes'=> "Agosto",'mes_anio'=> 0]);
        Mes::create(['mes'=> "Septiembre",'mes_anio'=> 0]);
        Mes::create(['mes'=> "Octubre",'mes_anio'=> 0]);
        Mes::create(['mes'=> "Noviembre",'mes_anio'=> 0]);
        Mes::create(['mes'=> "Diciembre",'mes_anio'=> 0]);

    }
}