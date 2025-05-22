<!DOCTYPE html>
<html lang="en">

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
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* El contenedor principal debe ocupar todo el espacio disponible */
        main {
          margin-top: 120px;
            flex: 1;
            padding: 20px;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
             width: 100%;
             z-index: 1000;
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
  <!--
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('welcome') }}">Inicio</a></li>
                <li><a href="{{ route('juegos.create') }}">Crear Juego</a></li>
                <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
                <li><a href="{{ route('register') }}">Registrarse</a></li>
            </ul>
        </nav>
    </header>-->
      
    @include('partials.header') <!-- Incluye el header -->
    
    <main>
        @yield('content')
    </main>

    <footer>
    <footer class="footer-custom pt-5 pb-4">
  <div class="container text-md-left">
    <div class="row text-md-left">

      <!-- Marca y descripción -->
      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
        <h5 class="text-uppercase mb-4 fw-bold text-orange">GAMETAG</h5>
        <p>Tu portal definitivo para noticias, reseñas y comunidad gamer. ¡Explora, juega y conecta!</p>
      </div>

      <!-- Navegación -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 fw-bold text-orange">Enlaces</h6>
        <p><a href="/noticias" class="text-dark text-decoration-none">Noticias</a></p>
        <p><a href="/reseñas" class="text-dark text-decoration-none">Reseñas</a></p>
        <p><a href="/foros" class="text-dark text-decoration-none">Foros</a></p>
        <p><a href="/contacto" class="text-dark text-decoration-none">Contacto</a></p>
      </div>

      <!-- Contacto -->
      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 fw-bold text-orange">Contacto</h6>
        <p><i class="fas fa-envelope me-2 text-orange"></i> (un email random raul)</p>
        <p><i class="fas fa-phone me-2 text-orange"></i> +34 123 456 789</p>
      </div>

      <!-- Últimos lanzamientos -->
      <div class="col-md-4 col-lg-4 col-xl-3 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 fw-bold text-orange">Últimos lanzamientos</h6>
        <ul class="list-unstyled">
          <li><i class="fas fa-gamepad me-2 text-orange"></i> Elden Ring: Shadow of the Erdtree</li>
          <li><i class="fas fa-gamepad me-2 text-orange"></i> GTA VI</li>
          <li><i class="fas fa-gamepad me-2 text-orange"></i> Starfield</li>
          <li><i class="fas fa-gamepad me-2 text-orange"></i> Hades II</li>
        </ul>
      </div>

    </div>

    <hr class="mb-4 mt-4"/>

    <div class="row align-items-center">
      <div class="col-md-7 col-lg-8">
        <p class="text-center text-md-start text-muted mb-0">&copy; 2025 <strong class="text-orange">GAMETAG</strong>. Todos los derechos reservados.</p>
      </div>
      <div class="col-md-5 col-lg-4">
        <div class="text-center text-md-end icone-orange">
          <a href="#" class="text-dark me-3"><i class="fab fa-twitter"></i></a>
          <a href="#" class="text-dark me-3"><i class="fab fa-twitch"></i></a>
          <a href="#" class="text-dark me-3"><i class="fab fa-discord"></i></a>
          <a href="#" class="text-dark"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
    </div>
  </div>
</footer>
    </footer>
</body>

</html>