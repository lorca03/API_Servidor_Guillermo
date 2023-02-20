<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Api extends Controller
{
    public function index($demandantes=[],$demandante=[])
    {
        return view('welcome',['demandantes'=>$demandantes,'subirDeman'=>$demandante]);
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
}
