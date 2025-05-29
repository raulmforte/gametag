<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ __('Games of') }} {{ ucfirst($categoria) }}</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

    @include('partials.header') <!-- incluye el header -->

    <br>
    <br>
    <br>

    <div class="container py-4 mt-5">
        <h1 class="mb-4">{{ __('Games of') }} {{ ucfirst($categoria) }}</h1>
        <div class="row">
            @forelse ($juegos as $juego)
                <div class="col-12 col-sm-6 col-md-3 mb-4">
                    <a href="{{ route('juegos.show', $juego->id) }}" class="text-decoration-none">
                        <div class="card">
                            <img src="{{ asset('fotos/' . $juego->imagen) }}" class="card-img-top" alt="{{ $juego->nombre }}" />
                            <div class="card-body">
                                <h5 class="card-title text-center text-dark">{{ $juego->nombre }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <p class="text-center">{{ __('No games available in this category') }}</p> <!-- mensaje si no hay juegos disponibles -->
            @endforelse
        </div>
    </div>

    @include('partials.footer') <!-- incluye el footer -->

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>