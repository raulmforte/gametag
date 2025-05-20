<!DOCTYPE html>
<html lang="en">

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

        
    @include('partials.header')

    @include('partials.history')

    @include('partials.numbers')

    @include('partials.categories')

    @include('partials.brands')

    <div class="sobre-nosotros">
        <a href="{{ route('sobre_nosotros') }}" class="text-decoration-none">
            <div class="container-fluid text-white text-center py-5">
                <h2 class="fuente-titulo">Sobre Nosotros</h2>
            </div>
        </a>
    </div>

    <section class="cta-noticia">
        <a href="{{ route('hot_new')}}" class="cta-enlace">
            <div class="cta-contenido">
                <h2 class="cta-titulo">¡No te pierdas la noticia más polémica del momento!</h2>
                <p class="cta-descripcion">"Doom: The Dark Ages" llega incompleto: ¿el fin del formato físico?</p>
            </div>
        </a>
    </section>


    <div class="pdfs">
        @include('partials.catalogs')

        @include('partials.magazines')
    </div>

    @include('partials.contact')

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3Z1J6X1Z4cb4VnAqmpAhFlM5Yb5Ud1Et4yBLt+Jx1nVybkXM5ZyY8gMIvM9bwKE" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ mix('js/app.js') }}" type="module" defer></script>
</body>

</html>