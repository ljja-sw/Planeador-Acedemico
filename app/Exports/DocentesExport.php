<?php

namespace App\Exports;

use App\Docente;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class DocentesExport implements FromCollection,WithHeadings,ShouldAutoSize,WithEvents
{
	use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
    	return [
            // ['Listado de docentes'],
    		[
    			'Cédula',
    			'Nombre',
    			'Apellido',
    			'Correo',
    		],
    	];
    	return [];
    }

    public function registerEvents(): array
    {
    	return [
    		AfterSheet::class    => function (AfterSheet $event) {
                $cellRange = 'A1:D1'; //Titulo

                $event->sheet->getDelegate()
                ->getStyle($cellRange)
                ->getFont()
                ->setBold(true)
                ->setSize(14)
                ;

                // $event->sheet->getDelegate()
                // ->getStyle($title)
                // ->getFont()
                // ->setBold(true)
                // ->setSize(18);

                // $event->sheet->getDelegate()->mergeCells('A1:D1');
            },
        ];
    }

    public function collection()
    {
    	$docentes = DB::table('docentes')->select('documento_identidad','nombre', 'apellido', 'email')->get();
    	return $docentes;
    }
}
