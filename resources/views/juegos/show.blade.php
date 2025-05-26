@extends('layout')

@section('title', $juego->nombre)

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">{{ $juego->nombre }}</h1>

    <div class="row align-items-start"> <!-- align-items-start para alinear al tope -->
        <!-- Columna de la imagen -->
        <div class="col-md-6 pe-4"> <!-- pe-4: padding derecho -->
            <img src="{{ asset('storage/' . $juego->imagen) }}" 
                 alt="Imagen de {{ $juego->nombre }}" 
                 class="img-fluid rounded shadow-sm"> <!-- Estilos adicionales -->
        </div>
        
        <!-- Columna de texto - Añadí mb-3 para reducir margen inferior -->
        <div class="col-md-6 ps-3"> <!-- ps-3: padding izquierdo -->
            <div class="mb-2"> <!-- Contenedor para género -->
                <span class="badge bg-primary fs-6">{{ $juego->genero }}</span>
            </div>
            
            <p class="text-justify lead" style="line-height: 1.6;"> <!-- lead para tamaño de texto -->
                {{ $juego->descripcion }}
            </p>
        </div>
    </div> 

    <!-- Sección del trailer - mt-4: margen superior reducido -->
    @if($juego->trailer)
    <div class="mt-4">
        <h2 class="mb-3">Trailer</h2>
        <div class="ratio ratio-16x9"> <!-- Clase responsive de Bootstrap -->
            <iframe src="https://www.youtube.com/embed/{{ \Illuminate\Support\Str::after($juego->trailer, 'v=') }}" 
                    allowfullscreen>
            </iframe>
        </div>
    </div>
    @endif

    <!-- Tabla de precios - mt-4: margen superior reducido -->
    <div class="mt-4">
        <h3 class="mb-3">Precios</h3>
        @if($juego->precios->isNotEmpty())
        <div class="table-responsive"> <!-- Hace la tabla responsive -->
            <table class="table table-hover"> <!-- table-hover para efecto hover -->
                <thead class="table-light">
                    <tr>
                        <th>Plataforma</th>
                        <th>Precio</th>
                        <th>Enlace</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($juego->precios as $precio)
                    <tr>
                        <td class="align-middle">{{ $precio->plataforma }}</td>
                        <td class="align-middle fw-bold">{{ number_format($precio->precio, 2) }} €</td>
                        <td>
                            <a href="{{ $precio->url_compra }}" 
                               target="_blank" 
                               class="btn btn-sm btn-outline-success">
                                Comprar
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="text-muted">No hay precios disponibles para este juego.</p>
        @endif
    </div>
</div>
@endsection