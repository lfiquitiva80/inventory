<?php

namespace App\Exports;

//use Maatwebsite\Excel\Concerns\FromCollection;
//use App\cliente;
//use Illuminate\Contracts\View\View;
//use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadings;

class consultaerradicacionesExport implements FromCollection,Responsable,ShouldQueue,WithHeadings
{


    use Exportable;
    private $fileName = 'Erradicaciones.xlsx';


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
         return $index = \DB::table('eradications')
                ->join('farms', 'farms.id', '=', 'eradications.farm_id')
                ->join('lots', 'lots.id', '=', 'eradications.lot_id')
                ->join('diseases', 'diseases.id', '=', 'eradications.disease_id')
                ->join('types', 'types.id', '=', 'eradications.type_id')
                ->join('officials', 'officials.id', '=', 'eradications.official_id')
                ->join('users', 'users.id', '=', 'eradications.user_id')
                ->select('eradications.id','eradications.fecha_erradicacion', 'farms.fincacodi', 'farms.fincadesc','lots.LOTECODCC','lots.LOTECODI','lots.LOTENOMB','diseases.enfermedad','types.tipo','officials.cedula','officials.nombrecompleto', 'eradications.columna as palma','eradications.fila as linea','users.name','eradications.observaciones', 'eradications.created_at as creación', 'eradications.updated_at as Actualización')
                ->whereBetween('fecha_erradicacion',[$this->fecha." 00:00:00", $this->fechafinal." 23:59:59"])
                ->get();


    }

       public function headings(): array
    {
        return [
                    'id',
                    'fecha_erradicacion',
                    'fincacodi',
                    'fincadesc',
                    'LOTECODCC',
                    'LOTECODI',
                    'LOTENOMB',
                    'enfermedad',
                    'tipo',
                    'cedula',
                    'nombrecompleto',
                    'palma',
                    'linea',
                    'name',
                    'observaciones',
                    'creación',
                    'Actualización'
                    




            
        ];
    }
}
