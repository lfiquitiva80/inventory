<?php

namespace App\Exports;

use App\Models\Disease;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DiseaseExport implements FromCollection,WithHeadings{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Disease::all();
    }


    public function headings(): array
    {
        return [
		  	 'id',
		  	 'Enfermedad',
		     'Observaciones',
	         'created_at',
		     'updated_at'
        ];
    }
}
