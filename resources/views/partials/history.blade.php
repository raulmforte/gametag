<div id="inicio" class="contenedor" style="background-image: url('{{ asset('fotos/Rectangle-70.jpg') }}');">
    <div class="contenido fuente-titulo"></div>
</div>
<div class="carrusel-historia">
    <h1 class="text-center">{{ __('Recent games') }}</h1>
    <div class="carousel-inner-custom">
        @foreach ($juegos as $juego)
            <div class="carousel-item-custom text-center">
                <a href="{{ route('juegos.show', $juego->id) }}" class="text-decoration-none text-dark d-block">
                    <img src="{{ asset('fotos/' . $juego->imagen) }}"
                         alt="{{ __('Image of') }} {{ $juego->nombre }}"
                         class="img-fluid rounded shadow-sm">
                    <h5 class="text-primary mt-3">{{ $juego->nombre }}</h5>
                    <p><strong>{{ \Carbon\Carbon::parse($juego->fecha)->format('d M Y') }}</strong></p>
                </a>
            </div>
        @endforeach
    </div>

    <button class="carousel-prev-custom">‹</button>
    <button class="carousel-next-custom">›</button>
</div>
