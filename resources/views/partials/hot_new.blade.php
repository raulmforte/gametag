<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $noticia->titular }} – {{ __('Noticia') }}</title>

    <!-- Estilos -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet"> <!-- incluye el CSS compilado -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"> <!-- íconos de Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> <!-- íconos de Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- incluye el CSS de Bootstrap -->
</head>

<body class="noticia-pag mb-5">
    @include('partials.header') <!-- incluye el header -->

    <article class="gt-article">
        <header class="gt-article-header">
            <h1 class="gt-article-title">{{ $noticia->titular }}</h1> <!-- título de la noticia -->
            <p class="gt-article-date">{{ __('Fecha de publicación') }}: {{ $noticia->created_at->format('d/m/Y') }}</p> <!-- fecha de publicación -->
        </header>

        <section class="gt-article-body">
            <p class="gt-article-lead">
                <strong>{!! strip_tags($noticia->descripcion, '<p><i><ul><strong><em><br>') !!}</strong> <!-- descripción de la noticia -->
            </p>

            @if($noticia->imagen)
                <img src="{{ asset('fotos/' . $noticia->imagen) }}" class="img-fluid rounded shadow-sm" alt="Imagen de la noticia {{ $noticia->titular }}"> <!-- imagen de la noticia -->
            @endif
        </section>

    </article>

    @include('partials.footer') <!-- incluye el footer -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> <!-- incluye el JS de Bootstrap -->
    <script src="{{ mix('js/app.js') }}" type="module" defer></script> <!-- incluye el JS compilado -->
</body>

</html>