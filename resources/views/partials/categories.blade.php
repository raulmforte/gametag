    <categories>
        <div class="titulo-categorias">
            <h2 class="text-center fuente-titulo">Categorías</h2>
            <hr class="linea-azul">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-4 mb-4 categoria">
                    <form action="{{ route('categorias') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="categoria" value="simulacion">
                            <button type="submit" class="contenedores foto1 text-decoration-none"></button>
                        </form>
                </div>
                <div class="col-12 col-sm-4 mb-4 categoria" >
                        <form action="{{ route('categorias') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="categoria" value="accion">
                            <button type="submit" class="contenedores foto2 text-decoration-none"></button>
                        </form>
                </div>
                <div class="col-12 col-sm-4 mb-4 categoria">
                    <form action="{{ route('categorias') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="categoria" value="rol">
                            <button type="submit" class="contenedores foto3 text-decoration-none"></button>
                        </form>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-sm-4 mb-4 categoria">
                    <form action="{{ route('categorias') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="categoria" value="novela_visual">
                            <button type="submit" class="contenedores foto4 text-decoration-none"></button>
                        </form>
                </div>
                <div class="col-12 col-sm-4 mb-4 categoria">
                    <form action="{{ route('categorias') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="categoria" value="terror">
                            <button type="submit" class="contenedores foto5 text-decoration-none"></button>
                        </form>
                </div>
                <div class="col-12 col-sm-4 mb-4 categoria">
                    <form action="{{ route('categorias') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="categoria" value="estrategia">
                            <button type="submit" class="contenedores foto6 text-decoration-none"></button>
                        </form>
                </div>
            </div>
        </div>
    </categories>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
