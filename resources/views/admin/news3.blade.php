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
                margin-left: 250px;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar incluido -->
    @include('admin.sidebar')

    <!-- Contenido principal -->
    <div class="content-wrapper">
        <div class="container py-4">
            <h1 class="mb-4">Noticias</h1>

            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            

            <a href="{{ route('admin.insert_news') }}" class="btn btn-success mb-3">Insertar</a>
            
            @can('manage news')
                <a href="{{ route('admin.insert_news') }}" class="btn btn-success mb-3">Insertar</a>
            @endcan

            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titular</th>
                            <th>Descripción</th>
                            <th>Última actualización</th>
                            <th>Fecha creacion</th>
                            <th>Fecha actualizacion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($noticias as $noticia)
                            <tr>
                                <td>{{ $noticia->id }}</td>
                                <td>{{ $noticia->titular }}</td>
                                <td>{{ str(strip_tags($noticia->descripcion))->limit(15) }}</td>
                                <td>
                                    @if ($noticia->updatedBy)
                                        Última actualización por: {{ $noticia->updatedBy->name }}
                                    @else
                                        Nunca ha sido actualizada
                                    @endif
                                </td>
                                <td>{{ $noticia->created_at }}</td>
                                <td>{{ $noticia->updated_at }}</td>
                               
                                <td>
                                        <div class="d-flex gap-1">
                                            <a href="{{ route('news3.edit', $noticia->id) }}" 
                                               class="btn btn-warning btn-sm">Editar</a>
                                            <form action="{{ route('news3.destroy', $noticia->id) }}" 
                                                  method="POST"
                                                  onsubmit="return confirm('¿Seguro que quieres borrar esta noticia?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                                            </form>
                                        </div>

                                        <!--<span class="text-muted">Sin permisos</span>-->
                        
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