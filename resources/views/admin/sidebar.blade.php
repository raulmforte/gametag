<!-- Botón hamburguesa para móviles -->
<?php
use Illuminate\Support\Facades\Auth;
?>
<!-- Navbar para móviles (solo visible en pantallas pequeñas) -->
<nav class="navbar d-lg-none bg-secondary text-white border-bottom p-2 justify-content-between">
    <button class="btn btn-outline-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
        ☰ Menú
    </button>
</nav>

<!-- Menú lateral móvil (offcanvas) -->
<div class="offcanvas offcanvas-start bg-secondary text-white" tabindex="-1" id="mobileSidebar">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Menú</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link text-white" href="{{ route('news3') }}">Noticias</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="{{ route('juegos') }}">Juegos</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="{{ route('register') }}">Registrar nuevo usuario</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin.reviews.index') }}">Reviews</a></li>

            <li class="nav-item mt-3">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-danger w-100" type="submit">Cerrar sesión</button>
                </form>
            </li>
            <li>
                <form method="POST" action="{{ route('welcome') }}">
                    @csrf
                    <button class="btn btn-success w-100" type="submit">Volver a la página principal</button>
                </form>
            </li>
        </ul>
    </div>
</div>

<!-- Barra lateral fija (pantallas grandes) -->
<nav class="sidebar d-none d-lg-block vh-100 position-fixed p-3 bg-secondary text-white" style="width: 250px;">
    <h5>Menú</h5>
    <ul class="nav flex-column">
        <li class="nav-item"><a class="nav-link text-white" href="{{ route('news3') }}">Noticias</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="{{ route('juegos') }}">Juegos</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="{{ route('users') }}">Usuarios</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin.reviews.index') }}">Reviews</a></li>

        <li class="nav-item mt-3">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-danger w-100" type="submit">Cerrar sesión</button>
            </form>
        </li>
        <li class="mt-3">
            <form action="{{ route('welcome') }}">
                @csrf
                <button class="btn btn-success w-100" type="submit">Volver a la página principal</button>
            </form>
        </li>
    </ul>
</nav>