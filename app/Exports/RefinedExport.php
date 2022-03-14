<?php

namespace App\Exports;

use App\Models\Balance;
use App\Models\Refined;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RefinedExport implements FromCollection,WithHeadings
{
   
    use Exportable;

    private $fileName = 'RefinadoEntregado.xlsx';


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
            
        return Refined::all()->whereBetween('fechaNeto',[$this->fecha." 00:00:00", $this->fechafinal." 23:59:59"]);
    }

    public function headings(): array
    {
        return [
                'Producto',
                'Fecha',
                'NIT_Tercero',
                'Nombre_Tercero',
                'NIT_Destino',
                'Nombre_Destino',
                'Número',
                'NIT_Transportador',
                'Nombre_Transportador',
                'Placa',
                'Remolque',
                'Kilos_Despacho',
                'Kilos_Recibidos',
                'Diferencia',
                'AGL_Palmitico_Remitido',
                'AGL_Palmitico_Recibido',
                'Humedad_Remitido',
                'Humedad_Recibido',
                'Impureza_Remitido',
                'Impureza_Recibido',
                'Vr_Flete_x_Kilo',
                'Tipo_Mvto',
                'Dcto_Salida_Ofimatica',
                'Tipo_MvtoOfimatica',
                'sacos',
                'Origen',
                'Destino',
                'T_Operacion',
                'T_Flete',
                'reporta',
                'Ingreso',
                'Fecha_Ingreso',
                'nombreConductor',
                'tipoInterno',
                'tipoDco',
                'numero',
                'pesoBruto',
                'pesoTara',
                'unidadMedida',
                'fechaBruto',
                'fechaTara',
                'fechaNeto'
             
        ];
    }

}
