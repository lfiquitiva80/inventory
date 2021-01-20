<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventoryStoreRequest;
use App\Http\Requests\InventoryUpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Inventory;
use App\Models\Farm;
use App\Models\Statu;
use App\Models\User;
use App\Models\Lot;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
        $inventories = Inventory::Search($request->nombre)->orderBy('id', 'DESC')->paginate(10);
        $farm = Farm::pluck('fincadesc','id');
        $lote = Lot::pluck('LOTENOMB','id');
        $statu = Statu::pluck('estado','id');
        $user= User::where('id',Auth::id())->pluck('name','id');

        return view('inventory.index', compact('inventories','farm','lote','statu','user'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('inventory.create');
    }

    /**
     * @param \App\Http\Requests\InventoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(InventoryStoreRequest $request)
    {
        $inventory = Inventory::create($request->validated());

        $request->session()->flash('inventory.id', $inventory->id);

        return redirect()->route('inventory.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Inventory $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Inventory $inventory)
    {
        return view('inventory.show', compact('inventory'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Inventory $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Inventory $inventory)
    {
        return view('inventory.edit', compact('inventory'));
    }

    /**
     * @param \App\Http\Requests\InventoryUpdateRequest $request
     * @param \App\Models\Inventory $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(InventoryUpdateRequest $request, $id)
    {
        $inventory = Inventory::findOrFail($request->id);    

        $inventory->update($request->validated());

        $request->session()->flash('inventory.id', $inventory->id);

        return redirect()->route('inventory.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Inventory $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Inventory $inventory)
    {
        $inventory->delete();

        return redirect()->route('inventory.index');
    }
}
