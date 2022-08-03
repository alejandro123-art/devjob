<form class="w-1/2 space-y-5" wire:submit.prevent='CrearVacante'>

    <!-- Titulo -->
    <div class="mt-4">
        <x-label for="titulo" :value="__('Titulo')" />

        <x-input id="titulo" class="block mt-1 w-full"
                        type="text"
                        wire:model="titulo"
                        value="{{old('titulo')}}"
                        placeholder="Introduce el Titulo de la vacante" />

         <!--Cuando hay un error en este campo-->
        @error('titulo')
          <!--Pasando el mensaje de error al livewire y el mensaje una variable llamada $message-->
           <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

     <!-- Salario -->
     <div class="mt-4">
        <x-label for="salario" :value="__('Salario Mensual')" />

        <select id="salario" wire:model="salario" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
            <option value=''>----------Selecciona un salario------------</option>

            @foreach ($salarios as $salario)

            <option value='{{$salario->id}}'>{{$salario->salario}}</option>
                
            @endforeach
           
               
           </select>

              <!--Cuando hay un error en este campo-->
        @error('salario')
        <!--Pasando el mensaje de error al livewire y el mensaje una variable llamada $message-->
         <livewire:mostrar-alerta :message="$message"/>
       @enderror
    </div>

    <!-- Salario -->
    <div class="mt-4">
        <x-label for="categoria" :value="__('Categoria')" />

        <select id="categoria" wire:model="categoria" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
            <option value=''>----------Selecciona una Categoria------------</option>
            
            @foreach ($categorias as $categoria)

            <option value='{{$categoria->id}}'>{{$categoria->categoria}}</option>
                
            @endforeach
            
               
        </select>

           <!--Cuando hay un error en este campo-->
           @error('categoria')
           <!--Pasando el mensaje de error al livewire y el mensaje una variable llamada $message-->
            <livewire:mostrar-alerta :message="$message"/>
           @enderror

    </div>

     <!-- Empresa -->
     <div class="mt-4">
        <x-label for="empresa" :value="__('Empresa')" />

        <x-input id="empresa" class="block mt-1 w-full"
                        type="text"
                        wire:model="empresa"
                        value="{{old('empresa')}}"
                        placeholder="Introduce el Nombre de la Empresa ej: Netflix, Uber" />
        
         <!--Cuando hay un error en este campo-->
         @error('empresa')
         <!--Pasando el mensaje de error al livewire y el mensaje una variable llamada $message-->
          <livewire:mostrar-alerta :message="$message"/>
         @enderror

    </div>

     <!-- Ultimo Dia Para Postularse -->
     <div class="mt-4">
        <x-label for="ultimo_dia" :value="__('Ultimo Dia Para Postularse')" />

        <x-input id="ultimo_dia" class="block mt-1 w-full"
                        type="date"
                        wire:model="ultimo_dia"
                        value="{{old('ultimo_dia')}}" />

         <!--Cuando hay un error en este campo-->
         @error('ultimo_dia')
         <!--Pasando el mensaje de error al livewire y el mensaje una variable llamada $message-->
          <livewire:mostrar-alerta :message="$message"/>
         @enderror

    </div>

     <!-- Descripcion del Puesto -->
     <div class="mt-4">
        <x-label for="descripcion" :value="__('Descripcion')" />

        <textarea wire:model="descripcion" id="descripcion" placeholder="Descripcion del Puesto General" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full h-32"></textarea>

         <!--Cuando hay un error en este campo-->
         @error('descripcion')
         <!--Pasando el mensaje de error al livewire y el mensaje una variable llamada $message-->
          <livewire:mostrar-alerta :message="$message"/>
         @enderror
    </div>

      <!-- Imagen -->
      <div class="mt-4">
        <x-label for="imagen" :value="__('Imagen')" />

        <x-input id="imagen" class="block mt-1 w-full"
                        type="file"
                        wire:model="imagen" 
                        accept="image/*"
                        />
        <!--seccion para desplegar un preview de la imagen seleccionada-->
         <div>
           <!--evaluando si la variable de imagen tiene contenido-->
            @if ($imagen)
                Imagen: 
                <!--Imagen-temporaryUrl crea una url temporal para mostrar la imagen como preview-->
                <img src="{{$imagen->temporaryUrl()}}" class="w-64"/>
            @endif

         </div>

         <!--Cuando hay un error en este campo-->
         @error('imagen')
         <!--Pasando el mensaje de error al livewire y el mensaje una variable llamada $message-->
          <livewire:mostrar-alerta :message="$message"/>
         @enderror

     </div>

    <x-button>Crear Vacante</x-button>


</form>
