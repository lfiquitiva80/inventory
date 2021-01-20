<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfficialStoreRequest;
use App\Http\Requests\OfficialUpdateRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Official;
use Illuminate\Http\Request;
use App\Exports\OfficialExport;

class OfficialController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $officials = Official::Search($request->nombre)->get();

        return view('official.index', compact('officials'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('official.create');
    }

    /**
     * @param \App\Http\Requests\OfficialStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfficialStoreRequest $request)
    {
        $official = Official::create($request->validated());

        $request->session()->flash('official.id', $official->id);

        return redirect()->route('official.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Official $official
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Official $official)
    {
        return view('official.show', compact('official'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Official $official
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Official $official)
    {
        return view('official.edit', compact('official'));
    }

    /**
     * @param \App\Http\Requests\OfficialUpdateRequest $request
     * @param \App\Models\Official $official
     * @return \Illuminate\Http\Response
     */
    public function update(OfficialUpdateRequest $request, Official $official)
    {
        $official->update($request->validated());

        $request->session()->flash('official.id', $official->id);

        return redirect()->route('official.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Official $official
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Official $official)
    {
        $official->delete();

        return redirect()->route('official.index');
    }

    public function export() 
    {
        return Excel::download(new OfficialExport, 'Funcioanrios.xlsx');
    }
}
