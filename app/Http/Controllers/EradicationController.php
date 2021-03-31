<?php

namespace App\Http\Controllers;

use App\Http\Requests\EradicationStoreRequest;
use App\Http\Requests\EradicationUpdateRequest;
use App\Models\Eradication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Inventory;
use App\Models\Farm;
use App\Models\Statu;
use App\Models\User;
use App\Models\Lot;
use App\Models\Disease;
use App\Models\Type;
use App\Models\Official;
use App\Models\Review;
use DB;


class EradicationController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        $eradications = Eradication::Search($request->nombre)->orderBy('id', 'DESC')->paginate(10);
        $farm = Farm::pluck('fincadesc','id');
        $lote = Lot::select(DB::raw("CONCAT(LOTECODI,' ',LOTENOMB) AS name"),'id')->pluck('name','id');
        $statu = Statu::pluck('estado','id');
        $disease = Disease::Orderby('enfermedad','ASC')->pluck('enfermedad','id');
        $type = Type::pluck('tipo','id');
        $official = Official::pluck('nombrecompleto','id');
        $inventory = Inventory::pluck('id','id');
        $user= User::where('id',Auth::id())->pluck('name','id');


        return view('eradication.index', compact('eradications','farm','lote','statu','user','disease','type','official','inventory'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('eradication.create');
    }

    /**
     * @param \App\Http\Requests\EradicationStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EradicationStoreRequest $request)
    {
        
        
        $query = Inventory::where([['farm_id',$request->input('farm_id')],['lot_id',$request->input('lot_id')],['columna',$request->input('columna')],['fila',$request->input('fila')]])->first();

     
      
        if ($query->statu_id == 2) {
            $result = Review::create($request->validated());
        } else {

            $affected = DB::table('inventories')
              ->where('id', $query->id)
              ->update(['statu_id' => 2]);

             $result = Eradication::create($request->validated());


        }


        $request->session()->flash('eradication.id', $result->id);

        return redirect()->route('eradication.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Eradication $eradication
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Eradication $eradication)
    {
        return view('eradication.show', compact('eradication'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Eradication $eradication
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Eradication $eradication)
    {
        return view('eradication.edit', compact('eradication'));
    }

    /**
     * @param \App\Http\Requests\EradicationUpdateRequest $request
     * @param \App\Models\Eradication $eradication
     * @return \Illuminate\Http\Response
     */
    public function update(EradicationUpdateRequest $request, $id)
    {
        $eradication = Eradication::findOrFail($request->id);

        $eradication->update($request->validated());

        $request->session()->flash('eradication.id', $eradication->id);

        return redirect()->route('eradication.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Eradication $eradication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Eradication $eradication)
    {
        $eradication->delete();

        return redirect()->route('eradication.index');
    }
}
