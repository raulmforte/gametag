<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>GAMETAG</title>
</head>

<body>
    @include('partials.header')

    <div class="quienes">
    <h1>¿Quienes somos?</h1>
        <p>Somos Arturo y Raul, 2 estudiantes de DAW que han creado la pagina de videojuegos mas famosa de españa
        </p>
        <h1>¿Porque lo hacemos?</h1>
            <p>lo haceemos porque queremos que la mayor cantidad de gente posible pueda disfrutar de nuestro hobby favorito
                y porque queremos informar a los jugadores de todo el mundo de las novedades de este mundillo
            </p>
</div>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"integrity="sha384-A3Z1J6X1Z4cb4VnAqmpAhFlM5Yb5Ud1Et4yBLt+Jx1nVybkXM5ZyY8gMIvM9bwKE"crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ mix('js/app.js') }}" type="module" defer></script>
</body>

</html>