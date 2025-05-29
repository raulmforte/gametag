<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- incluye Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- incluye el CSS personalizado -->
</head>

<body>
    @include('admin.sidebar') <!-- incluye el sidebar de administración -->
    <div class="container py-5">
        <h1>ADMINISTRACION</h1> <!-- encabezado principal -->
        <p>Bienvenido a la pagina de administracion de gametag</p> <!-- mensaje de bienvenida -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script> <!-- incluye Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script> <!-- incluye Bootstrap JS -->
</body>

</html>