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
    <title>@yield('title', 'GAMETAG')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #343a40;
            color: white;
            padding: 10px 0;
        }

        header nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            padding: 0;
            margin: 0;
        }

        header nav ul li {
            margin: 0 15px;
        }

        header nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        header nav ul li a:hover {
            text-decoration: underline;
        }

        main {
            padding: 20px;
        }

        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: 20px;
        }

        footer p {
            margin: 0;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('welcome') }}">Inicio</a></li>
                <li><a href="{{ route('juegos.create') }}">Crear Juego</a></li>
                <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
                <li><a href="{{ route('register') }}">Registrarse</a></li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Gametag. Todos los derechos reservados.</p>
    </footer>
</body>

</html>