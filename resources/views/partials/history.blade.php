<div class="contenedor" style="background-image: url('{{ asset('fotos/Rectangle-70.jpg') }}');">
    <div class="contenido fuente-titulo"></div>
</div>

<div class="carrusel-historia">
    <h1 class="text-center">{{ __('Recent games') }}</h1>
    <div class="carousel-inner-custom">
        @foreach ($juegos as $juego)
            <div class="carousel-item-custom text-center">
                <img src="{{ asset('fotos/' . $juego->imagen) }}" alt="{{ __('Image of') }} {{ $juego->nombre }}" class="img-fluid rounded shadow-sm">
                <h5 class="text-primary mt-3">{{ $juego->created_at->format('d M Y H:i') }}</h5>
                <p><strong>{{ $juego->nombre }}</strong></p>
            </div>
        @endforeach
    </div>

    <button class="carousel-prev-custom">‹</button>
    <button class="carousel-next-custom">›</button>
</div>
<!-- Bootstrap CSS & JS si no están incluidos aún -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>