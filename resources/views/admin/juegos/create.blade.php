
@extends('layout')

@section('title', 'Crear Juego')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Crear Nuevo Juego</h1>
    <form action="{{ route('juegos.store') }}" method="POST" enctype="multipart/form-data" class="form">
        @csrf

        <!-- Nombre del juego -->
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del juego</label>
            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre del juego">
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
            <input type="text" id="trailer" name="trailer" class="form-control" placeholder="URL del trailer de YouTube">
        </div>

        <!-- Descripción -->
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción del juego</label>
            <textarea id="descripcion" name="descripcion" class="form-control" rows="5" placeholder="Descripción del juego"></textarea>
        </div>

        <!-- Precios -->
        <h3 class="mt-4">Precios</h3>
        <div id="precios">
            <div class="precio mb-3">
                <label class="form-label">Plataforma</label>
                <input type="text" name="plataformas[]" class="form-control mb-2" placeholder="Plataforma">
                
                <label class="form-label">Precio (€)</label>
                <input type="text" name="precios[]" class="form-control mb-2" placeholder="Precio (€)">
                
                <label class="form-label">Enlace de compra</label>
                <input type="text" name="urls[]" class="form-control" placeholder="Enlace de compra">
            </div>
        </div>

        <!-- Botón de guardar -->
        <button type="submit" class="btn btn-primary mt-4">Guardar</button>
    </form>
</div>
@endsection