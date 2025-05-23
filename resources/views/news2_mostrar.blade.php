

<!DOCTYPE html>
<html>

<head>
    <title>{{ $noticia->nombre }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoYz1H2Fgq5L6bY4QZV9zzTtmI3Uod8GCExl3Og8ifwB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <a href="{{ route('news2') }}" class="btn btn-secondary mb-3">← @lang('extras.volver')</a>
        <a href="{{ route('welcome') }}" class="btn btn-secondary mb-3">← Volver a la pagina principal</a>
        <!-- Volver a noticias -->

        <div class="card">

            <div class="card-body">
                <h1 class="card-title">{{ $noticia->titular }}</h1>
                <p class="card-text">{!! $noticia->descripcion !!}</p>
            </div>
            @if($noticia->imagenes && $noticia->imagenes->count())
            <div class="row">
                @foreach($noticia->imagenes as $imagen)
                <div class="col-md-6 mb-3">
                    <img src="{{ asset('fotos/noticias/' . $imagen->nombre_imagen) }}" class="img-fluid rounded"
                        alt="{{ $noticia->titular }}">
                </div>
                @endforeach
            </div>
            @endif

        </div>

    </div>

    @include('partials.footer')

</body>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ mix('js/app.js') }}" type="module" defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3Z1J6X1Z4cb4VnAqmpAhFlM5Yb5Ud1Et4yBLt+Jx1nVybkXM5ZyY8gMIvM9bwKE" crossorigin="anonymous">
</script>

</html>
