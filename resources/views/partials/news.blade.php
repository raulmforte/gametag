<noticias>
    <div class="noticias-titulo">
        <h2 class="fuente-titulo">{{ __('News') }}</h2>
        <hr class="linea-azul"> <!-- línea decorativa -->
    </div>
    <div class="contenedor-noticias">
        <div class="fuente noticias-noticas">
            <a href="{{ route('innoxport') }}" class="text-decoration-none link-noticias">
                <h3>{{ DB::table('noticias')->where('id', 44)->value('titular') }}</h3> <!-- obtiene el titular de la noticia -->

                @php
                    $img = DB::table('imagenes')->where('id', 155)->value('nombre_imagen'); // obtiene el nombre de la imagen
                @endphp

                <img src="{{ asset("fotos/noticias/$img") }}" alt="Imagen de la noticia"> <!-- muestra la imagen -->
            </a>
        </div>
        <div class="fuente noticias-noticias">
            <a href="{{ route('photovoltaic') }}" class="text-decoration-none link-noticias">
                <h3>{{ DB::table('noticias')->where('id', 43)->value('titular') }}</h3> <!-- obtiene el titular de la noticia -->
               
                @php
                    $img = DB::table('imagenes')->where('id', 152)->value('nombre_imagen'); // obtiene el nombre de la imagen
                @endphp

                <img src="{{ asset("fotos/noticias/$img") }}" alt="Imagen de la noticia"> <!-- muestra la imagen -->
            </a>
        </div>
    </div>
</noticias>