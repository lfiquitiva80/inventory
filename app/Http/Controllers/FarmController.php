<?php

namespace App\Http\Controllers;

use App\Http\Requests\FarmStoreRequest;
use App\Http\Requests\FarmUpdateRequest;
use App\Models\Farm;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FarmExport;


class FarmController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $farms = Farm::Search($request->nombre)->get();

        return view('farm.index', compact('farms'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('farm.create');
    }

    /**
     * @param \App\Http\Requests\FarmStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FarmStoreRequest $request)
    {
        $farm = Farm::create($request->validated());

        $request->session()->flash('farm.id', $farm->id);

        return redirect()->route('farm.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Farm $farm
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Farm $farm)
    {
        return view('farm.show', compact('farm'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Farm $farm
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Farm $farm)
    {
        return view('farm.edit', compact('farm'));
    }

    /**
     * @param \App\Http\Requests\FarmUpdateRequest $request
     * @param \App\Models\Farm $farm
     * @return \Illuminate\Http\Response
     */
    public function update(FarmUpdateRequest $request, $id)
    {
        
        $farm = farm::findOrFail($request->id);
        $farm->update($request->validated());

        $request->session()->flash('farm.id', $farm->id);

        return redirect()->route('farm.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Farm $farm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Farm $farm)
    {
        $farm->delete();

        return redirect()->route('farm.index');
    }

    public function export() 
    {
        return Excel::download(new FarmExport, 'Fincas.xlsx');
    }
}
