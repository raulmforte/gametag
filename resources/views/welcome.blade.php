<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8"> <!-- establece la codificación de caracteres -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- asegura que la página sea responsive -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet"> <!-- incluye el CSS compilado -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"> <!-- íconos de Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- incluye el CSS personalizado -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> <!-- íconos de Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" /> <!-- incluye Bootstrap CSS -->
    <title>GAMETAG</title> <!-- título de la página -->
</head>

<body class="bg-image">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }} <!-- muestra mensaje de éxito si existe -->
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }} <!-- muestra mensaje de error si existe -->
        </div>
    @endif
    
    @include('partials.header') <!-- incluye el header -->

    @include('partials.history') <!-- incluye la sección de historia -->

    @include('partials.numbers') <!-- incluye la sección de números -->

    @include('partials.categories') <!-- incluye la sección de categorías -->

    @include('partials.brands') <!-- incluye la sección de marcas -->

    <div class="sobre-nosotros d-flex align-items-center justify-content-center" 
     style="height: 300px; background-color: #2c3e50;"> <!-- Ajusta altura y color -->
    <a href="{{ route('sobre_nosotros') }}" class="text-decoration-none text-white">
        <h2 class="fuente-titulo m-0">Sobre nosotros</h2> <!-- enlace a la sección "Sobre nosotros" -->
    </a>
</div>

    <section class="cta-noticia">
        <a href="{{ route('hot_new')}}" class="cta-enlace">
            <div class="cta-contenido">
            <h2 class="cta-titulo">¡No te pierdas la noticia del momento!</h2> <!-- llamada a la acción -->
                <p class="cta-descripcion">Haz clic aquí para más información</p>
            </div>
        </a>
    </section>

    @include('partials.catalogs') <!-- incluye la sección de catálogos -->

    @include('partials.contact') <!-- incluye la sección de contacto -->

    @include('partials.footer') <!-- incluye el footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3Z1J6X1Z4cb4VnAqmpAhFlM5Yb5Ud1Et4yBLt+Jx1nVybkXM5ZyY8gMIvM9bwKE" crossorigin="anonymous">
    </script> <!-- incluye Bootstrap JS -->
    <script src="{{ asset('js/app.js') }}"></script> <!-- incluye el JS personalizado -->
    <script src="{{ mix('js/app.js') }}" type="module" defer></script> <!-- incluye el JS compilado -->
</body>

</html>