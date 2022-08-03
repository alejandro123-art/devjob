<?php

namespace App\Http\Livewire;

use App\Models\categoria;
use App\Models\salario;
use Livewire\Component;

class FiltrarVacantes extends Component
{
    //creando propiedades a la clase
    public $termino;
    public $categoria;
    public $salario;

    public function leer_datos_formulario()
    {
        //enviandole los datos al componente padre poniendo como parametro la el nombre que el padre va a estar escuchando y  coma los parametros a enviar
        $this->emit('terminos_busqueda',$this->termino,$this->categoria,$this->salario);
    }

    public function render()
    { //mandando a llamar a los modelos de salario y categoria
        $salarios = salario::all();
        $categorias = categoria::all();

        return view('livewire.filtrar-vacantes',
        [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
