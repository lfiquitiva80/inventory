<?php

namespace App\Exports;

use App\Models\Type;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class TypeExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Type::all();
    }



    public function headings(): array
    {
        return [
		  	 'id',
		  	 'Tipo de Erradicación',
		     'Observaciones',
	         'created_at',
		     'updated_at'
        ];
    }


}
