<?php

namespace App\Http\Controllers;

use App\Models\Procedencia;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class ProcedenciaController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $procedencias = Procedencia::Search($request->nombre)->get();

        

        return view('procedencia.index', compact('procedencias'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('procedencia.create');
    }

    /**
     * @param \App\Http\Requests\procedenciaStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $procedencia = Procedencia::create($request->all());

        $request->session()->flash('procedencia.id', $procedencia->id);

        return redirect()->route('procedencia.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\procedencia $procedencia
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Procedencia $procedencia)
    {
        return view('procedencia.show', compact('procedencia'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\procedencia $procedencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Procedencia $procedencia)
    {
        return view('procedencia.edit', compact('procedencia'));
    }

    /**
     * @param \App\Http\Requests\procedenciaUpdateRequest $request
     * @param \App\Models\procedencia $procedencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $procedencia = Procedencia::findOrFail($request->id);
        $procedencia->update($request->all());

        $request->session()->flash('procedencia.id', $procedencia->id);

        return redirect()->route('procedencia.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\procedencia $procedencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Procedencia $procedencia)
    {
        $procedencia->delete();

        return redirect()->route('procedencia.index');
    }


}
