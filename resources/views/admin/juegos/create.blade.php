{{-- filepath: /home/raul/Escritorio/gametag/gametag/resources/views/admin/juegos/create.blade.php --}}
@extends('layout')

@section('title', 'Crear Juego')

@section('content')
    <div class="container my-5">
        <form action="{{ route('juegos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del juego</label>
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del juego" required>
            </div>

            <div class="mb-3">
                <label for="genero" class="form-label">Género</label>
                <select name="genero" id="genero" class="form-select" required>
                    <option value="rol">Rol</option>
                    <option value="accion">Acción</option>
                    <option value="terror">Terror</option>
                    <option value="estrategia">Estrategia</option>
                    <option value="novela_visual">Novela Visual</option>
                    <option value="accion_y_aventura">Acción y Aventura</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" name="imagen" id="imagen" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="trailer" class="form-label">URL del trailer de YouTube</label>
                <input type="text" name="trailer" id="trailer" class="form-control" placeholder="URL del trailer de YouTube">
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción del juego</label>
                <textarea name="descripcion" id="descripcion" class="form-control" placeholder="Descripción del juego" rows="4" required></textarea>
            </div>

            <h3>Precios</h3>
            <div id="precios">
                <div class="precio mb-3">
                    <div class="row g-2">
                        <div class="col-md-4">
                            <input type="text" name="plataformas[]" class="form-control" placeholder="Plataforma" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="precios[]" class="form-control" placeholder="Precio (€)" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="urls[]" class="form-control" placeholder="Enlace de compra" required>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
