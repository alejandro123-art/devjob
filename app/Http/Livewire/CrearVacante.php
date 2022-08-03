<?php

namespace App\Http\Livewire;

use App\Models\salario;
use Livewire\Component;
use App\Models\categoria;
use App\Models\vacante;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{
    //definiendo los campos a validar con livewire
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    
   

    use WithFileUploads;

    protected $rules =
    [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' =>'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image|max:5000'
    ];
    
    public function CrearVacante()
    {
       $datos= $this->validate();

       //almacenar la imagen
       
       //indicandole el directorio donde lo van a guardar, guardando la imagen, pasandole la ruta de donde esta guardandolo
      $imagen = $this->imagen->store('public/vacantes');
      //replazando la ruta por nada para nada mas tomar el nombre de la imagen y esto se hace poniendo que va a buscar que cosa va a poner en su sustitucion y la ruta de la imagen para hacer el trabajo 
      $datos['imagen'] = str_replace('public/vacantes/','',$imagen);
     

       //crear vacante

       vacante::create
       ([
        //asignandole el valor de datos porque ya estan validados con el rules
        'titulo' => $datos['titulo'],
        'salario_id' => $datos['salario'],
        'categoria_id' => $datos['categoria'],
        'empresa' => $datos['empresa'],
        'ultimo_dia' => $datos['ultimo_dia'],
        'descripcion' => $datos['descripcion'],
        'imagen' => $datos['imagen'],
        'user_id' => auth()->user()->id
       ]);

       //crear mensaje
       session()->flash('mensaje', 'La vacante se a publicado correctamente');
       
       //redireccionar al usuario
       return redirect()->route('vacantes.index');
    }

    public function render()
    {
       //importando la base de datos para pasarlo a la vista
       $salarios = salario::all();
       $categorias = categoria::all();

       
       return view('livewire.crear-vacante',
       [
           'salarios' => $salarios,
           'categorias' => $categorias
       ]);
    }
}
