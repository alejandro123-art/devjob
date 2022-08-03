<?php

namespace App\Http\Livewire;

use App\Models\salario;
use App\Models\vacante;
use Livewire\Component;
use App\Models\categoria;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class EditarVacante extends Component
{
    //instancandome el name del objeto para saignarle el dato
    public $vacante_id;
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    public $imagen_nueva;

//linea de codigo para subir archivos
    use WithFileUploads;

    protected $rules =
    [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' =>'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen_nueva' => 'nullable|image|max:5000'
        
    ];



    //funcion para llenar los campos de el formulario del registro seleccionado
    public function mount(vacante $vacante)
    { 
       $this->vacante_id = $vacante->id;
       $this->titulo = $vacante->titulo;
       $this->salario = $vacante->salario_id;
       $this->categoria = $vacante->categoria_id;
       $this->empresa = $vacante->empresa;
       $this->ultimo_dia = Carbon::parse($vacante->ultimo_dia)->format('Y-m-d');
       $this->descripcion = $vacante->descripcion;
       $this->imagen = $vacante->imagen;
    }

    public function editar_vacante()
    {
        //los datos validados por rules
        $datos = $this->validate();

        //si hay una nueva imagen
        if($this->imagen_nueva)
        {
            //guardando la imagen nueva en la pc
           $imagen = $this->imagen_nueva->store('public/vacantes');
           //replazando la ruta por nada para nada mas tomar el nombre de la imagen y esto se hace poniendo que va a buscar que cosa va a poner en su sustitucion y la ruta de la imagen para hacer el trabajo 
           $datos['imagen'] = str_replace('public/vacantes/','',$imagen);
        }

        //encontrar vacantes a editar
         $vacante = vacante::find($this->vacante_id);

        //asignar valores al modelo vacante

        $vacante->titulo = $datos['titulo'];
        $vacante->salario_id = $datos['salario'];
        $vacante->categoria_id = $datos['categoria'];
        $vacante->empresa = $datos['empresa'];
        $vacante->ultimo_dia = $datos['ultimo_dia'];
        $vacante->descripcion = $datos['descripcion'];
        //verifica si en los nuevos datos hay algo o si no sigue con el mismo registro
        $vacante->imagen = $datos['imagen'] ?? $vacante->imagen;

        //guardar valores
         $vacante->save();

        //redireccionar con mensaje
        session()->flash('mensaje','La vacante ha sido modificada');
        return redirect()->route('vacantes.index');
    }

    public function render()
    {
        //importando la base de datos para pasarlo a la vista
       $salarios = salario::all();
       $categorias = categoria::all();

        return view('livewire.editar-vacante',
        [
           'salarios' => $salarios,
           'categorias' => $categorias
        ]);
    }
}
