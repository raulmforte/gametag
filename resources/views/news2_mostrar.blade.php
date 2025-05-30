<!DOCTYPE html>
<html>

<head>
    <title>{{ $noticia->nombre }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoYz1H2Fgq5L6bY4QZV9zzTtmI3Uod8GCExl3Og8ifwB" crossorigin="anonymous"> <!-- incluye Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"> <!-- íconos de Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- incluye el CSS personalizado -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet"> <!-- incluye el CSS compilado -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- incluye otra versión de Bootstrap CSS -->
</head>

<body>
    <div class="container mt-5">
        <a href="{{ route('news2') }}" class="btn btn-secondary mb-3">← Volver a noticias</a> <!-- botón para volver a noticias -->
        <a href="{{ route('welcome') }}" class="btn btn-secondary mb-3">← Volver a la pagina principal</a> <!-- botón para volver a la página principal -->

        <div class="card">
            <div class="card-body">
                <h1 class="card-title">{{ $noticia->titular }}</h1> <!-- título de la noticia -->
                <p class="card-text">{!! $noticia->descripcion !!}</p> <!-- descripción de la noticia -->
            </div>
            @if($noticia->imagen)
            <div class="text-center my-4">
                <img src="{{ asset('fotos/' . $noticia->imagen) }}" class="img-fluid rounded shadow"
                    alt="Imagen de la categoría {{ $noticia->titular }}" style="max-height: 500px; object-fit: cover;"> <!-- imagen de la noticia -->
            </div>
            @endif
        </div>
    </div>

    @include('partials.footer') <!-- incluye el footer -->

</body>
<script src="{{ asset('js/app.js') }}"></script> <!-- incluye el JS personalizado -->
<script src="{{ mix('js/app.js') }}" type="module" defer></script> <!-- incluye el JS compilado -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3Z1J6X1Z4cb4VnAqmpAhFlM5Yb5Ud1Et4yBLt+Jx1nVybkXM5ZyY8gMIvM9bwKE" crossorigin="anonymous">
</script> <!-- incluye Bootstrap JS -->
</html>