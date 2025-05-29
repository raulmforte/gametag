<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listado de Juegos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    @include('admin.sidebar') <!-- incluye el sidebar del administrador -->

    <div class="content-wrapper">
        <div class="container py-4">
            <h1 class="mb-4">Listado de Juegos</h1>

            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div> <!-- muestra mensaje de éxito -->
            @endif

            <a href="{{ route('admin.insert_juego') }}" class="btn btn-success mb-3">Insertar Juego</a> <!-- botón para insertar un nuevo juego -->

            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Género</th>
                            <th>Descripción</th>
                            <th>Trailer</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($juegos as $juego)
                            <tr>
                                <td>{{ $juego->id }}</td>
                                <td>{{ $juego->nombre }}</td>
                                <td>{{ $juego->genero }}</td>
                                <td>{{ str(strip_tags($juego->descripcion))->limit(20) }}</td> <!-- muestra una descripción limitada -->
                                <td>
                                    @if($juego->trailer)
                                        <a href="{{ $juego->trailer }}" target="_blank">Ver Trailer</a> <!-- enlace al tráiler -->
                                    @else
                                        <span class="text-muted">No disponible</span> <!-- mensaje si no hay tráiler -->
                                    @endif
                                </td>
                                <td>
                                    @if($juego->imagen)
                                        <img src="{{ asset('fotos/' . $juego->imagen) }}" alt="Imagen del juego" class="img-thumbnail" style="max-width: 100px;"> <!-- muestra la imagen del juego -->
                                    @else
                                        <span class="text-muted">Sin imagen</span> <!-- mensaje si no hay imagen -->
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('games.edit', $juego->id) }}" class="btn btn-warning btn-sm">Editar</a> <!-- botón para editar el juego -->
                                        <form action="{{ route('games.destroy', $juego->id) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres borrar este juego?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Borrar</button> <!-- botón para borrar el juego -->
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>