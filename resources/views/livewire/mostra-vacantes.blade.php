
<div>
 <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">

    

    @forelse ($vacantes as $vacante)
      <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center ">

          <!--Nombre de la vacante-->
          <div class="leading-10" class="text-xl font-bold">
             <a href="{{route('vacantes.show',$vacante->id)}}">{{$vacante->titulo}}</a>
              
             <!--Nombre de la empresa-->
              <p class="text-sm text-gray-600 font-bold">{{$vacante->empresa}}</p>
              <p class="text-sm text-gray-500">Ultimo Dia para Aplicar: {{$vacante->ultimo_dia->format('d/m/Y') }}</p>
          </div>

        

         <div class="flex flex-col items-stretch gap-3  md:mt-0 md:flex-row ">

            <a href="{{route('candidatos.index',$vacante)}}" class="bg-slate-800 px-4 py-2 rounded-lg text-white text-xs font-bold uppercase text-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block text-center" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>{{$vacante->candidatos->count()}} Candidatos</a>

            <a href="{{route('vacantes.edit',$vacante->id)}}" class="bg-blue-800 px-4 py-2 rounded-lg text-white text-xs font-bold uppercase text-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block text-center" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
              </svg>Editar</a>

            <!--Pasandole vacante->id como parametro a la funcion prueba-->
            <button wire:click="$emit('mostrar_alerta',{{$vacante->id}})" class="bg-red-600 px-4 py-2 rounded-lg text-white text-xs font-bold uppercase text-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block " viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
              </svg>Eliminar</button>

           </div>
       </div>

    @empty
        <p class="p-3 text-sm text-center text-gray-600">No Hay vacantes que mostrar</p>
   

       
    @endforelse
    
 
  </div>

  <div class="mt-10">
    {{$vacantes->links()}}
  </div>

</div>

<!--Anadiendo el codigo para el app-->
@push('scripts')
 
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



 <!--la alerta de sweetalert-->
 <script>
  //aplicando la funcion desde javascript cuando manda a llamar la funcion
      Livewire.on('mostrar_alerta',($vacante_id) => {
                                                 Swal.fire({
                                                              title: 'Are you sure?',
                                                              text: "You won't be able to revert this!",
                                                              icon: 'warning',
                                                              showCancelButton: true,
                                                              confirmButtonColor: '#3085d6',
                                                              cancelButtonColor: '#d33',
                                                              confirmButtonText: 'Yes, delete it!'
                                                            }).then((result) => {
                                                                                  if (result.isConfirmed) {
                                                                                                            //mandando a llamar la funcion para eliminar la vacante desde MostrarVacantes y pasandole $vacante_id de la propiedad de esta funcion 
                                                                                                            Livewire.emit('eliminar_vacante',$vacante_id);
                                                                                                          
                                                                                                            //alerta despues que se elimina la vacante
                                                                                                            Swal.fire(
                                                                                                                        'Se a ha eliminado la vacante!',
                                                                                                                        'La vacante seleccionada ha sido eliminada.',
                                                                                                                        'success'
                                                                                                                       )
                                                                                                           }
                                                                                 })

                                            });
      
 

 </script>
  
@endpush