<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Insertar Juego</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        @media (min-width: 992px) {
            .content-wrapper {
                margin-left: 250px;
            }
        }
    </style>
</head>

<body>
    @include('admin.sidebar')

    <div class="content-wrapper">
        <div class="container py-5">
            <h1 class="mb-4">Crear Nuevo Juego</h1>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('juegos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Nombre -->
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del juego</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
                </div>

                <!-- Género -->
                <div class="mb-3">
                    <label for="genero" class="form-label">Género</label>
                    <select id="genero" name="genero" class="form-select" required>
                        <option value="" disabled selected>Selecciona un género</option>
                        <option value="simulacion">Simulación</option>
                        <option value="accion">Acción</option>
                        <option value="rol">Rol</option>
                        <option value="novela visual">Novela Visual</option>
                        <option value="terror">Terror</option>
                        <option value="estrategia">Estrategia</option>
                    </select>
                </div>

                <!-- Imagen -->
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen del juego</label>
                    <input type="file" id="imagen" name="imagen" class="form-control">
                </div>

                <!-- Trailer -->
                <div class="mb-3">
                    <label for="trailer" class="form-label">URL del trailer de YouTube</label>
                    <input type="text" id="trailer" name="trailer" class="form-control" value="{{ old('trailer') }}">
                </div>

                <!-- Descripción -->
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea id="descripcion" name="descripcion" rows="6" class="form-control">{{ old('descripcion') }}</textarea>
                </div>

                <!-- Precios -->
                <h4 class="mt-4">Precios</h4>
                <div id="precios">
                    <div class="precio mb-3 border p-3 rounded bg-light">
                        <div class="mb-2">
                            <label class="form-label">Plataforma</label>
                            <input type="text" name="plataformas[]" class="form-control" placeholder="Ej: Steam">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Precio (€)</label>
                            <input type="text" name="precios[]" class="form-control" placeholder="Ej: 19.99">
                        </div>
                        <div>
                            <label class="form-label">Enlace de compra</label>
                            <input type="text" name="urls[]" class="form-control" placeholder="Ej: https://store.steampowered.com/app/1234">
                        </div>
                    </div>
                </div>

                <!-- Botón -->
                <button type="submit" class="btn btn-primary mt-3">Guardar Juego</button>
                <a href="{{ route('juegos') }}" class="btn btn-secondary mt-3 ms-2">Cancelar</a>
            </form>
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- CKEditor (opcional para descripción si quieres) -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#descripcion'))
            .catch(error => console.error(error));
    </script>
</body>

</html>
