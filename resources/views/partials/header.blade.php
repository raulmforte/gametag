<header class="cabezera">
    <style>
        /* Estilo para los enlaces del header */
        .fixed-header a {
            color: #000 !important; /* Color inicial del texto (negro) */
            text-decoration: none !important;
            transition: color 0.3s ease !important; /* Transición suave */
        }

        .fixed-header a:hover {
            color: #d35400 !important; /* Naranja más oscuro al pasar el mouse */
        }
    </style>

    <div class="top-bar bg-dark text-white d-flex align-items-center justify-content-end p-1 fuente header-negro"></div>

    <div class="fixed-header bg-white text-dark d-flex align-items-center justify-content-between p-3 fixed-top">
        <!-- Logo principal -->
        <a href="{{ route('welcome') }}">
            <img src="{{ asset('fotos/logo.png') }}" style="width: auto; height: 80px;" class="img-fluid rounded mt-0 mb-0 top" alt="Logo">
        </a>
        <a href="{{ route('welcome') }}">
            <img src="{{ asset('fotos/letras2.png') }}" style="width: auto; height: 80px;" class="img-fluid rounded mt-0 mb-0 top" alt="Logo2">
        </a>

        <!-- Navegación -->
        <div class="d-flex align-items-center">
            @auth
                <!-- Si el usuario está autenticado, muestra su nombre y un botón para cerrar sesión -->
                <span class="text-dark mx-2">Hola, {{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-link text-dark mx-2" style="text-decoration: none;">Cerrar sesión</button>
                </form>
            @else
                <!-- Si no está autenticado, muestra los enlaces de login y registro -->
                <a href="{{ route('login') }}" class="text-dark mx-2">Iniciar Sesión</a>
                <a href="{{ route('register') }}" class="text-dark mx-2">Registrarse</a>
            @endauth

            <!-- Enlace para crear un juego (opcional, visible para todos) -->
            <a href="{{ route('juegos.create') }}" class="text-dark mx-2">Crear Juego</a>

            <!-- Idiomas -->
            <div class="d-flex align-items-center fuente">
                <a href="#" class="text-dark mx-2">ES</a>
                <a href="#" class="text-dark mx-2">EN</a>
                <a href="#" class="text-dark mx-2">FR</a>
            </div>
        </div>
    </div>
</header>