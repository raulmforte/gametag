<div id="inicio" class="contenedor" style="background-image: url('{{ asset('fotos/Rectangle-70.jpg') }}');">
    <div class="contenido fuente-titulo"></div>
</div>
<div class="carrusel-historia">
    <h1 class="text-center">Juegos recientes</h1>
    <div class="carousel-inner-custom">
        @foreach ($juegos as $juego)
            <div class="carousel-item-custom text-center">
                <a href="{{ route('juegos.show', $juego->id) }}" class="text-decoration-none text-dark d-block">
                    <img src="{{ asset('fotos/' . $juego->imagen) }}"
                         alt="Imagen de {{ $juego->nombre }}"
                         class="img-fluid rounded shadow-sm"> <!-- imagen del juego -->
                    <h5 class="text-primary mt-3">{{ $juego->nombre }}</h5> <!-- nombre del juego -->
                    <p><strong>{{ \Carbon\Carbon::parse($juego->fecha)->format('d M Y') }}</strong></p> <!-- fecha de publicación -->
                </a>
            </div>
        @endforeach
    </div>

    <button class="carousel-prev-custom">‹</button> <!-- botón para ir al elemento anterior -->
    <button class="carousel-next-custom">›</button> <!-- botón para ir al siguiente elemento -->
</div>