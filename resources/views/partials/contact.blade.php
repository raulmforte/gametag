<contacto id="contacto" class="mb-5 mt-5">
    <div class="d-flex justify-content-center align-items-center">
        <form method="POST" class="formulario" action="{{ route('contacto.enviar') }}">
            @csrf
            <div class="contacto-titulo">
                <h2 class="fuente-titulo">Contacto</h2>
                <hr class="linea-azul"> <!-- línea decorativa -->
            </div>
            <div class="mb-3 contacto">
                <label for="nombre" class="form-label">Nombre</label> <!-- etiqueta para el campo de nombre -->
                <input type="text" class="form-control custom-border" id="nombre" name="nombre"
                    value="{{ old('nombre') }}" required> <!-- campo de entrada para el nombre -->
                @error('nombre') <small class="text-danger">{{ $message }}</small> @enderror <!-- muestra errores de validación -->
            </div>

            <div class="mb-3 contacto">
                <label for="email" class="form-label">Correo electrónico</label> <!-- etiqueta para el campo de email -->
                <input type="email" class="form-control custom-border" id="email" name="email"
                    value="{{ old('email') }}" required> <!-- campo de entrada para el email -->
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror <!-- muestra errores de validación -->
            </div>

            <div class="mb-3 contacto">
                <label for="mensaje" class="form-label">Mensaje</label> <!-- etiqueta para el campo de mensaje -->
                <textarea class="form-control custom-border" id="mensaje" name="mensaje" rows="4"
                    required>{{ old('mensaje') }}</textarea> <!-- campo de entrada para el mensaje -->
                @error('mensaje') <small class="text-danger">{{ $message }}</small> @enderror <!-- muestra errores de validación -->
            </div>

            <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response"> <!-- campo oculto para reCAPTCHA -->

            <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.v3_sitekey') }}"></script>
            <script>
                grecaptcha.ready(function() {
                    grecaptcha.execute('{{ config('services.recaptcha.v3_sitekey') }}', { action: 'contacto' })
                        .then(function(token) {
                            document.getElementById('g-recaptcha-response').value = token; // asigna el token generado
                        });
                });
            </script>
            <button type="submit" class="btn btn-primary btn-custom">Enviar</button> <!-- botón para enviar el formulario -->
        </form>
    </div>
</contacto>