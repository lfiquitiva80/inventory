<?php

namespace App\Exports;

use App\Models\Balance;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BalanceExport implements FromCollection,WithHeadings
{
   
    use Exportable;

    private $fileName = 'BalanceMaquila.xlsx';


   public function __construct($fecha,$fechafinal) 
    {
        $this->fecha = $fecha;
        $this->fechafinal = $fechafinal;
      
    }

 
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
   

      return  \DB::connection('palmeras')->table('BALANCE_MAQUILA_REFINACION')
                ->join('PROCEDENCIA', 'PROCEDENCIA.id', '=', 'BALANCE_MAQUILA_REFINACION.PROCEDENCIA')
                ->select('BALANCE_MAQUILA_REFINACION.*','PROCEDENCIA.Tercero','PROCEDENCIA.Nit')
                ->whereBetween('FEC_RECEPCION',[$this->fecha, $this->fechafinal])->get();
    }

    public function headings(): array
    {
        return [
		  	    'id',
                'NUMREMISION',
                'NETO',
                'PROCEDENCIA',
                'PLACA',
                'ACIDEZREMITIDA',
                'HUM_IMP_REMITIDO',
                'FEC_RECEPCION',
                'NUMTIQUETE',
                'NETO_REC_KILOS',
                'ACIDEZ_RECIBIDA',
                'HUM_IMP_RECIBIDA',
                'MERMA',
                'NETO_AGL_APROD_KG',
                'NETO_AGL_ACES_KG',
                'NETO_AGL_ENT_BIOD_KG',
                'NETO_MERMA',
                'RDB',
                'DIFERENCIAS_ORIGEN',
                'CREATED_AT',
                'UPDATED_AT',
                'Tercero',
                'Nit'

		  
        ];
    }

}
