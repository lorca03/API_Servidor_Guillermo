<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Api extends Controller
{
    public function index($demandantes=[],$demandante=[],$show=[],$delete=[],$put=[])
    {
        $resp=Http::get('http://localhost:8001/api/demandantes');
        $options=$resp->body();
        $options=json_decode($options,true);
        return view('welcome',['demandantes'=>$demandantes,'subirDeman'=>$demandante,'options'=>$options,'show'=>$show,'delete'=>$delete,'put'=>$put]);
    }
    public function demandantes()
    {
        $resp=Http::get('http://localhost:8001/api/demandantes');
        $data=$resp->body();
        $data=json_decode($data,true);
        return $this->index($data,[]);
    }
    public function demandante(Request $request)
    {
        $resp=Http::post('http://localhost:8001/api/demandante',
            [
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'edad'=>$request->input('edad'),
            ]
        );
        $data=$resp->body();
        $data=json_decode($data,true);
        return $this->index([],$data);
    }
    public function show(Request $request)
    {
        $ruta='http://localhost:8001/api/demandante/'.$request->input('demandante');
        $resp=Http::get($ruta);
        $data=$resp->body();
        $data=json_decode($data,true);
        return $this->index([],[],$data);
    }
    public function deleteDemandante(Request $request)
    {
        $ruta='http://localhost:8001/api/demandante/'.$request->input('demandante');
        $resp=Http::delete($ruta);
        $data=$resp->body();
        $data=json_decode($data,true);
        return $this->index([],[],[],$data);
    }
    public function putDemandante(Request $request)
    {
        $ruta='http://localhost:8001/api/demandante/'.$request->input('demandante');
        $cambios=[];
        if ($request->input('name')!=null){
            $cambios['name']=$request->input('name');
        }
        if ($request->input('email')!=null){
            $cambios['email']=$request->input('email');
        }
        if ($request->input('edad')!=null){
            $cambios['edad']=$request->input('edad');
        }
        $resp=Http::put($ruta,$cambios);
        $data=$resp->body();
        $data=json_decode($data,true);
        return $this->index([],[],[],[],$data);
    }
}
