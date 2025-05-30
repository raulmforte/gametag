<noticias>
    <style>
   .contenedor-noticias {
  display: flex;
  overflow-x: auto;
  scroll-snap-type: x mandatory;
  -webkit-overflow-scrolling: touch;
  gap: 1rem;
  padding-bottom: 1rem;
}

.noticias-noticas {
  flex: 0 0 80%; /* ancho para móvil (se ve una y parte de la siguiente) */
  scroll-snap-align: start;
  border: 1px solid #ddd;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  background: white;
  padding: 1rem;
  box-sizing: border-box;
}

.noticias-noticas h3 {
  font-size: 1.2rem;
  margin-bottom: 0.8rem;
  color: #333;
}

.noticias-noticas img {
  width: 100%;
  height: auto;
  border-radius: 6px;
  object-fit: cover;
}

/* En pantallas más grandes */
@media (min-width: 768px) {
  .contenedor-noticias {
    overflow-x: visible;
    scroll-snap-type: none;
    justify-content: center;
  }
  .noticias-noticas {
    flex: 0 0 40%; /* ancho para desktop (2 noticias lado a lado) */
  }
}


    </style>

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
        <div class="fuente noticias-noticas">
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