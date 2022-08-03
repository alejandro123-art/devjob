<?php

namespace App\Http\Livewire;

use App\Models\salario;
use Livewire\Component;
use App\Models\categoria;

class crear_vacante extends Component
{
   //definiendo los campos a validar con livewire
    public $titulo;
    public $salario;

    protected $rules =
    [
        'titulo' => 'required|string',
        'salario' => 'required'
    ];

    

    public function render()
    {
       
        //importando la base de datos para pasarlo a la vista
        $salarios = salario::all();
        $categoria = categoria::all();

        
        return view('livewire.crear-vacante',
        [
            'salarios' => $salarios,
            'categorias' => $categoria
        ]);
    }
}
