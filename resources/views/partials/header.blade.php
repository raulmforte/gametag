<header class="cabezera">
    <style>
        .fixed-header a {
            color: #000 !important; /* color negro para los enlaces */
            text-decoration: none !important; /* elimina el subrayado */
            transition: color 0.3s ease !important; /* transición suave al cambiar el color */
        }

        .fixed-header a:hover {
            color: #d35400 !important; /* color naranja al pasar el mouse */
        }

        .nav-link-custom {
            margin-left: 1rem; /* espacio entre los enlaces */
        }

        .header-logo {
            flex: 1; /* ocupa una parte proporcional del espacio */
        }

        .header-title {
            flex: 1; /* ocupa una parte proporcional del espacio */
            text-align: center; /* centra el texto */
        }

        .header-nav {
            flex: 1; /* ocupa una parte proporcional del espacio */
            text-align: right; /* alinea el contenido a la derecha */
        }
    </style>

    <div class="top-bar bg-dark text-white d-flex align-items-center justify-content-end p-1 fuente header-negro"></div>

    <div class="fixed-header bg-white text-dark d-flex align-items-center justify-content-between p-3 fixed-top">
        <!-- Logo a la izquierda -->
        <div class="header-logo">
            <a href="{{ route('welcome') }}">
                <img src="{{ asset('fotos/logo.png') }}" style="height: 80px;" class="img-fluid rounded" alt="Logo"> <!-- logo del sitio -->
            </a>
        </div>

        <!-- Título en el centro -->
        <div class="header-title">
            <a href="{{ route('welcome') }}">
                <img src="{{ asset('fotos/letras2.png') }}" style="height: 80px;" class="img-fluid rounded" alt="Título"> <!-- título del sitio -->
            </a>
        </div>

        <!-- Navegación a la derecha -->
        <div class="header-nav d-flex flex-column align-items-end">
            <div class="d-flex gap-3">
                <a class="nav-link-custom" href="{{ route('welcome') }}#inicio">{{ __('Inicio') }}</a> <!-- enlace a inicio -->
                <a class="nav-link-custom" href="{{ route('news2') }}">{{ __('Noticias') }}</a> <!-- enlace a noticias -->
                <a class="nav-link-custom" href="{{ route('welcome') }}#contacto">{{ __('Contacto') }}</a> <!-- enlace a contacto -->
                <a class="nav-link-custom" href="{{ route('hot_new') }}">{{ __('Noticia del momento') }}</a> <!-- enlace a noticia del momento -->
            </div>
            <div class="language-selector mt-1">
                <a href="{{ route('welcome', 'es') }}">ES</a> | <!-- selector de idioma español -->
                <a href="{{ route('welcome', 'en') }}">EN</a> | <!-- selector de idioma inglés -->
                <a href="{{ route('welcome', ['lang' => 'fr']) }}">FR</a> <!-- selector de idioma francés -->
            </div>
        </div>
    </div>
</header>