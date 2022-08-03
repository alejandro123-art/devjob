  <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
 @php
     $clases= "text-sm text-gray-600 hover:text-gray-900";
 @endphp
 <!--Pasandole los el link por la variable atributos y con merge le paso el estilo-->
    <a {{$attributes->merge(['class' => $clases])}}>
        {{//varible para pasarle el texto que va presentar el link
            $slot }}
    </a>
