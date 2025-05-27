<footer class="footer-custom pt-5 pb-4">
  <div class="container text-md-left">
    <div class="row text-md-left">

      <!-- Marca y descripción -->
      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
        <h5 class="text-uppercase mb-4 fw-bold text-orange">GAMETAG</h5>
        <p>{{ __('Your ultimate portal for gaming news') }}. {{ __('Explore, play and connect') }}!</p>
      </div>

      <!-- Navegación -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
      <h6 class="text-uppercase mb-4 fw-bold text-orange">{{ __('Links') }}</h6>
      <p><a href="/noticias" class="text-dark text-decoration-none">{{ __('News') }}</a></p>
      <p>
          <a href="{{ request()->is('/') ? '#titulo-categorias' : route('welcome').'#titulo-categorias' }}" 
           class="text-dark text-decoration-none">
           {{ __('Reviews') }}
          </a>
      </p>
        <p>
          <a href="{{ request()->is('/') ? '#contacto' : route('welcome').'#contacto' }}" 
              class="text-dark text-decoration-none">
              {{ __('Contact') }}
          </a>
      </p>
      </div>

      <!-- Contacto -->
      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
      <h6 class="text-uppercase mb-4 fw-bold text-orange">{{ __('Contact information') }}</h6>
      <p><i class="fas fa-envelope me-2 text-orange"></i> contacto@gametag.com </p>
        <p><i class="fas fa-phone me-2 text-orange"></i> +34 675 214 365</p>
      </div>

      <!-- Últimos lanzamientos -->
      <div class="col-md-4 col-lg-4 col-xl-3 mx-auto mt-3">
       <h6 class="text-uppercase mb-4 fw-bold text-orange">{{ __('Last releases') }}</h6>
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
      <p class="text-center text-md-start text-muted mb-0">&copy; {{ date('Y') }} <strong class="text-orange">GAMETAG</strong>. {{ __('All rights reserved') }}.</p>
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

<!-- NOTAS
 de la parte de ultimos lanzamientos si se te ocurre algo mejor ponlo, a mi no se me ocurria otra cosa
 el css ponlo en el css de la carpeta public, te lo e puesto aqui para pasartelo todo de una, y poco mas,
  simplemente copialo y pegalo sustituyendo el que habia antes
-->
