<?php

namespace App\Exports;

use App\Models\Farm;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FarmExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Farm::all();
    }

    public function headings(): array
    {
        return [
		  	 'id',
		  	 'Codigo_finca',
		     'Descripcion_finca',
	         'created_at',
		     'updated_at'
        ];
    }
}
