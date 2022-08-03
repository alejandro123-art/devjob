<div class="p-10">
   <div class="mb-5">

        <h3 class="font-bold text-3xl text-gray-800 my-3">{{$vacante->titulo}}</h3>


        <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 my-10">
             <p class="font-bold text-sm uppercase text-gray-800 my-3">Empresa: 
                <span class="normal-case font-normal">
                    {{$vacante->empresa}}
                </span>
             </p> 

             <p class="font-bold text-sm uppercase text-gray-800 my-3">Ultimo Dia Para Postularse: 
                <span class="normal-case font-normal">
                    {{$vacante->ultimo_dia->toFormattedDateString()}}
                </span>
             </p> 

             <p class="font-bold text-sm uppercase text-gray-800 my-3">Categoria: 
                <span class="normal-case font-normal">
                    <!--Mostrando la informacion de la categoria por la relacion categoria y el campo-->
                    {{$vacante->categoria->categoria}}
                </span>
             </p> 

             <p class="font-bold text-sm uppercase text-gray-800 my-3">Salario: 
                <span class="normal-case font-normal">
                    {{$vacante->salario->salario}}
                </span>
             </p> 

        </div>
   </div>

   <div class="md:grid grid-cols-6">
    
      <!--Imagen del puesto-->
      <!--C on el span va a indicar cuanto espacio va a ocupar de los que tiene el div padre-->
      <div class="md:col-span-2">
         <!--Apuntando a la carpeta public con asset para que busque desde hai-->
           <img src="{{asset('storage/vacantes/' . $vacante->imagen)}}" alt="{{'Imagen vacante' . $vacante->titulo}}" />
      </div>

      <!--Descripcion del puesto-->
      <div class="md:col-span-4 md:ml-4">
            <h2 class="text-2xl font-bold mb-5">Descripcion del puesto</h2>
            <p>{{$vacante->descripcion}}</p>
      </div>
   </div>
   <!--Mensaje cuando el usuario no esta registrado-->
  @guest
      <div class="mt-5 bg-gray-50 boder border-dashed p-5 text-center">
         <p>Deseas Aplicar a esta vacante? <a href="{{route('register')}}" class="font-bold text-indigo-600">Aplica a esta y otras vacantes</a> </p>
      </div>
  @endguest


@auth

<!--Evaluando por el create si no puede crear para identificar que es programador-->
@cannot('create',App\Models\vacante::class)

  <!--Pasandole el modelo de vacante al livewire-->  
<livewire:postular-vacante :vacante="$vacante" />

@endcannot
   
@endauth

  
   
</div>
