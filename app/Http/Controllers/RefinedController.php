<?php

namespace App\Http\Controllers;

use App\Http\Requests\RefinedStoreRequest;
use App\Http\Requests\RefinedUpdateRequest;
use App\Models\Refined;
use App\Exports\RefinedExport;
use Illuminate\Http\Request;
use App\Models\Weighing;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RefinedController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $refineds = Refined::Search($request->nombre)->OrderBy('fechaNeto', 'DESC')->paginate();
        $total = Refined::sum('Kilos_Despacho');
     
        $codigo = Weighing::where('numero','LIKE',"RP%")->OrderBy('fecha', 'DESC')->pluck('numero','numero');
        $user= User::where('id',Auth::id())->pluck('name','id');

      

        return view('refined.index', compact('refineds','codigo','user','total'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('refined.create');
    }

    /**
     * @param \App\Http\Requests\RefinedStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RefinedStoreRequest $request)
    {

        //dd($request->validated());
        $refined = Refined::create($request->all());

        $request->session()->flash('refined.id', $refined->id);

        return redirect()->route('refined.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Refined $refined
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Refined $refined)
    {
        return view('refined.show', compact('refined'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Refined $refined
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Refined $refined)
    {
        return view('refined.edit', compact('refined'));
    }

    /**
     * @param \App\Http\Requests\RefinedUpdateRequest $request
     * @param \App\Models\Refined $refined
     * @return \Illuminate\Http\Response
     */
    public function update(RefinedUpdateRequest $request, $id)
    {
        $refined = Refined::findOrFail($request->id);

        $refined->update($request->all());

        $request->session()->flash('refined.id', $refined->id);

        return redirect()->route('refined.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Refined $refined
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Refined $refined)
    {
        $refined->delete();

        return redirect()->route('refined.index');
    }


  public function export(Request $request) 
    {
        
       
      return \Excel::download(new RefinedExport($request->fecha,$request->fechafinal), 'RefinadoEntregado.xlsx');

    }

         public function refinedall(Request $request,Weighing $weighing)
    {
            
       return Weighing::where('numero',$request->input('numero'))->get();

    }  
}
