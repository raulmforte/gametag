<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('About us') }} – GAMETAG</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet"> <!-- incluye el CSS compilado -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"> <!-- íconos de Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- incluye el CSS personalizado -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> <!-- íconos de Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- incluye el CSS de Bootstrap -->

    <style>
        body {
            background-color: #ffffff; /* fondo blanco */
            color: #222; /* texto oscuro */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* fuente */
        }

        .quienes {
            background-color: #f8f9fa; /* fondo gris claro */
            padding: 4rem 2rem; /* espacio interno */
            border-radius: 15px; /* bordes redondeados */
            max-width: 1000px; /* ancho máximo */
            margin: 5rem auto 3rem auto; /* márgenes */
            box-shadow: 0 0 20px rgba(255, 111, 0, 0.1); /* sombra */
            border: 1px solid #e2e2e2; /* borde */
        }

        .quienes h1 {
            color: #ff6b00; /* color naranja */
            margin-bottom: 1.5rem; /* margen inferior */
            font-weight: bold; /* texto en negrita */
        }

        .quienes p {
            font-size: 1.2rem; /* tamaño de fuente */
            margin-bottom: 2rem; /* margen inferior */
            line-height: 1.7; /* altura de línea */
        }

        .equipo {
            background-color: #fff; /* fondo blanco */
            padding: 3rem 2rem; /* espacio interno */
            border-radius: 15px; /* bordes redondeados */
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.05); /* sombra */
            max-width: 1000px; /* ancho máximo */
            margin: 0 auto 5rem auto; /* márgenes */
        }

        .equipo h2 {
            color: #ff6b00; /* color naranja */
            margin-bottom: 2rem; /* margen inferior */
        }

        .miembro {
            text-align: center; /* texto centrado */
            margin-bottom: 2rem; /* margen inferior */
        }

        .miembro img {
            width: 120px; /* ancho de la imagen */
            height: 120px; /* altura de la imagen */
            object-fit: cover; /* ajusta la imagen */
            border-radius: 50%; /* bordes redondeados */
            border: 3px solid #ff6b00; /* borde naranja */
            margin-bottom: 1rem; /* margen inferior */
        }

        .miembro h5 {
            color: #333; /* texto oscuro */
            font-weight: bold; /* texto en negrita */
        }

        .miembro p {
            font-size: 0.95rem; /* tamaño de fuente */
            color: #555; /* texto gris */
        }
    </style>
</head>

<body>
    @include('partials.header') <!-- incluye el header -->

    <div class="container quienes text-center">
        <h1>{{ __('About us') }}</h1>
        <p>{{ __('We are Arturo and Raúl') }}, {{ __('two students passionate about video games') }}. {{ __('This page is our final project') }}.</p>

        <h1>{{ __('Why we do it') }}</h1>
        <p>{{ __('We believe video games are art') }}. {{ __('We want anyone to enjoy this world') }}.</p>
    </div>

    <div class="container equipo text-center">
        <h2>{{ __('Our team') }}</h2>
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4 miembro">
                <img src="{{ asset('fotos/arturo.jpg') }}" alt="Arturo"> <!-- imagen de Arturo -->
                <h5>Arturo</h5>
                <p>{{ __('Frontend and layout specialist') }}. {{ __('Passionate about Zelda series') }}.</p>
            </div>
            <div class="col-md-5 col-lg-4 miembro">
                <img src="{{ asset('fotos/raul.jpg') }}" alt="Raúl"> <!-- imagen de Raúl -->
                <h5>Raúl</h5>
                <p>{{ __('Backend and server logic') }}. {{ __('Fan of shooters and clean code') }}.</p>
            </div>
        </div>
    </div>

    @include('partials.footer') <!-- incluye el footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3Z1J6X1Z4cb4VnAqmpAhFlM5Yb5Ud1Et4yBLt+Jx1nVybkXM5ZyY8gMIvM9bwKE"
        crossorigin="anonymous"></script> <!-- incluye el JS de Bootstrap -->
    <script src="{{ asset('js/app.js') }}"></script> <!-- incluye el JS personalizado -->
    <script src="{{ mix('js/app.js') }}" type="module" defer></script> <!-- incluye el JS compilado -->
</body>

</html>