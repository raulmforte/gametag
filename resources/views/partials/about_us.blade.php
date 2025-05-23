<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¿Quiénes Somos? – GAMETAG</title>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #ffffff;
            color: #222;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .quienes {
            background-color: #f8f9fa;
            padding: 4rem 2rem;
            border-radius: 15px;
            max-width: 1000px;
            margin: 5rem auto 3rem auto;
            box-shadow: 0 0 20px rgba(255, 111, 0, 0.1);
            border: 1px solid #e2e2e2;
        }

        .quienes h1 {
            color: #ff6b00;
            margin-bottom: 1.5rem;
            font-weight: bold;
        }

        .quienes p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            line-height: 1.7;
        }

        .equipo {
            background-color: #fff;
            padding: 3rem 2rem;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
            max-width: 1000px;
            margin: 0 auto 5rem auto;
        }

        .equipo h2 {
            color: #ff6b00;
            margin-bottom: 2rem;
        }

        .miembro {
            text-align: center;
            margin-bottom: 2rem;
        }

        .miembro img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #ff6b00;
            margin-bottom: 1rem;
        }

        .miembro h5 {
            color: #333;
            font-weight: bold;
        }

        .miembro p {
            font-size: 0.95rem;
            color: #555;
        }
    </style>
</head>

<body>
    @include('partials.header')

    <div class="container quienes text-center">
        <h1>¿Quiénes somos?</h1>
        <p>Somos <strong>Arturo y Raúl</strong>, dos estudiantes de Desarrollo de Aplicaciones Web que comparten una
            pasión desbordante por los videojuegos. Esta página es fruto de nuestro proyecto final y de un sueño de infancia.</p>

        <h1>¿Por qué lo hacemos?</h1>
        <p>Creemos firmemente que los videojuegos son una forma de arte, comunidad y diversión. Queremos que cualquier
            persona pueda disfrutar de este mundo, informarse y descubrir títulos que le apasionen tanto como a nosotros.</p>
    </div>

    <div class="container equipo text-center">
        <h2>Nuestro equipo</h2>
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4 miembro">
                <img src="{{ asset('fotos/arturo.jpg') }}" alt="Arturo">
                <h5>Arturo</h5>
                <p>Frontend y maquetación. Apasionado de la saga Zelda, la experiencia de usuario y los detalles visuales.</p>
            </div>
            <div class="col-md-5 col-lg-4 miembro">
                <img src="{{ asset('fotos/raul.jpg') }}" alt="Raúl">
                <h5>Raúl</h5>
                <p>Backend y lógica de servidor. Fan de los shooters y del código limpio y bien organizado.</p>
            </div>
        </div>
    </div>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3Z1J6X1Z4cb4VnAqmpAhFlM5Yb5Ud1Et4yBLt+Jx1nVybkXM5ZyY8gMIvM9bwKE"
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ mix('js/app.js') }}" type="module" defer></script>
</body>

</html>