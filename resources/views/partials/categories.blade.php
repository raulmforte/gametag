<categories>
    <style>
        /* Bordes redondeados, borde gris oscuro, sombra más pronunciada y efecto hover para las imágenes de las categorías */
        .contenedores {
            border-radius: 10px; /* Bordes redondeados moderados */
            border: 2px solid #2c2c2c; /* Borde gris oscuro */
            overflow: hidden; /* Asegura que el contenido no se salga del borde */
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.4); /* Sombra más pronunciada */
            transition: transform 0.3s ease, box-shadow 0.3s ease; /* Transición suave */
        }

        .contenedores:hover {
            transform: scale(1.05); /* Aumenta el tamaño al pasar el mouse */
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.6); /* Sombra mucho más pronunciada en hover */
        }
    </style>

    <div id="titulo-categorias" class="titulo-categorias mt-5 mb-5">
        <h2 class="text-center fuente-titulo">{{ __('Categories') }}</h2>
        <hr class="linea-azul">
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-4 mb-4 categoria">
                <a href="{{ route('juegos.categoria', ['categoria' => 'simulacion']) }}" class="contenedores foto1 text-decoration-none"></a>
            </div>
            <div class="col-12 col-sm-4 mb-4 categoria">
                <a href="{{ route('juegos.categoria', ['categoria' => 'accion']) }}" class="contenedores foto2 text-decoration-none"></a>
            </div>
            <div class="col-12 col-sm-4 mb-4 categoria">
                <a href="{{ route('juegos.categoria', ['categoria' => 'rol']) }}" class="contenedores foto3 text-decoration-none"></a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-sm-4 mb-4 categoria">
                <a href="{{ route('juegos.categoria', ['categoria' => 'novela_visual']) }}" class="contenedores foto4 text-decoration-none"></a>
            </div>
            <div class="col-12 col-sm-4 mb-4 categoria">
                <a href="{{ route('juegos.categoria', ['categoria' => 'terror']) }}" class="contenedores foto5 text-decoration-none"></a>
            </div>
            <div class="col-12 col-sm-4 mb-4 categoria">
                <a href="{{ route('juegos.categoria', ['categoria' => 'estrategia']) }}" class="contenedores foto6 text-decoration-none"></a>
            </div>
        </div>
    </div>
</categories>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>