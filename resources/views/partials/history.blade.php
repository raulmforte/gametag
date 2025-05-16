<div class="contenedor">
    <div class="contenido fuente-titulo">
        <h1>La pagina de videojuegos mas popular en Español</h1>
    </div>
</div>
<div class="carrusel-historia">
        <div class="carousel-inner-custom">
            @foreach ([
            ['anio' => '1893', 'img' => 'munegro.png', 'titulo' => __('history.pasos'), 'texto' =>
            "tumama"],
            ['anio' => '1920', 'img' => 'munegro.png', 'titulo' => __('history.contabilidad'), 'texto' =>
            __('history.economicos')],
            ['anio' => '1950', 'img' => 'munegro.png', 'titulo' => __('history.instalaciones'), 'texto' =>
            __('history.fachada')],
            ['anio' => '1953', 'img' => 'munegro.png', 'titulo' => __('history.riendas'), 'texto' =>
            __('history.luchador')],
            ['anio' => '1960', 'img' => 'munegro.png', 'titulo' => __('history.vehiculo'), 'texto' =>
            __('history.mercancias')],
            ['anio' => '1980', 'img' => 'munegro.png', 'titulo' => __('history.nuevas'), 'texto' =>
            __('history.pequeñas')],
            ['anio' => '1990', 'img' => 'munegro.png', 'titulo' => __('history.paradigma'), 'texto' =>
            __('history.decada')],
            ['anio' => '1993', 'img' => 'munegro.png', 'titulo' => __('history.nave'), 'texto' =>
            __('history.aniversario')],
            ['anio' => '2000', 'img' => 'munegro.png', 'titulo' => __('history.hijos'), 'texto' =>
            __('history.negocio')],
            ['anio' => '2008', 'img' => 'munegro.png', 'titulo' => __('history.nuevas2'), 'texto' =>
            __('history.edificacion')],
            ['anio' => '2015', 'img' => 'munegro.png', 'titulo' => __('history.online'), 'texto' =>
            __('history.verdustore')],
            ['anio' => '2018', 'img' => 'munegro.png', 'titulo' => __('history.125'), 'texto' =>
            __('history.personalidades')],
            ] as $item)
            <div class="carousel-item-custom">
                <img src="{{ asset('fotos/' . $item['img']) }}" alt="Imagen {{ $item['anio'] }}">
                <h5 class="text-primary mt-3">{{ $item['anio'] }}</h5>
                <p><strong>{{ $item['titulo'] }}</strong></p>
                <p>{{ $item['texto'] }}</p>
            </div>
            @endforeach
        </div>

        <button class="carousel-prev-custom">‹</button>
        <button class="carousel-next-custom">›</button>
    </div>

</historia>



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</history>
