<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewStoreRequest;
use App\Http\Requests\ReviewUpdateRequest;
use App\Models\Review;
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
use App\Models\Solution;
use App\Exports\reviewerradicacionesExport;
use DB;

class ReviewController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $reviews = Review::Search($request->nombre)->orderBy('id', 'DESC')->paginate(10);


        $farm = Farm::pluck('fincadesc','id');
        $lote = Lot::select(DB::raw("CONCAT(LOTECODI,' ',LOTENOMB) AS name"),'id')->pluck('name','id');
        $statu = Statu::pluck('estado','id');
        $disease = Disease::pluck('enfermedad','id');
        $solution = Solution::pluck('title','id');
        $type = Type::pluck('tipo','id');
        $official = Official::pluck('nombrecompleto','id');
        $inventory = Inventory::pluck('id','id');
        $user= User::where('id',Auth::id())->pluck('name','id');

        return view('review.index', compact('reviews','farm','lote','statu','user','disease','type','official','inventory','solution'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('review.create');
    }

    /**
     * @param \App\Http\Requests\ReviewStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewStoreRequest $request)
    {
        $review = Review::create($request->validated());

        $request->session()->flash('review.id', $review->id);

        return redirect()->route('review.index')->with('info','Se creo correctamente!');;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Review $review
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Review $review)
    {
        return view('review.show', compact('review'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Review $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Review $review)
    {
        return view('review.edit', compact('review'));
    }

    /**
     * @param \App\Http\Requests\ReviewUpdateRequest $request
     * @param \App\Models\Review $review
     * @return \Illuminate\Http\Response
     */
    public function update(ReviewUpdateRequest $request, $id)
    {
        
        $review = Review::findOrFail($request->id);

        $review->update($request->validated());

        $request->session()->flash('review.id', $review->id);

        return redirect()->route('review.index')->with('success','Se actualizó correctamente!');;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Review $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Review $review)
    {
        $review->delete();

        return redirect()->route('review.index')->with('error','Se elimino correctamente!');;
    }


        public function export(Request $request) 
    {
        

        return new reviewerradicacionesExport($request->fecha, $request->fechafinal);
        // Excel::download(new OfficialExport, 'Funcioanrios.xlsx');
    }
}
