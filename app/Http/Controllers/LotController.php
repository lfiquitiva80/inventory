<?php

namespace App\Http\Controllers;

use App\Http\Requests\LotStoreRequest;
use App\Http\Requests\LotUpdateRequest;
use App\Models\Lot;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LotExport;

class LotController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
        $lots = Lot::Search($request->nombre)->orderBy('LOTENOMB', 'asc')->paginate(10);

        return view('lot.index', compact('lots'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('lot.create');
    }

    /**
     * @param \App\Http\Requests\LotStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(LotStoreRequest $request)
    {
        $lot = Lot::create($request->validated());

        $request->session()->flash('lot.id', $lot->id);

        return redirect()->route('lot.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Lot $lot
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Lot $lot)
    {
        return view('lot.show', compact('lot'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Lot $lot
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Lot $lot)
    {
        return view('lot.edit', compact('lot'));
    }

    /**
     * @param \App\Http\Requests\LotUpdateRequest $request
     * @param \App\Models\Lot $lot
     * @return \Illuminate\Http\Response
     */
    public function update(LotUpdateRequest $request, $id)
    {
        $lot = lot::findOrFail($request->id);

        $lot->update($request->validated());

        $request->session()->flash('lot.id', $lot->id);

        return redirect()->route('lot.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Lot $lot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Lot $lot)
    {
        $lot->delete();

        return redirect()->route('lot.index');
    }

      public function export() 
    {
        return Excel::download(new LotExport, 'lotes.xlsx');
    }
}
