<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LotController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\StatuController;
use App\Http\Controllers\OfficialController;
use App\Http\Controllers\WeighingController;

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

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});
//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});
//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});
//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});
//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});
//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

Route::get('/prueba', function() {
    $exitCode = Artisan::call('enviar:mail');
    return '<h1>Enviado</h1>';
});



Route::get('/', function () {
    return view('auth.login');
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
Route::get('erradicaciones/export', [App\Http\Controllers\EradicationController::class, 'export'])->name('erradicacionesexport');
Route::get('review/export', [App\Http\Controllers\ReviewController::class, 'export'])->name('reviewexport');
Route::resource('inventory', App\Http\Controllers\InventoryController::class);
Route::resource('official', App\Http\Controllers\OfficialController::class);
Route::resource('eradication', App\Http\Controllers\EradicationController::class);
Route::resource('review', App\Http\Controllers\ReviewController::class);
Route::resource('solution', App\Http\Controllers\SolutionController::class);


Route::resource('weighing', App\Http\Controllers\WeighingController::class);
Route::resource('refined', App\Http\Controllers\RefinedController::class);

Route::get('bascula', [App\Http\Controllers\WeighingController::class, 'basculaall'])->name('basculaall');

});









