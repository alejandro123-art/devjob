<?php

namespace App\Http\Livewire;

use App\Models\vacante;
use Livewire\Component;

class HomeVacantes extends Component
{
     //creando propiedades a la clase para que se pueda usar dentro de ella
     public $termino;
     public $categoria;
     public $salario;

    //creando una propiedad que espere unos datos que se emitan y manda a llamar el nombre de la funcion del otro componente
    protected $listeners = ['terminos_busqueda' => 'buscar'];
   
    public function buscar($termino, $categoria, $salario)
    {
        //pasando los valores de los parametros de la funcion a la propiedad de la clase
      $this->termino = $termino;
      $this->categoria = $categoria;
      $this->salario = $salario;
     
    }
    public function render()
    {
        //trayendo los datos de las vacantes creadas cuando hayga algo en los criterios
        //$vacantes = vacante::all();
        $vacantes = vacante::when($this->termino,function($query){
                                                                      //filtrando las vacantes segun el valor de la propiedad termino
                                                                      //se busca en el campo titulo que sea como el valor de termino sea que comienze con esa letra o termine con ella
                                                                     $query->where('titulo','LIKE','%' . $this->termino . '%');
                                                                  })

                                                                  //cuando se busca por el criterio de categoria
                                                                  ->when($this->categoria,function($query){
                                                                                                            $query->where('categoria_id',$this->categoria);
                                                                                                          })

                                                                  //cuando se busca por el criterio de termino por la empresa
                                                                  ->when($this->termino,function($query){
                                                                    $query->orWhere('empresa','LIKE','%' .  $this->termino . '%');
                                                                  })

                                                                  //cuando se busca por el criterio de salario
                                                                  ->when($this->salario,function($query){
                                                                                                            $query->where('salario_id',$this->salario);
                                                                                                          })
                                                                  ->paginate('5');

      
        //pasando las vacantes a la vista de home
        return view('livewire.home-vacantes',[
                                                'vacantes' => $vacantes
                                             ]);
    }
}
