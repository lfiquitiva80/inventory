<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LotController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\StatuController;
use App\Http\Controllers\OfficialController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    

Route::resource('farm', App\Http\Controllers\FarmController::class);


Route::resource('lot', App\Http\Controllers\LotController::class);


Route::resource('type', App\Http\Controllers\TypeController::class);


Route::resource('disease', App\Http\Controllers\DiseaseController::class);


Route::resource('statu', App\Http\Controllers\StatuController::class);


Route::get('lotes/export', [LotController::class, 'export'])->name('lotesexport');


Route::get('fincas/export', [FarmController::class, 'export'])->name('fincasexport');


Route::get('enfermedades/export', [DiseaseController::class, 'export'])->name('deseasesexport');


Route::get('tipoerradicaciones/export', [TypeController::class, 'export'])->name('typeexport');


Route::get('estado/export', [StatuController::class, 'export'])->name('estadoexport');


Route::get('estado/export', [StatuController::class, 'export'])->name('estadoexport');


Route::get('inventoryall', [App\Http\Controllers\InventoryController::class, 'inventoryall'])->name('inventoryall');


Route::get('official/export', [OfficialController::class, 'export'])->name('officialexport');


Route::resource('inventory', App\Http\Controllers\InventoryController::class);


Route::resource('official', App\Http\Controllers\OfficialController::class);


Route::resource('eradication', App\Http\Controllers\EradicationController::class);


Route::resource('review', App\Http\Controllers\ReviewController::class);

});

