<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $inventory =  Inventory::all()->take(10);

        $query = DB::select('SELECT F.fincadesc,S.estado, COUNT(I.statu_id) AS plantas FROM inventories I
        INNER JOIN farms F ON F.id= I.farm_id
        INNER JOIN status S ON S.id = I.statu_id
        GROUP BY farm_id, statu_id');

        //dump($query);
       
        return view('home', compact('inventory','query'));
    }
}
