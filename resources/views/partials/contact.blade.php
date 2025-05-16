<div class="d-flex justify-content-center align-items-center" style="height: 50vh;">
    <form method="POST" class="formulario" action="{{ route('contacto.enviar') }}">
        @csrf
        <div class="contacto-titulo">
            <h2 class="fuente-titulo">Contactanos</h2>
            <hr class="linea-azul">
        </div>
        <div class="mb-3 contacto">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control custom-border" id="nombre" name="nombre" value="{{ old('nombre') }}"
                required>
            @error('nombre') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3 contacto">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control custom-border" id="email" name="email" value="{{ old('email') }}"
                required>
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3 contacto">
            <label for="mensaje" class="form-label">Mensaje</label>
            <textarea class="form-control custom-border" id="mensaje" name="mensaje" rows="4"
                required>{{ old('mensaje') }}</textarea>
            @error('mensaje') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
