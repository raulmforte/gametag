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
                margin-left: 250px; // ajusta el margen izquierdo para pantallas grandes
            }
        }
    </style>
</head>
<body>
@include('admin.sidebar') <!-- incluye el sidebar del administrador -->

<div class="content-wrapper">
    <div class="container py-5">
        <h1 class="mb-4">Crear Nuevo Juego</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li> <!-- muestra los errores de validación -->
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('juegos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del juego</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}" required> <!-- campo para ingresar el nombre del juego -->
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
                </select> <!-- lista de géneros disponibles -->
            </div>

            <!-- Imagen -->
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen del juego</label>
                <input type="file" id="imagen" name="imagen" class="form-control"> <!-- campo para subir la imagen del juego -->
            </div>

            <!-- Trailer -->
            <div class="mb-3">
                <label for="trailer" class="form-label">URL del trailer de YouTube</label>
                <input type="text" id="trailer" name="trailer" class="form-control" value="{{ old('trailer') }}"> <!-- campo para ingresar el enlace del tráiler -->
            </div>

            <!-- Descripción -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="6" class="form-control">{{ old('descripcion') }}</textarea> <!-- campo para ingresar la descripción -->
            </div>

            <!-- Fecha de publicación -->
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha de publicación</label>
                <input type="date" id="fecha" name="fecha" class="form-control" value="{{ old('fecha') }}"> <!-- campo para ingresar la fecha de publicación -->
            </div>

            <!-- Precios -->
            <h4 class="mt-4">Precios</h4>
            <div id="precios">
                <div class="precio mb-3 border p-3 rounded bg-light">
                    <div class="mb-2">
                        <label class="form-label">Plataforma</label>
                        <input type="text" name="plataformas[]" class="form-control" placeholder="Ej: Steam"> <!-- campo para ingresar la plataforma -->
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Precio (€)</label>
                        <input type="text" name="precios[]" class="form-control" placeholder="Ej: 19.99"> <!-- campo para ingresar el precio -->
                    </div>
                    <div>
                        <label class="form-label">Enlace de compra</label>
                        <input type="text" name="urls[]" class="form-control" placeholder="Ej: https://store.steampowered.com/app/1234"> <!-- campo para ingresar el enlace de compra -->
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center mt-3">
                <button type="button" id="add-price" class="btn btn-secondary me-2">Agregar otro precio</button> <!-- botón para agregar otro precio -->
                <button type="submit" class="btn btn-primary me-2">Guardar Juego</button> <!-- botón para guardar el juego -->
                <a href="{{ route('juegos') }}" class="btn btn-secondary">Cancelar</a> <!-- botón para cancelar -->
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector('#descripcion')).catch(error => console.error(error)); // inicializa CKEditor para el campo de descripción
</script>

<script>
    document.getElementById('add-price').addEventListener('click', function () {
        const preciosDiv = document.getElementById('precios');
        const nuevoPrecio = document.createElement('div');
        nuevoPrecio.classList.add('precio', 'mb-3', 'border', 'p-3', 'rounded', 'bg-light');
        nuevoPrecio.innerHTML = `
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
        `;
        preciosDiv.appendChild(nuevoPrecio); // agrega un nuevo bloque de precios
    });
</script>

</body>
</html>