<categories>
    <div class="titulo-categorias">
        <h2 class="text-center fuente-titulo">Categorías</h2>
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