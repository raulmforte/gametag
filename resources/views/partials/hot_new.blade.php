<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $juego->nombre }} – Juego</title>

    <!-- Estilos -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="noticia-pag">
    @include('partials.header')

    <article class="gt-article">
        <header class="gt-article-header">
            <h1 class="gt-article-title">{{ $juego->nombre }}</h1>
            <p class="gt-article-date">Género: {{ $juego->genero }}</p>
        </header>

        <section class="gt-article-body">
            <p class="gt-article-lead">
                <strong>{{ strip_tags($juego->descripcion. '<p><i><ul><strong>') }}</strong>
            </p>

            @if($juego->trailer)
                <div class="ratio ratio-16x9 mb-3">
                    <iframe src="{{ $juego->trailer }}" title="Trailer de {{ $juego->nombre }}" allowfullscreen></iframe>
                </div>
            @endif

            @if($juego->imagen)
                <img src="{{ asset('fotos/' . $juego->imagen) }}" class="img-fluid rounded shadow-sm" alt="Imagen del juego {{ $juego->nombre }}">
            @endif
        </section>

        <footer class="gt-article-footer mt-4">
            <span class="gt-article-source-label">Fuente:</span>
            <a class="gt-article-source-link" href="#" onclick="return false;">Base de datos interna</a>
        </footer>
    </article>

    @include('partials.footer')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ mix('js/app.js') }}" type="module" defer></script>
</body>

</html>