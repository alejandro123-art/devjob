<?php

namespace App\Http\Controllers;

use App\Models\vacante;
use Illuminate\Http\Request;

class vacante_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny',vacante::class);
        return view('vacantes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //aplicando el policy de que no se puede acceder por roles que no sean de reclutador o id = 2
        $this->authorize('create',vacante::class);
        return view('vacantes.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(vacante $vacante)
    { 
        //returnando la vista de el index junto con el modelo de vacante para poder utilizarlo
        return view('vacantes.show',[
            'vacante' => $vacante
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(vacante $vacante)
    {
          //aplicando las politicas de VacantePolicy
          $this->authorize('update',$vacante);

        //returnando la vista para visualizarlo
        return view ('vacantes.edit',
        [
            //pasandole el modelo de vacante a la vista
           'vacante' => $vacante
        ]);
    }

   
}
