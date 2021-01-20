<?php

namespace App\Exports;

use App\Models\Official;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OfficialExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Official::all();
    }


        public function headings(): array
    {
        return [
		  	 'id',
		  	 'Cedula',
		     'Nombre Completo',
	         'created_at',
		     'updated_at'
        ];
    }
}
