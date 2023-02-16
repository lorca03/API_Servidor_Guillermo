<?php

use App\Http\Controllers\DemandanteController;
use App\Http\Controllers\PrestacionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('demandantes',[DemandanteController::class,'index']);
Route::post('demandante',[DemandanteController::class,'store']);
Route::get('demandante/{id}',[DemandanteController::class,'show']);
Route::put('demandante/{id}',[DemandanteController::class,'update']);
Route::delete('demandante/{id}',[DemandanteController::class,'destroy']);

Route::get('prestaciones',[PrestacionController::class,'index']);
Route::post('prestacion',[PrestacionController::class,'store']);
Route::get('prestacion/{id}',[PrestacionController::class,'show']);
Route::put('prestacion/{id}',[PrestacionController::class,'update']);
Route::delete('prestacion/{id}',[PrestacionController::class,'destroy']);

Route::post('demandantes/prestaciones',[PrestacionController::class,'update']);
