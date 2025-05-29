<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" /> <!-- establece la codificación de caracteres -->
    <meta name="viewport" content="width=device-width, initial-scale=1" /> <!-- asegura que la página sea responsive -->
    <title>{{ $juego->nombre }}</title> <!-- muestra el nombre del juego como título de la página -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"> <!-- incluye los íconos de Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- incluye el archivo CSS personalizado -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" /> <!-- incluye los íconos de Font Awesome -->

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" /> <!-- incluye el CSS de Bootstrap -->
</head>
<body>
    @include('partials.header') <!-- incluye el header -->
    <br>
    <br>
    <br>

    <div class="container mt-5">
        <h1 class="mb-4">{{ $juego->nombre }}</h1> <!-- muestra el nombre del juego como encabezado principal -->

        <div class="row align-items-start">
            <div class="col-md-6 pe-4">
                <img src="{{ asset('fotos/' . $juego->imagen) }}" 
                     alt="{{ __('Image of') }} {{ $juego->nombre }}" 
                     class="img-fluid rounded shadow-sm" /> <!-- muestra la imagen del juego -->
            </div>
            
            <div class="col-md-6 ps-3">
                <div class="mb-2">
                    <span class="badge bg-primary fs-6">{{ $juego->genero }}</span> <!-- muestra el género del juego como un badge -->
                </div>
                
                <p class="text-justify lead" style="line-height: 1.6;">
                    {!! $juego->descripcion !!} <!-- muestra la descripción del juego -->
                </p>
            </div>
        </div> 

        @if($juego->trailer)
        <div class="mt-4">
            <h2 class="mb-3">{{ __('Trailer') }}</h2> <!-- encabezado para el tráiler -->
            <div class="ratio ratio-16x9">
                <iframe src="https://www.youtube.com/embed/{{ \Illuminate\Support\Str::after($juego->trailer, 'v=') }}" 
                        allowfullscreen> <!-- muestra el tráiler del juego en un iframe -->
                </iframe>
            </div>
        </div>
        @endif

        <div class="mt-4">
            <h3 class="mb-3">{{ __('Prices') }}</h3> <!-- encabezado para los precios -->
            @if($juego->precios->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>{{ __('Platform') }}</th>
                            <th>{{ __('Price') }}</th>
                            <th>{{ __('Link') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($juego->precios as $precio)
                        <tr>
                            <td class="align-middle">{{ $precio->plataforma }}</td> <!-- muestra la plataforma -->
                            <td class="align-middle fw-bold">{{ number_format($precio->precio, 2) }} €</td> <!-- muestra el precio -->
                            <td>
                                <a href="{{ $precio->url_compra }}" 
                                   target="_blank" 
                                   class="btn btn-sm btn-outline-success">
                                    {{ __('Buy') }} <!-- botón para comprar -->
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <p class="text-muted">{{ __('No prices available for this game') }}</p> <!-- mensaje si no hay precios -->
            @endif
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }} <!-- muestra mensaje de éxito -->
        </div>
    @endif

    <div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4>Deja tu review del juego</h4> <!-- encabezado para dejar una reseña -->
        </div>
        <div class="card-body">
            <form action="{{ route('reviews.store') }}" method="POST">
                @csrf

                <input type="hidden" name="id_juego" value="{{ $juego->id }}"> <!-- campo oculto con el ID del juego -->

                <div class="mb-3">
                    <label for="nombre_reviewer" class="form-label">Tu nombre</label>
                    <input type="text" class="form-control" id="nombre_reviewer" name="nombre_reviewer" required> <!-- campo para el nombre del reviewer -->
                </div>

                <div class="mb-3">
                    <label for="nota" class="form-label">Nota (1.0 - 10.0)</label>
                    <input type="number" class="form-control" id="nota" name="nota" step="0.1" min="1" max="10" required> <!-- campo para la nota -->
                </div>

                <div class="mb-3">
                    <label for="comentario" class="form-label">Comentario</label>
                    <textarea class="form-control" id="comentario" name="comentario" rows="3" maxlength="255" required></textarea> <!-- campo para el comentario -->
                </div>

                <button type="submit" class="btn btn-primary">Enviar review</button> <!-- botón para enviar la reseña -->
            </form>
        </div>
    </div>
</div>
<div class="container mt-5">
    <h3 class="mb-4">{{ __('Reviews') }}</h3> <!-- encabezado para las reseñas -->

    @if($reviews->isEmpty())
        <p class="text-muted">{{ __('No reviews yet for this game.') }}</p> <!-- mensaje si no hay reseñas -->
    @else
        @foreach($reviews as $review)
            <div class="card mb-3"> <!-- tarjeta para cada reseña -->
                <div class="card-body">
                    <h5 class="card-title">{{ $review->nombre }}</h5> <!-- nombre del reviewer -->
                    <h6 class="card-subtitle mb-2 text-muted">
                        {{ __('Score') }}: {{ number_format($review->nota, 1) }} / 10 <!-- nota de la reseña -->
                    </h6>
                    <p class="card-text">{{ $review->comentario }}</p> <!-- comentario de la reseña -->
                    <small class="text-muted">{{ $review->created_at->format('d M Y, H:i') }}</small> <!-- fecha de creación de la reseña -->
                </div>
            </div>
        @endforeach
    @endif
</div>

    @include('partials.footer') <!-- incluye el footer -->

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> <!-- incluye el JS de Bootstrap -->
</body>
</html>