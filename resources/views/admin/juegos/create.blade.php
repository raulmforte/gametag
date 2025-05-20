
@extends('layout')

@section('title', 'Crear Juego')

@section('content')
<form action="{{ route('juegos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="nombre" placeholder="Nombre del juego">
    <input type="text" name="genero" placeholder="Género">
    <input type="file" name="imagen">
    <input type="text" name="trailer" placeholder="URL del trailer de YouTube">
    <textarea name="descripcion" placeholder="Descripción del juego"></textarea>

    <h3>Precios</h3>
    <div id="precios">
        <div class="precio">
            <input type="text" name="plataformas[]" placeholder="Plataforma">
            <input type="text" name="precios[]" placeholder="Precio (€)">
            <input type="text" name="urls[]" placeholder="Enlace de compra">
        </div>
    </div>

    <button type="submit">Guardar</button>
</form>
@endsection