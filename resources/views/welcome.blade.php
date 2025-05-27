<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>GAMETAG</title>
</head>

<body class="bg-image">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    
    @include('partials.header')

    @include('partials.history')

    @include('partials.numbers')

    @include('partials.categories')

    @include('partials.brands')

    <div class="sobre-nosotros d-flex align-items-center justify-content-center" 
     style="height: 300px; background-color: #2c3e50;"> <!-- Ajusta altura y color -->
    <a href="{{ route('sobre_nosotros') }}" class="text-decoration-none text-white">
        <h2 class="fuente-titulo m-0">{{ __('About us') }}</h2>
    </a>
</div>

    <section class="cta-noticia">
        <a href="{{ route('hot_new')}}" class="cta-enlace">
            <div class="cta-contenido">
            <h2 class="cta-titulo">{{ __("Don't miss the news of the moment!") }}</h2>
                <p class="cta-descripcion">{{ __('Click here for more information') }}</p>
            </div>
        </a>
    </section>



    @include('partials.catalogs')


    @include('partials.contact')

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3Z1J6X1Z4cb4VnAqmpAhFlM5Yb5Ud1Et4yBLt+Jx1nVybkXM5ZyY8gMIvM9bwKE" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ mix('js/app.js') }}" type="module" defer></script>
</body>

</html>