<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeighingStoreRequest;
use App\Http\Requests\WeighingUpdateRequest;
use App\Models\Weighing;
use Illuminate\Http\Request;

class WeighingController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $weighings = Weighing::first();
        //dd($weighings->first());

        return  $weighings; // view('weighing.index', compact('weighings'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('weighing.create');
    }

    /**
     * @param \App\Http\Requests\WeighingStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(WeighingStoreRequest $request)
    {
        $weighing = Weighing::create($request->validated());

        $request->session()->flash('weighing.id', $weighing->id);

        return redirect()->route('weighing.index');
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
    public function edit(Request $request, Weighing $weighing)
    {
        return view('weighing.edit', compact('weighing'));
    }

    /**
     * @param \App\Http\Requests\WeighingUpdateRequest $request
     * @param \App\Models\Weighing $weighing
     * @return \Illuminate\Http\Response
     */
    public function update(WeighingUpdateRequest $request, Weighing $weighing)
    {
        $weighing->update($request->validated());

        $request->session()->flash('weighing.id', $weighing->id);

        return redirect()->route('weighing.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Weighing $weighing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Weighing $weighing)
    {
        $weighing->delete();

        return redirect()->route('weighing.index');
    }
}
