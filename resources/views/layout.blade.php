<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>@yield('title', 'GAMETAG')</title>
    <style>
    /* Hacer que el body ocupe toda la altura de la ventana */
    body {
        font-family: 'Jost', sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        background-color: #2c2c2c; /* Gris oscuro */
        color: #ffffff; /* Texto blanco para contraste */
    }
    main {
        margin-top: 120px;
        flex: 1;
        padding: 20px;
        background: linear-gradient(to bottom, #4b0082, #2c003e); /* Degradado violeta oscuro */
        color: #ffffff; /* Texto blanco */
    }
        /* El contenedor principal debe ocupar todo el espacio disponible */
        .fixed-header {
            top: 30px; /* Ajustado para que no se superponga con la barra superior */
            width: 100%;
            z-index: 1020;
            box-shadow: 0 4px 2px -2px rgba(0, 0, 0, 0.5); /* Sombra para destacar */
            transition: top 0.1s ease-in-out;
        }

        /* Header con degradado violeta */
        
        .fixed-header a {
            color: #ffffff; /* Texto blanco */
            text-decoration: none;
            margin-right: 15px;
            font-weight: 500;
        }

        .fixed-header a:hover {
            color: #f0ad4e; /* Color de acento al pasar el mouse */
        }

        .fixed-header img {
            max-width: 100%;
            filter: brightness(0.9); /* Oscurece ligeramente las imágenes */
        }

        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: auto; /* Empuja el footer al final */
        }

        footer p {
            margin: 0;
        }
    </style>
</head>

<body>
    @include('partials.header') <!-- Incluye el header -->

    <main>
        @yield('content')
    </main>
    @include('partials.footer')
    
</body>

</html>