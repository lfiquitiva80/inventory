<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatuStoreRequest;
use App\Http\Requests\StatuUpdateRequest;
use App\Models\Statu;
use App\Status;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StatuExport;

class StatuController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = Statu::Search($request->nombre)->get();

        return view('statu.index', compact('status'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('statu.create');
    }

    /**
     * @param \App\Http\Requests\StatuStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatuStoreRequest $request)
    {
        $statu = Statu::create($request->validated());

        $request->session()->flash('statu.id', $statu->id);

        return redirect()->route('statu.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Statu $statu
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Statu $statu)
    {
        return view('statu.show', compact('statu'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Statu $statu
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Statu $statu)
    {
        return view('statu.edit', compact('statu'));
    }

    /**
     * @param \App\Http\Requests\StatuUpdateRequest $request
     * @param \App\Models\Statu $statu
     * @return \Illuminate\Http\Response
     */
    public function update(StatuUpdateRequest $request, $id)
    {
        $statu = Statu::findOrFail($request->id);    

        $statu->update($request->validated());

        $request->session()->flash('statu.id', $statu->id);

        return redirect()->route('statu.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Statu $statu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Statu $statu)
    {
        $statu->delete();

        return redirect()->route('statu.index');
    }

    public function export() 
    {
        return Excel::download(new StatuExport, 'Estados.xlsx');
    }



}
