<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeighingStoreRequest;
use App\Http\Requests\WeighingUpdateRequest;
use App\Models\Weighing;
use App\Models\Balance;
use App\Models\Refined;
use App\Models\Procedencia;
use Illuminate\Http\Request;

class WeighingController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $weighings = Balance::Search($request->nombre)->paginate(3);
        $totalacp =  Balance::sum('NETO_REC_KILOS');
        $totalagl =  Balance::sum('NETO_AGL_APROD_KG');
        $totalaglaces =  Balance::sum('NETO_AGL_ACES_KG');
        $totalaglent =  Balance::sum('NETO_AGL_ENT_BIOD_KG');
        $totalrdbentregado =  Refined::sum('Cantidad_Kg');
        $rdb =  Balance::sum('RDB');
        $porcentajeagl= ($totalagl/$totalacp)*100;
        $porcentajerdb= ($rdb/$totalacp);
        $saldordb = $rdb - $totalrdbentregado;
        $conv_acp= ($totalrdbentregado/$porcentajerdb)*100;
        $merma = $conv_acp * 0.01;
        $produccion_agl= $conv_acp-$totalrdbentregado-$merma;
        $conv_desg = $conv_acp-$merma;

        $saldo_cpo=  $totalacp-$conv_desg-$merma;
        $agl_entregar = $produccion_agl*0.5;
        $desp_agl = 32170+31920+30020+29780+30900+30720+30480;
        $saldo_agl_ant_2020=-1906;
        $saldo_agl= $agl_entregar-$desp_agl+$saldo_agl_ant_2020;



        return  view('weighing.index', compact('weighings','totalacp','totalagl','totalaglaces','totalaglent','rdb','porcentajeagl','porcentajerdb','totalrdbentregado','saldordb','conv_acp','merma','produccion_agl','conv_desg','saldo_cpo','agl_entregar','desp_agl','saldo_agl_ant_2020','saldo_agl'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $codigo = Weighing::where('numero','LIKE',"EMP%")->OrderBy('fecha', 'DESC')->pluck('numero','numero');
        $procedencia = Procedencia::pluck('Tercero','id');


        return view('weighing.create',compact('codigo','procedencia'));
    }

    /**
     * @param \App\Http\Requests\WeighingStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(WeighingStoreRequest $request)
    {
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
        $codigo = Weighing::where('numero','LIKE',"EMP%")->OrderBy('fecha', 'DESC')->pluck('numero','numero');  
  
        return view('weighing.edit', compact('weighings','codigo','procedencia'));
    }

    /**
     * @param \App\Http\Requests\WeighingUpdateRequest $request
     * @param \App\Models\Weighing $weighing
     * @return \Illuminate\Http\Response
     */
    public function update(WeighingUpdateRequest $request, $id)
    {
        
        $weighing= Balance::where('id',$id);  

        $weighing->update($request->all());

        $request->session()->flash('weighing.id', $weighing->id);

        return redirect()->route('weighing.index')->with('warning','Se actualizó correctamente el registro!');
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


        public function basculaall(Request $request, Weighing $weighing)
    {
        

        
       return Weighing::where('numero',$request->input('numero'))->get();

    }




}
