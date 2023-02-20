<?php

use App\Http\Controllers\Api;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Api::class,'index']);
Route::get('/demandantes', [Api::class,'demandantes'])->name('demandantes');
Route::post('/demandante', [Api::class,'demandante'])->name('añadir.demandante');
Route::post('/buscar_demandante', [Api::class,'show'])->name('buscar.demandante');
Route::post('/eliminar_demandante', [Api::class,'deleteDemandante'])->name('delete.demandante');
Route::post('/put_demandante', [Api::class,'putDemandante'])->name('put.demandante');
