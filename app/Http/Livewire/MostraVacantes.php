<?php

namespace App\Http\Livewire;

use App\Models\vacante;
use Illuminate\Queue\Listener;
use Livewire\Component;

class MostraVacantes extends Component
{
    //esta propiedad es la que va a escuchar cual funcion se va ejecutar
    protected $listeners = ['eliminar_vacante'];

    //mandado a llamar el modelo de vacante para tenerlo de propiedad
    public function eliminar_vacante(vacante $vacante)
    {
        //eliminando la vacante
        $vacante->delete();
    }
    public function render()
    {  $vacante = vacante::where('user_id',auth()->user()->id)->paginate(10);
        return view('livewire.mostra-vacantes',[
            'vacantes' => $vacante
        ]);
    }
}
