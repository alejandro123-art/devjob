<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MostrarVacante extends Component
{
    //definiendo el modelo de vacante para poderlo pasar a la vista
    public $vacante;

    public function render()
    {
        return view('livewire.mostrar-vacante');
    }
}
