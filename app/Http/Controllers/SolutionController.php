<?php

namespace App\Http\Controllers;

use App\Http\Requests\SolutionStoreRequest;
use App\Http\Requests\SolutionUpdateRequest;
use App\Models\Solution;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $solutions = Solution::all();

        return view('solution.index', compact('solutions'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('solution.create');
    }

    /**
     * @param \App\Http\Requests\SolutionStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SolutionStoreRequest $request)
    {
        $solution = Solution::create($request->validated());

        $request->session()->flash('solution.id', $solution->id);

        return redirect()->route('solution.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Solution $solution
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Solution $solution)
    {
        return view('solution.show', compact('solution'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Solution $solution
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Solution $solution)
    {
        return view('solution.edit', compact('solution'));
    }

    /**
     * @param \App\Http\Requests\SolutionUpdateRequest $request
     * @param \App\Models\Solution $solution
     * @return \Illuminate\Http\Response
     */
    public function update(SolutionUpdateRequest $request, Solution $solution)
    {
        $solution->update($request->validated());

        $request->session()->flash('solution.id', $solution->id);

        return redirect()->route('solution.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Solution $solution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Solution $solution)
    {
        $solution->delete();

        return redirect()->route('solution.index');
    }
}
