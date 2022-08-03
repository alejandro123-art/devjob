<div>
    <!--Insertando el disenio de el buscador-->
      <livewire:filtrar-vacantes />

     <div class="py-12">
        <!--Centrando el con mx-auto-->
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-800 mb-12">Nuestras Vacantes Disponibles</h3>
             
            <!--Contenedor de las vacantes disponibles-->
            <div class="bg-white shadow-sm rounded-lg p-6">
              
                <!--Mostrando las vacantes-->
                @forelse ($vacantes as $vacante )
                    <div class="md:flex md:items-center md:justify-center py-5 divide-y divide-gray-400">
                      
                      <!--Informacion sobre la vacante-->
                      <div class="md:flex-1">

                        <a class="text-3xl font-extrabold text-gray-600" href="{{route('vacantes.show',$vacante->id)}}">{{$vacante->titulo}}</a>
                        <P class="text-base text-gray-600 mb-1">{{$vacante->empresa}}</P>
                        <P class="text-xs font-bold text-gray-600 mb-1">{{$vacante->categoria->categoria}}</P>
                        <P class="text-base text-gray-600 mb-1">{{$vacante->salario->salario}}</P>
                        <p class="font-bold text-xs text-gray-600">Ultimo dia para postularse: <span class="font-normal" >{{$vacante->ultimo_dia->format('d/m/Y')}}</span></p>
                      </div>

                      <!--Enlace de la vacante-->
                      <div class="mt-5 md:mt-0">
                        <a href="{{route('vacantes.show',$vacante->id)}}" class="bg-indigo-500 p-3 text-sm uppercase font-bold text-white rounded-lg block text-center">Ver Vacante</a>
                       
                      </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-600">No hay vacantes en estos momentos</p>
                @endforelse
            </div>
        </div>
     </div>
</div>
