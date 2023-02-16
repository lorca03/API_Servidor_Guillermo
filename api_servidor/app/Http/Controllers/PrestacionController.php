<?php

namespace App\Http\Controllers;

use App\Models\prestacion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PrestacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prestacion=Prestacion::all();
        return response()->json($prestacion);
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
        $prestacion=new Prestacion();
        $prestacion->name=$request->name;
        $prestacion->edad=$request->cuantia;
        $prestacion->save();
        return response()->json([$prestacion , 'Prestacion guardada correctamente']);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $get=Prestacion::find($id)->get();
        return response()->json([$get,'Se ha encontrado la prestacion']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(prestacion $prestacion): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $prestacion=Prestacion::find($id);
        if (!$prestacion){
            return  response()->json('No se ha encontrado la prestacion', 422);
        }
        $v=Validator::make($request->all(),[
            'name'=>'',
            'cuantia'=>'',
        ]);
        if ($v->fails()){
            return  response()->json(['errors'=>$v->errors()],422);
        }
        $prestacion->update($request->all());
        return response()->json([$prestacion,'Se ha actualizado la prestacion']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $prestacion=Prestacion::find($id)->delete();
        return response()->json([$prestacion,'Se ha eliminado la prestacion']);
    }
}
