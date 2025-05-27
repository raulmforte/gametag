<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- Tus estilos personalizados -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @include('partials.header')

    <div class="container mt-6 todas-noticias">
        <h1 class="mb-4">Noticias</h1>

        <div class="row">
            @forelse($noticias as $noticia)

            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <a href="{{ route('news2_mostrar', ['id' => $noticia->id]) }}"
                        class="text-decoration-none notilinks">
                        @if($noticia->imagen)
                        <img src="{{ asset('fotos/' . $noticia->imagen) }}" class="card-img-top"
                            alt="{{ $noticia->titular }}">
                        @endif

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $noticia->titular }}</h5>
                            @if($noticia->created_at->greaterThan($fechaReferencia))
                            <p>{{ $noticia->created_at }}</p>
                            @endif
                        </div>
                    </a>
                </div>
            </div>

            @empty
            <p class="text-center">No hay noticias disponibles.</p>
            @endforelse
        </div>

        <div class="d-flex justify-content-center">
            {{ $noticias->links() }}
        </div>
    </div>

    @include('partials.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ mix('js/app.js') }}" type="module" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3Z1J6X1Z4cb4VnAqmpAhFlM5Yb5Ud1Et4yBLt+Jx1nVybkXM5ZyY8gMIvM9bwKE" crossorigin="anonymous">
    </script>
</body>

</html>