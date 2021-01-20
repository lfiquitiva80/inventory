<?php

namespace App\Exports;

use App\Models\Lot;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class LotExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Lot::all();
    }


        public function headings(): array
    {
        return [
		  	 'id',
		  	 'FINCACODI',
		     'LOTECODCC',
		     'LOTECODI',
		     'LOTENOMB',
		     'created_at',
		     'updated_at'
        ];
    }

}
