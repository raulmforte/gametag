<marcas id="marcas">
    <style>
        /* Bordes redondeados, sombra y efecto hover para las imágenes de las marcas */
        .marca img {
            border-radius: 10px; /* Bordes redondeados moderados */
            border: 2px solid #2c2c2c; /* Borde gris oscuro */
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.4); /* Sombra ligera */
            transition: transform 0.3s ease, box-shadow 0.3s ease; /* Transición suave */
        }

        .marca img:hover {
            transform: scale(1.05); /* Aumenta el tamaño al pasar el mouse */
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.6); /* Sombra más pronunciada en hover */
        }
    </style>

<div class="marcas-todo">
        <h2 class="fuente-titulo text-center">{{ __('Recommended stores') }}</h2>
        <hr class="linea-azul">
        <div class="container marcas">
            <div class="marca">
                <a href="https://store.steampowered.com/">
                    <img src="{{ asset('fotos/steam.png') }}" class="imagen-hover im2"/>
                </a>
            </div>
            <div class="marca">
                <a href="https://www.gog.com/en/">
                    <img src="{{ asset('fotos/gog.webp') }}" class="imagen-hover im2"/>
                </a>
            </div>
        </div>
    </div>
</marcas>