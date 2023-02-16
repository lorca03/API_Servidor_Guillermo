<?php

namespace App\Http\Controllers;

use App\Models\demandante;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class DemandanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $demadantes = Demandante::all();
        return response()->json($demadantes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $demandante = new Demandante();
        $demandante->name = $request->name;
        $demandante->email = $request->email;
        $demandante->edad = $request->edad;
        $demandante->save();
        return response()->json([$demandante, 'Demandante guardado correctamente']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $get = Demandante::find($id)->first();
        return response()->json([$get, 'Se ha encontrado el demandante']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(demandante $demandante): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $demandante = Demandante::find($id);
        if (!$demandante) {
            return response()->json('No se ha encontrado al demandante', 422);
        }
        $v = Validator::make($request->all(), [
            'name' => '',
            'email' => 'email',
            'edad' => '',
        ]);
        if ($v->fails()) {
            return response()->json(['errors' => $v->errors()], 422);
        }
        $demandante->update($request->all());
        return response()->json([$demandante, 'Se ha actualizado el demandante']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $demandante = Demandante::find($id)->delete();
        return response()->json([$demandante, 'Se ha eliminado el demandante']);
    }

//    public function attach($id)
//    {
//        $get = Demandante::find($id)->first();
//        return response()->json([$get, 'Se ha encontrado el demandante']);
//    }
}
