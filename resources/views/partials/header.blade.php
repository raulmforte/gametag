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
            

            <!-- Idiomas -->
            <div class="d-flex gap-2">
            <a href="{{ route('welcome', ['lang' => 'es']) }}">ES</a>
            <a href="{{ route('welcome', ['lang' => 'en']) }}">EN</a>
            <a href="{{ route('welcome', ['lang' => 'fr']) }}">FR</a>
            </div>
    </div>
</header>