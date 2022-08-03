<?php

namespace App\Http\Livewire;

use App\Models\vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{ 
    //se necesita para guardar archivos
    use WithFileUploads;
    
    
    //propiedad para poder aplicar la validacion
    public $cv;
    public $vacante; // propiedad de vacante

    protected $rules = [ //el mimes sive para indicarle el tipo de archivo que va admitir
                            'cv' => 'required|mimes:pdf'
                       ];

    public function mount(vacante $vacante)
    {
      //asignadole el valor de el modelo vacante a la propiedad
      $this->vacante = $vacante;
    }

    public function postularme()
    {
     
      //mandando a llamar las reglas de validacion del formulario
        $datos = $this->validate();
      //almacenando el cv en la pc

     //indicandole el directorio donde lo van a guardar, guardando la imagen, pasandole la ruta de donde esta guardandolo
      $cv = $this->cv->store('public/cv');
      //replazando la ruta por nada para nada mas tomar el nombre de la imagen y esto se hace poniendo que va a buscar que cosa va a poner en su sustitucion y la ruta de la imagen para hacer el trabajo 
      $datos['cv'] = str_replace('public/cv/','',$cv); 

      //crear candidato a la vacante
      $this->vacante->candidatos()->create([
                                            'user_id' => auth()->user()->id,
                                            'cv' => $datos['cv'],
                                            
                                         ]);

      //creando un mensaje de que se postulo a la vacante
      session()->flash('mensaje','Se envio correctamente tus datos mucha suerte');

      //enviando una notificacion al reclutador de que se han postulado a su vacante
      //pasandole atributos a la notificacion nuevo candidato
      $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id));

      //retornando el usuario
      return redirect()->back();

    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
