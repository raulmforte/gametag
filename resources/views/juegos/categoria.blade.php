@extends('layout')

@section('title', 'Juegos de ' . ucfirst($categoria))

@section('content')
    <h1 class="mb-4">Juegos de {{ ucfirst($categoria) }}</h1>
    <div class="row">
        @forelse ($juegos as $juego)
            <div class="col-12 col-sm-6 col-md-3 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $juego->imagen) }}" class="card-img-top" alt="{{ $juego->nombre }}">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $juego->nombre }}</h5>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">No hay juegos disponibles en esta categoría.</p>
        @endforelse
    </div>
@endsection