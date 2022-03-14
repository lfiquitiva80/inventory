<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use DB;
use App\Models\Weighing;
use App\Models\Balance;
use App\Models\Refined;
use App\Models\Procedencia;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {



        $totalacp =  Balance::sum('NETO_REC_KILOS');
        $totalagl =  Balance::sum('NETO_AGL_APROD_KG');
        $totalaglaces =  Balance::sum('NETO_AGL_ACES_KG');
        $totalaglent =  Balance::sum('NETO_AGL_ENT_BIOD_KG');
        $totalrdbentregado =  collect(DB::connection('palmeras')->select(DB::raw("SELECT SUM(Kilos_Despacho) AS KD FROM DESPACHOPTMAQUILA()")))->first();
        $rdb =  Balance::sum('RDB');
        $porcentajeagl= ($totalagl/$totalacp)*100;
        $porcentajerdb= ($rdb/$totalacp)*100;
        $saldordb = $rdb - $totalrdbentregado->KD;
        $conv_acp= ($totalrdbentregado->KD/$porcentajerdb)*100;
        $merma = $conv_acp * 0.01;
        $produccion_agl= $conv_acp-$totalrdbentregado->KD-$merma;
        $conv_desg = $conv_acp-$merma;

        $saldo_cpo=  $totalacp-$conv_desg-$merma;
        $agl_entregar = $produccion_agl*0.5;
        $desp_agl = DB::connection('improagro')->select(DB::raw("SELECT sum(pesoNeto) as PesoNeto
        FROM [IMPROAGRO].[dbo].[bRegistroBascula] where tercero='900104517-8' and producto='1004' and year(fechaNeto) > '2020'"));
        
        $saldo_agl_ant_2020=-1906;
        $saldo_agl= $agl_entregar-$desp_agl[0]->PesoNeto+$saldo_agl_ant_2020;
       
        return view('home', compact('totalacp','totalagl','totalaglaces','totalaglent','rdb','porcentajeagl','porcentajerdb','totalrdbentregado','saldordb','conv_acp','merma','produccion_agl','conv_desg','saldo_cpo','agl_entregar','desp_agl','saldo_agl_ant_2020','saldo_agl'));
    }
}
