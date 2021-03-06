<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeighingStoreRequest;
use App\Http\Requests\WeighingUpdateRequest;
use App\Models\Weighing;
use App\Models\Balance;
use App\Models\Refined;
use App\Models\Procedencia;
use Illuminate\Http\Request;
use App\Exports\BalanceExport;
use App\Models\Saldos;
use DB;

class WeighingController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $titulo="";
        $weighings = Balance::Search($request->nombre)->OrderBy('id','DESC')->paginate(15);
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




        return  view('weighing.index', compact('weighings','totalacp','totalagl','totalaglaces','totalaglent','rdb','porcentajeagl','porcentajerdb','totalrdbentregado','saldordb','conv_acp','merma','produccion_agl','conv_desg','saldo_cpo','agl_entregar','desp_agl','saldo_agl_ant_2020','saldo_agl'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

       $tiquete = Balance::pluck('NUMTIQUETE')->toArray();
       //dd($tiquete);

    
       $codigo = Weighing::where('numero','LIKE',"EMP%")
                            //->whereNotIn('numero',$tiquete)
                            ->whereYear('fecha','>=','2022')  
                            ->OrderBy('fecha', 'DESC')->pluck('numero','numero');
      
       $procedencia = Procedencia::pluck('Tercero','id');


        return view('weighing.create',compact('codigo','procedencia'));
    }

    /**
     * @param \App\Http\Requests\WeighingStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(WeighingStoreRequest $request)
    {
        
        //dd($request->all());
        $weighing = Balance::create($request->all());

        $request->session()->flash('weighing.id', $weighing->id);

        return redirect()->route('weighing.index')->with('success','Se creo correctamente el registro!');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Weighing $weighing
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Weighing $weighing)
    {
        return view('weighing.show', compact('weighing'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Weighing $weighing
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $weighings= Balance::find($id);
        $procedencia = Procedencia::pluck('Tercero','id');
        $codigo = Weighing::where('numero','LIKE',"EMP%")
                            ->whereYear('fecha','>=','2020')                           
                            ->OrderBy('fecha', 'DESC')->pluck('numero','numero'); 
  
        return view('weighing.edit', compact('weighings','codigo','procedencia'));
    }

    /**
     * @param \App\Http\Requests\WeighingUpdateRequest $request
     * @param \App\Models\Weighing $weighing
     * @return \Illuminate\Http\Response
     */
    public function update(WeighingUpdateRequest $request, $id)
    {
        
        $weighing= Balance::find($id); 

        $weighing->update($request->all());

        $request->session()->flash('weighing.id', $weighing->id);

        return redirect()->route('weighing.index')->with('warning','Se actualiz?? correctamente el registro!');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Weighing $weighing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        
        $balance= Balance::where('id',$id);   

        $balance->delete();

        return redirect()->route('weighing.index')->with('error','Se elimino correctamente!');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Weighing $weighing
     * @return \Illuminate\Http\Response
     */


        public function basculaall(Request $request, Weighing $weighing)
    {
        
       return Weighing::where('numero',$request->input('numero'))->get();

    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Weighing $weighing
     * @return \Illuminate\Http\Response
     */


      public function export(Request $request) 
    {
        
      return \Excel::download(new BalanceExport($request->fecha,$request->fechafinal), 'BalanceMaquila.xlsx');

    }


    public function acp(Request $request)
    {
        
        $titulo="INVENTARIO FINAL";
        $weighings = Balance::Search($request->nombre)->OrderBy('id','DESC')->paginate(15);
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

        $saldoacp= $request->input('saldo');
        $diferenciacpo = $saldoacp-$saldo_cpo;
        $porcentajepropio =($diferenciacpo/$saldoacp)*100;


        $acpsaldo = Saldos::find(1);
        $acpsaldo->SALDOINICIAL= $saldoacp;
        $acpsaldo->SALDOFINAL= $saldo_cpo;
        $acpsaldo->DIFERENCIA= $diferenciacpo;
        $acpsaldo->PORCENTAJE= $porcentajepropio;
        $acpsaldo->save();





        return  view('weighing.acp', compact('saldoacp','saldo_cpo','diferenciacpo','porcentajepropio','titulo'));
    }


        public function agl(Request $request)
    {
        
        $titulo="INVENTARIO FINAL";
        $weighings = Balance::Search($request->nombre)->OrderBy('id','DESC')->paginate(15);
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

        $saldoagl= $request->input('saldo');
        $diferenciaagl = $saldoagl-$saldo_agl;
        $porcentajepropio =($diferenciaagl/$saldoagl)*100;


        $aglsaldo = Saldos::find(2);
        $aglsaldo->SALDOINICIAL= $saldoagl;
        $aglsaldo->SALDOFINAL= $saldo_agl;
        $aglsaldo->DIFERENCIA= $diferenciaagl;
        $aglsaldo->PORCENTAJE= $porcentajepropio;
        $aglsaldo->save();


        return  view('weighing.agl', compact('saldoagl','saldo_agl','diferenciaagl','porcentajepropio','titulo'));
    }


    public function InvInicialAcp(Request $request)
    {
       $titulo= $request->input('titulo');
       $saldosacpbd= Saldos::find(1);  
       $saldoacp= $request->input('saldo');
       $diferenciacpo = $saldoacp * $saldosacpbd->PORCENTAJE/100;
       $saldo_cpo = $saldoacp-$diferenciacpo;
       $porcentajepropio =($diferenciacpo/$saldoacp)*100;


     return  view('weighing.acp', compact('saldoacp','saldo_cpo','diferenciacpo','porcentajepropio','titulo'));   
    }



    public function InvInicialAgl(Request $request)
    {
       $titulo= $request->input('titulo');
       $saldosacpbd= Saldos::find(2);  
       $saldoagl= $request->input('saldo');
       $diferenciaagl = $saldoagl * $saldosacpbd->PORCENTAJE/100;
       $saldo_agl = $saldoagl-$diferenciaagl;
       $porcentajepropio =($diferenciaagl/$saldoagl)*100;


     return  view('weighing.agl', compact('saldoagl','saldo_agl','diferenciaagl','porcentajepropio','titulo'));   
    }        


}
