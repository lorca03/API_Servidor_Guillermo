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
Route::post('demandantes',[DemandanteController::class,'store']);
Route::get('demandantes/{id}',[DemandanteController::class,'show']);
Route::put('demandantes/{id}',[DemandanteController::class,'update']);


Route::get('prestacion',[PrestacionController::class,'index']);
Route::post('prestacion',[PrestacionController::class,'store']);
Route::get('prestacion/{id}',[PrestacionController::class,'show']);
