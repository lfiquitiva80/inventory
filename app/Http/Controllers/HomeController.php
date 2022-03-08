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

        $query = DB::select("SELECT F.fincadesc,L.LOTENOMB, L.LOTECODI,
                sum(case when INV.statu_id = '1' then INV.statu_id else 0 end)/ 1 as Viva,
                sum(case when INV.statu_id = '2' then INV.statu_id else 0 end) / 2 as Muerta
        FROM inventories INV 
        INNER JOIN farms F ON F.id= INV.farm_id
        INNER JOIN lots L ON L.id = INV.lot_id
        INNER JOIN status S ON S.id = INV.statu_id
        group by F.fincadesc,L.LOTENOMB,L.LOTECODI
        
        UNION ALL

        SELECT 'TOTAL', '========','========>',
        sum(case when INV.statu_id = '1' then INV.statu_id else 0 end)/ 1 as Viva,
        sum(case when INV.statu_id = '2' then INV.statu_id else 0 end) / 2 as Muerta
        FROM inventories INV 
        INNER JOIN farms F ON F.id= INV.farm_id
        INNER JOIN status S ON S.id = INV.statu_id
        ");

emotify('success', 'You are awesome, your data was successfully created');
       
        return view('home', compact('inventory','query'));
    }
}
