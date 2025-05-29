<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $juego->nombre }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    @include('partials.header')
    <br>
    <br>
    <br>

    <div class="container mt-5">
        <h1 class="mb-4">{{ $juego->nombre }}</h1>

        <div class="row align-items-start">
            <div class="col-md-6 pe-4">
                <img src="{{ asset('fotos/' . $juego->imagen) }}" 
                     alt="{{ __('Image of') }} {{ $juego->nombre }}" 
                     class="img-fluid rounded shadow-sm" />
            </div>
            
            <div class="col-md-6 ps-3">
                <div class="mb-2">
                    <span class="badge bg-primary fs-6">{{ $juego->genero }}</span>
                </div>
                
                <p class="text-justify lead" style="line-height: 1.6;">
                    {!! $juego->descripcion !!}
                </p>
            </div>
        </div> 

        @if($juego->trailer)
        <div class="mt-4">
            <h2 class="mb-3">{{ __('Trailer') }}</h2>
            <div class="ratio ratio-16x9">
                <iframe src="https://www.youtube.com/embed/{{ \Illuminate\Support\Str::after($juego->trailer, 'v=') }}" 
                        allowfullscreen>
                </iframe>
            </div>
        </div>
        @endif

        <div class="mt-4">
            <h3 class="mb-3">{{ __('Prices') }}</h3>
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
                            <td class="align-middle">{{ $precio->plataforma }}</td>
                            <td class="align-middle fw-bold">{{ number_format($precio->precio, 2) }} €</td>
                            <td>
                                <a href="{{ $precio->url_compra }}" 
                                   target="_blank" 
                                   class="btn btn-sm btn-outline-success">
                                    {{ __('Buy') }}
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <p class="text-muted">{{ __('No prices available for this game') }}</p>
            @endif
        </div>
    </div>

    @include('partials.footer')


    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
