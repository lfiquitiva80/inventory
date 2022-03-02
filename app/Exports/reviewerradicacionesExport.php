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

class reviewerradicacionesExport implements FromCollection,Responsable,ShouldQueue,WithHeadings
{


    use Exportable;
    private $fileName = 'Revision_Erradicaciones.xlsx';


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
         return dd($index = \DB::table('reviews')
                ->join('farms', 'farms.id', '=', 'reviews.farm_id')
                ->join('lots', 'lots.id', '=', 'reviews.lot_id')
                ->join('diseases', 'diseases.id', '=', 'reviews.disease_id')
                ->join('types', 'types.id', '=', 'reviews.type_id')
                ->join('officials', 'officials.id', '=', 'reviews.official_id')
                ->join('users', 'users.id', '=', 'reviews.user_id')
                ->select('reviews.id','reviews.fecha_erradicacion', 'farms.fincacodi', 'farms.fincadesc','lots.LOTECODCC','lots.LOTECODI','lots.LOTENOMB','diseases.enfermedad','types.tipo','officials.cedula','officials.nombrecompleto', 'reviews.columna as palma','reviews.fila as linea','users.name','reviews.observaciones', 'reviews.created_at as creación', 'reviews.updated_at as Actualización')
                ->whereBetween('fecha_erradicacion',[$this->fecha." 00:00:00", $this->fechafinal." 23:59:59"])
                ->get());


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
