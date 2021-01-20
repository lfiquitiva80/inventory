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
        $lote = Lot::pluck('LOTENOMB','id');
        $statu = Statu::pluck('estado','id');
        $disease = Disease::pluck('enfermedad','id');
        $type = Type::pluck('tipo','id');
        $official = Official::pluck('nombrecompleto','id');
        $inventory = Inventory::pluck('id','id');
        $user= User::where('id',Auth::id())->pluck('name','id');

        return view('review.index', compact('reviews','farm','lote','statu','user','disease','type','official','inventory'));
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

        return redirect()->route('review.index');
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

        return redirect()->route('review.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Review $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Review $review)
    {
        $review->delete();

        return redirect()->route('review.index');
    }
}
