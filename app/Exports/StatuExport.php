<?php

namespace App\Exports;

use App\Models\Statu;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StatuExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Statu::all();
    }

    public function headings(): array
    {
        return [
		  	 'id',
		  	 'Estados',
		     'Observaciones',
	         'created_at',
		     'updated_at'
        ];
    }

}
