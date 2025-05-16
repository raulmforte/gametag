<noticias>
    <div class="noticias-titulo">
        <h2 class="fuente-titulo">Noticias</h2>
        <hr class="linea-azul">
    </div>
    <div class="contenedor-noticias">
    <div class="fuente noticias-noticas">
            <a href="{{ route('innoxport') }}" class="text-decoration-none link-noticias">
                <h3>{{ DB::table('noticias')->where('id', 44)->value('titular') }}</h3>

                @php
                    $img = DB::table('imagenes')->where('id', 155)->value('nombre_imagen');
                @endphp

                <img src="{{ asset("fotos/noticias/$img") }}" alt="Imagen de la noticia">
            </a>
        </div>
        <div class="fuente noticias-noticias">
            <a href="{{ route('photovoltaic') }}" class="text-decoration-none link-noticias">
                <h3>{{ DB::table('noticias')->where('id', 43)->value('titular') }}</h3>

                @php
                    $img = DB::table('imagenes')->where('id', 152)->value('nombre_imagen');
                @endphp

                <img src="{{ asset("fotos/noticias/$img") }}" alt="Imagen de la noticia">
            </a>
        </div>
    </div>
</noticias>
