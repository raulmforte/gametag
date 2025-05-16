<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width. initial-scale=1.0">
    <title>Document</title>
     <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @include('partials.header')

    @if($categoria == "accion")
    <div class="accion">
        <h2>Accion</h2>
        <div class="row">
            <div>
                <h3>God of war(2018)</h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
        </div>
        <div class="row">
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
        </div>
    </div>
    @endif

    @if($categoria == "simulacion")
    <div class="accion">
        <h2>Simulacion</h2>
        <div class="row">
            <div>
                <h3>God of war(2018)</h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
        </div>
        <div class="row">
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
        </div>
    </div>
    @endif

    @if($categoria == "terror")
    <div class="accion">
        <h2>Terror</h2>
        <div class="row">
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
        </div>
        <div class="row">
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
        </div>
    </div>
    @endif

    @if($categoria =="novela_visual")
    <div class="accion">
        <h2>Novela visual</h2>
        <div class="row">
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
        </div>
        <div class="row">
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
        </div>
    </div>
    @endif

    @if($categoria == "estrategia")
    <div class="accion">
        <h2>Estrategia</h2>
        <div class="row">
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
        </div>
        <div class="row">
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
        </div>
    </div>
    @endif

    @if($categoria == "rol")
    <div class="accion">
        <h2>Rol</h2>
        <div class="row">
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
        </div>
        <div class="row">
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
            <div>
                <h3></h3>
                <img src="/fotos/kraktos.webph" alt="Imagen clickable" />
            </div>
        </div>
    </div>
    @endif

</body>

</html>
