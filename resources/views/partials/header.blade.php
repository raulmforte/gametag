<header class="cabezera">
    <style>
        .fixed-header a {
            color: #000 !important;
            text-decoration: none !important;
            transition: color 0.3s ease !important;
        }

        .fixed-header a:hover {
            color: #d35400 !important;
        }

        .nav-link-custom {
            margin-left: 1rem;
        }

        .header-logo {
            flex: 1;
        }

        .header-title {
            flex: 1;
            text-align: center;
        }

        .header-nav {
            flex: 1;
            text-align: right;
        }
    </style>

    <div class="top-bar bg-dark text-white d-flex align-items-center justify-content-end p-1 fuente header-negro"></div>

    <div class="fixed-header bg-white text-dark d-flex align-items-center justify-content-between p-3 fixed-top">
        <!-- Logo a la izquierda -->
        <div class="header-logo">
            <a href="{{ route('welcome') }}">
                <img src="{{ asset('fotos/logo.png') }}" style="height: 80px;" class="img-fluid rounded" alt="Logo">
            </a>
        </div>

        <!-- Título en el centro -->
        <div class="header-title">
            <a href="{{ route('welcome') }}">
                <img src="{{ asset('fotos/letras2.png') }}" style="height: 80px;" class="img-fluid rounded" alt="Título">
            </a>
        </div>

        <!-- Navegación a la derecha -->
        <div class="header-nav d-flex flex-column align-items-end">
            <div class="d-flex gap-3">
                <a class="nav-link-custom" href="{{ route('welcome') }}#inicio">{{ __('Inicio') }}</a>
                <a class="nav-link-custom" href="{{ route('news2') }}">{{ __('Noticias') }}</a>
                <a class="nav-link-custom" href="{{ route('welcome') }}#contacto">{{ __('Contacto') }}</a>
                <a class="nav-link-custom" href="{{ route('hot_new') }}">{{ __('Noticia del momento') }}</a>

            </div>
            <div class="language-selector mt-1">
                <a href="{{ route('welcome', 'es') }}">ES</a> |
                <a href="{{ route('welcome', 'en') }}">EN</a> |
                <a href="{{ route('welcome', ['lang' => 'fr']) }}">FR</a>
            </div>
        </div>
    </div>
</header>
