<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listado de Reviews</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        @media (min-width: 992px) {
            .content-wrapper {
                margin-left: 250px; /* ajusta el margen izquierdo para pantallas grandes */
            }
        }
    </style>
</head>

<body>
    @include('admin.sidebar') <!-- incluye el sidebar del administrador -->

    <div class="content-wrapper">
        <div class="container py-4">
            <h1 class="mb-4">Reseñas de Juegos</h1>

            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div> <!-- muestra mensaje de éxito -->
            @endif

            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Juego</th>
                            <th>Nombre</th>
                            <th>Nota</th>
                            <th>Comentario</th>
                            <th>Aceptada</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reviews as $review)
                            <tr>
                                <td>{{ $review->id }}</td>
                                <td>{{ $review->juego->nombre }}</td>
                                <td>{{ $review->nombre_reviewer }}</td>
                                <td>{{ number_format($review->nota, 1) }}</td> <!-- muestra la nota con un decimal -->
                                <td>{{ Str::limit($review->comentario, 30) }}</td> <!-- limita el comentario a 30 caracteres -->
                                <td>
                                    @if($review->aceptada)
                                        <span class="badge bg-success">Sí</span> <!-- muestra badge si está aceptada -->
                                    @else
                                        <span class="badge bg-secondary">No</span> <!-- muestra badge si no está aceptada -->
                                    @endif
                                </td>
                                <td>{{ $review->created_at->format('d/m/Y H:i') }}</td> <!-- muestra la fecha de creación -->
                                <td>
                                    <div class="d-flex gap-1">
                                        <form action="{{ route('admin.reviews.toggle', $review->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-primary">
                                                {{ $review->aceptada ? 'Rechazar' : 'Aceptar' }} <!-- alterna entre aceptar y rechazar -->
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres borrar esta reseña?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Borrar</button> <!-- botón para borrar la reseña -->
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