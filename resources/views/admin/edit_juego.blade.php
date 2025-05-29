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
@include('admin.sidebar') <!-- incluye el sidebar del administrador -->

<div class="content-wrapper">

    <div class="container py-5">
        <h1 class="mb-4">Editar Juego</h1>

        @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div> <!-- muestra mensaje de éxito -->
        @endif

        @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li> <!-- muestra los errores de validación -->
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('juegos.update', $juego->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Imagen actual -->
            @if($juego->imagen)
            <div class="mb-3">
                <label class="form-label">Imagen actual:</label>
                <div>
                    <img src="{{ asset('fotos/' . $juego->imagen) }}" alt="Imagen juego" class="img-thumbnail"
                        style="max-width: 300px;"> <!-- muestra la imagen actual del juego -->
                </div>
            </div>
            @endif

            <!-- Cambiar imagen -->
            <div class="mb-3">
                <label for="imagen" class="form-label">Cambiar imagen (opcional)</label>
                <input type="file" name="imagen" id="imagen" class="form-control @error('imagen') is-invalid @enderror">
                @error('imagen')<div class="invalid-feedback">{{ $message }}</div>@enderror <!-- muestra error si la imagen no es válida -->
            </div>

            <!-- Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror"
                    value="{{ old('nombre', $juego->nombre) }}"> <!-- campo para editar el nombre del juego -->
                @error('nombre')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <!-- Género -->
            <div class="mb-3">
                <label for="genero" class="form-label">Género</label>
                <select name="genero" id="genero" class="form-select @error('genero') is-invalid @enderror">
                    <option value="" disabled>Selecciona un genero</option>
                    @foreach(['simulacion','accion','rol','novela visual','terror','estrategia'] as $genre)
                    <option value="{{ $genre }}" {{ old('genero', $juego->genero)==$genre?'selected':'' }}>
                        {{ ucfirst($genre) }}</option> <!-- lista de géneros disponibles -->
                    @endforeach
                </select>
                @error('genero')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <!-- Trailer -->
            <div class="mb-3">
                <label for="trailer" class="form-label">URL del trailer</label>
                <input type="text" name="trailer" id="trailer"
                    class="form-control @error('trailer') is-invalid @enderror"
                    value="{{ old('trailer', $juego->trailer) }}"> <!-- campo para editar el enlace del tráiler -->
                @error('trailer')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <!-- Descripción -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="6"
                    class="form-control @error('descripcion') is-invalid @enderror">{{ old('descripcion', $juego->descripcion) }}</textarea> <!-- campo para editar la descripción -->
                @error('descripcion')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <!-- Fecha de publicación -->
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha de publicación</label>
                <input type="date" name="fecha" id="fecha" class="form-control @error('fecha') is-invalid @enderror"
                    value="{{ old('fecha', $juego->fecha ? \Carbon\Carbon::parse($juego->fecha)->format('Y-m-d') : '') }}"> <!-- campo para editar la fecha de publicación -->
                @error('fecha')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <!-- Precios existentes -->
            <h4 class="mt-4">Precios actuales</h4>
            <div id="precios-existing">
                @foreach($juego->precios as $index => $precio)
                <div class="precio mb-3 border p-3 rounded bg-light">
                    <input type="hidden" name="precio_ids[]" value="{{ $precio->id }}">
                    <div class="mb-2">
                        <label class="form-label">Plataforma</label>
                        <input type="text" name="plataformas[]" class="form-control"
                            value="{{ old('plataformas.'.$index, $precio->plataforma) }}"> <!-- campo para editar la plataforma -->
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Precio (€)</label>
                        <input type="text" name="precios[]" class="form-control"
                            value="{{ old('precios.'.$index, $precio->precio) }}"> <!-- campo para editar el precio -->
                    </div>
                    <div>
                        <label class="form-label">URL de compra</label>
                        <input type="text" name="urls[]" class="form-control"
                            value="{{ old('urls.'.$index, $precio->url_compra) }}"> <!-- campo para editar el enlace de compra -->
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Botón actualizar -->
            <button type="submit" class="btn btn-primary mt-3">Actualizar Juego</button> <!-- botón para actualizar el juego -->
            <a href="{{ route('juegos') }}" class="btn btn-secondary mt-3 ms-2">Cancelar</a> <!-- botón para cancelar -->
        </form>
    </div>
</div>

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
ClassicEditor.create(document.querySelector('#descripcion')).catch(error => console.error(error)); // inicializa CKEditor para el campo de descripción
</script>