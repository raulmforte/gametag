<contacto id="contacto" class="mb-5">
    <div class="d-flex justify-content-center align-items-center">
        <form method="POST" class="formulario" action="{{ route('contacto.enviar') }}">
            @csrf
            <div class="contacto-titulo">
                <h2 class="fuente-titulo">Contacto</h2>
                <hr class="linea-azul">
            </div>
            <div class="mb-3 contacto">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control custom-border" id="nombre" name="nombre"
                    value="{{ old('nombre') }}" required>
                @error('nombre') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3 contacto">
                <label for="email" class="form-label">Correo</label>
                <input type="email" class="form-control custom-border" id="email" name="email"
                    value="{{ old('email') }}" required>
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3 contacto">
                <label for="mensaje" class="form-label">Mensaje</label>
                <textarea class="form-control custom-border" id="mensaje" name="mensaje" rows="4"
                    required>{{ old('mensaje') }}</textarea>
                @error('mensaje') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">

<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.v3_sitekey') }}"></script>

<script>
  grecaptcha.ready(function() {
    grecaptcha.execute('{{ config('services.recaptcha.v3_sitekey') }}', { action: 'contacto' })
      .then(function(token) {
        document.getElementById('g-recaptcha-response').value = token;
      });
  });
</script>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</contacto>