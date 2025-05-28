<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Listado de Usuarios</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

    <style>
        @media (min-width: 992px) {
            /* A partir de lg (≥992px), deja espacio a la izquierda para el sidebar */
            .content-wrapper {
                margin-left: 250px; /* igual al ancho del sidebar */
            }
        }
    </style>
</head>

<body>
    <!-- Menú lateral -->
    @include('admin.sidebar')

    <!-- Contenido principal -->
    <div class="content-wrapper">
        <div class="container py-4">
            <h1 class="mb-4">Usuarios</h1>

            <p><a href="{{ route('register') }}" class="btn btn-success">Registrar nuevo admin</a></p>

            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="d-flex gap-2">
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar este usuario?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                                </form>
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
