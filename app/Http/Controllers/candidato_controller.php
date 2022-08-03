<?php

namespace App\Http\Controllers;

use App\Models\candidato;
use App\Models\vacante;
use Illuminate\Http\Request;

class candidato_controller extends Controller
{
   
    public function index(vacante $vacante)
    {
        //
        return view('candidatos.index',[
            'vacante' => $vacante
        ]);
    }
   
}
