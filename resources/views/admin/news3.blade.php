<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listado de Noticias</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        @media (min-width: 992px) {
            /* Compensar el espacio del sidebar en pantallas grandes */
            .content-wrapper {
                margin-left: 250px; /* ajusta el margen izquierdo */
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar incluido -->
    @include('admin.sidebar') <!-- incluye el sidebar del administrador -->

    <!-- Contenido principal -->
    <div class="content-wrapper">
        <div class="container py-4">
            <h1 class="mb-4">Noticias</h1>

            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div> <!-- muestra mensaje de éxito -->
            @endif

            <a href="{{ route('admin.insert_news') }}" class="btn btn-success mb-3">Insertar</a> <!-- botón para insertar una nueva noticia -->
            
            @can('manage news')
                <a href="{{ route('admin.insert_news') }}" class="btn btn-success mb-3">Insertar</a> <!-- botón para insertar si tiene permisos -->
            @endcan

            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titular</th>
                            <th>Descripción</th>
                            <th>Última actualización</th>
                            <th>Fecha creación</th>
                            <th>Fecha actualización</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($noticias as $noticia)
                            <tr>
                                <td>{{ $noticia->id }}</td>
                                <td>{{ $noticia->titular }}</td>
                                <td>{{ str(strip_tags($noticia->descripcion))->limit(15) }}</td> <!-- muestra una descripción limitada -->
                                <td>
                                    @if ($noticia->updatedBy)
                                        Última actualización por: {{ $noticia->updatedBy->name }} <!-- muestra quién actualizó -->
                                    @else
                                        Nunca ha sido actualizada <!-- mensaje si no ha sido actualizada -->
                                    @endif
                                </td>
                                <td>{{ $noticia->created_at }}</td>
                                <td>{{ $noticia->updated_at }}</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('news3.edit', $noticia->id) }}" 
                                           class="btn btn-warning btn-sm">Editar</a> <!-- botón para editar -->
                                        <form action="{{ route('news3.destroy', $noticia->id) }}" 
                                              method="POST"
                                              onsubmit="return confirm('¿Seguro que quieres borrar esta noticia?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Borrar</button> <!-- botón para borrar -->
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