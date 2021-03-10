<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiseaseStoreRequest;
use App\Http\Requests\DiseaseUpdateRequest;
use App\Models\Disease;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DiseaseExport;

class DiseaseController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $diseases = Disease::all();

        return view('disease.index', compact('diseases'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('disease.create');
    }

    /**
     * @param \App\Http\Requests\DiseaseStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiseaseStoreRequest $request)
    {
        $disease = Disease::create($request->validated());

        $request->session()->flash('disease.id', $disease->id);

        return redirect()->route('disease.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Disease $disease
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Disease $disease)
    {
        return view('disease.show', compact('disease'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Disease $disease
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Disease $disease)
    {
        return view('disease.edit', compact('disease'));
    }

    /**
     * @param \App\Http\Requests\DiseaseUpdateRequest $request
     * @param \App\Models\Disease $disease
     * @return \Illuminate\Http\Response
     */
    public function update(DiseaseUpdateRequest $request, $id)
    {
        
        
        $disease = Disease::findOrFail($request->id);

        $disease->update($request->validated());

        $request->session()->flash('disease.id', $disease->id);

        return redirect()->route('disease.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Disease $disease
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Disease $disease)
    {
        $disease->delete();

        return redirect()->route('disease.index');
    }

    public function export() 
    {
        return Excel::download(new DiseaseExport, 'Enfermedades.xlsx');
    }
}
