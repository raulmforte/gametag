@extends('layout')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Iniciar Sesión</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required autofocus>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</div>
@endsection