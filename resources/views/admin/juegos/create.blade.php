@extends('layout')

@section('title', 'Crear Juego')

@section('content')
<style>
    body {
        background-color: #111;
        color: #fff;
    }

    .btn-orange {
        background-color: #ff6600;
        color: #fff;
        border: none;
    }

    .btn-orange:hover {
        background-color: #e65c00;
    }

    .form-control,
    .form-select {
        background-color: #222;
        color: #fff;
        border: 1px solid #ff6600;
    }

    .form-control::placeholder {
        color: #bbb;
    }

    label {
        margin-top: 10px;
    }

    h3 {
        color: #ff6600;
        margin-top: 20px;
    }
</style>

<!-- En <head> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" 
      rel="stylesheet" 
      integrity="sha384-<nuevo-hash-generado>" 
      crossorigin="anonymous">
      <link href="https://cdn.jsdelivr.net/npm/font-awesome@6.5.0/css/all.min.css" rel="stylesheet">
      <link href="https://kit.fontawesome.com/a076d05399.js" rel="stylesheet">



<div class="container mt-5">
    <h1 class="text-center mb-4">Crear Juego</h1>

    <form action="{{ route('juegos.store') }}" method="POST" enctype="multipart/form-data" class="p-4 rounded" style="background-color: #1a1a1a;">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del juego</label>
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del juego" required>
        </div>

        <div class="mb-3">
            <label for="genero" class="form-label">Género</label>
            <select name="genero" id="genero" class="form-select" required>
                <option value="">Selecciona un género</option>
                <option value="Simulación">Simulación</option>
                <option value="Acción">Acción</option>
                <option value="Rol">Rol</option>
                <option value="Novela Visual">Novela Visual</option>
                <option value="Terror">Terror</option>
                <option value="Estrategia">Estrategia</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen del juego</label>
            <input type="file" name="imagen" id="imagen" class="form-control">
        </div>

        <div class="mb-3">
            <label for="trailer" class="form-label">URL del trailer de YouTube</label>
            <input type="text" name="trailer" id="trailer" class="form-control" placeholder="https://...">
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="4" placeholder="Descripción del juego"></textarea>
        </div>

        <h3>Precios</h3>

        <div id="precios" class="mb-3">
            <div class="row g-2 align-items-end precio">
                <div class="col-md-4">
                    <label for="plataformas[]" class="form-label">Plataforma</label>
                    <input type="text" name="plataformas[]" class="form-control" placeholder="Ej: Steam">
                </div>
                <div class="col-md-3">
                    <label for="precios[]" class="form-label">Precio (€)</label>
                    <input type="text" name="precios[]" class="form-control" placeholder="Ej: 19.99">
                </div>
                <div class="col-md-5">
                    <label for="urls[]" class="form-label">Enlace de compra</label>
                    <input type="text" name="urls[]" class="form-control" placeholder="https://...">
                </div>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-orange mt-4 px-5">Guardar</button>
        </div>
    </form>
</div>
@endsection
