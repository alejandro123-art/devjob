<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
   <h2 class="text-center text-2xl font-bold my-4"> Postularme para esta vacante</h2>
   
   @if (session()->has('mensaje'))
   
   <!--creando el contenedor del mensaje-->
         <!--creando el contenedor del mensaje-->
      <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 rounded-lg">
         {{session('mensaje')}}
       </div>  

   @else
       <!--wire submit para indicarle que envie los datos por livewire a la funcion postularme-->
   <form class="w-96" wire:submit.prevent='postularme'>

      <div class="mb-4">
         <x-label for="cv" value="__('Curriculum o Hoja de vida PDF')" />
         <x-input id="cv" type="file" accept=".pdf" wire:model='cv' class="block mt-1 w-full"  />
      </div>

      @error('cv')
         <livewire:mostrar-alerta :message="$message">
      @enderror

      <x-button class="my-5">Postularme</x-button>

   </form>

   @endif

   

  
</div>
