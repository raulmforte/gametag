<!--<especializaciones>
    <div class="container especialzaciones">
        <div class="especializaciones-titulo">
            <h2 class="fuente-titulo">En qué estamos especializados</h2>
            <hr class="linea-azul">
        </div>
        <div class="row justify-content-center g-4 fuente">
            <div class="col-12 col-sm-4">
                <div class="postit">
                    <a href=#marcas class="text-decoration-none text-reset">
                    <i class="bi bi-buildings h1"></i>
                    <h2>no lo se </h2>
                    <p>tampoco lo se</p>
                    </a>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="postit">
                    <a href=#marcas class="text-decoration-none text-reset">
                    <i class="bi bi-check-lg h1"></i>
                    <h2>raul cambialo</h2>
                    <p>y otro mas</p>
                    </a>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="postit">
                    <i class="bi bi-arrow-left-right h1"></i>
                    <h2>no se hermano</h2>
                    <p>pedro esta bien no?</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center g-4 fuente">
            <div class="col-12 col-sm-4">
                <div class="postit">
                    <i class="bi bi-box h1"></i>
                    <h2>no</h2>
                    <p>hay nada de lo otr</p>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="postit">
                    <a href="https://unlink" class="text-decoration-none text-reset">
                    <i class="bi bi-geo-alt h1"></i>
                    <h2>Tienda física</h2>
                    <p>Nuestro punto de venta fictisio se sitúa en Yecla, Murcia</p>
                    </a>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="postit">
                    <a href="https://unlink" class="text-decoration-none text-reset">
                    <i class="bi bi-cart2 h1"></i>
                    <h2>raulonlinestore.com</h2>
                    <p>24h al día, 7 días a la semana. Ahorrando el 1% extra para el profesional</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</especializaciones>-->



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doom: The Dark Ages – Noticia</title>
    <!-- Tus estilos -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Justo antes del cierre de la etiqueta </body> -->

</head>

<body class="noticia-pag">
    @include('partials.header')


    <article class="gt-article">
        <header class="gt-article-header">
            <h1 class="gt-article-title">Doom: The Dark Ages Llega Incompleto: ¿El Fin del Formato Físico?</h1>
            <p class="gt-article-date">Publicado el 12 de mayo de 2025</p>
        </header>


        <section class="gt-article-body">
            <p class="gt-article-lead">
                <strong>
                    Bethesda ha desatado una nueva polémica con el lanzamiento de <em>Doom: The Dark Ages</em>, cuyo
                    lanzamiento oficial está previsto para el 15 de mayo de 2025.
                    Las versiones físicas para PS5 y Xbox Series X no contienen el juego completo en el disco; en su
                    lugar, incluyen pequeños archivos instaladores que requieren conexión a Internet para descargar el
                    resto del juego.
                </strong>
            </p>

            <p>
                La decisión de Bethesda de no incluir el juego completo en el medio físico ha sido calificada de
                “anti-usuario” por muchos en la comunidad gamer.
                Según datos de “Does it Play?”, el 93 % de los más de 2 500 títulos analizados funcionan sin conexión,
                convirtiendo este caso en una rara excepción.
            </p>

            <p>
                Además, no es la primera vez que Bethesda recurre a este esquema:
                <em>Indiana Jones y el Gran Círculo</em> (2024) y <em>Starfield</em> (2023) emplearon tácticas
                similares,
                lo que ha erosionado la confianza de los jugadores en la compañía.
            </p>

            <p>
                Con <em>Doom: The Dark Ages</em> a punto de salir,
                los usuarios están divididos:
                unos esperan con ansia el nuevo título;
                otros critican la política de distribución y temen por el futuro del formato físico en la industria.
            </p>
        </section>

        <footer class="gt-article-footer">
            <span class="gt-article-source-label">Fuente:</span>
            <a class="gt-article-source-link"
                href="https://as.com/meristation/noticias/doom-the-dark-ages-sigue-los-pasos-de-indiana-jones-y-tampoco-viene-completo-en-disco-ni-en-ps5-ni-en-xbox-series-x-n/"
                target="_blank" rel="noopener noreferrer">
                Meristation
            </a>
        </footer>

    </article>
        @include('partials.footer')

    
    <!-- Tus scripts -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3Z1J6X1Z4cb4VnAqmpAhFlM5Yb5Ud1Et4yBLt+Jx1nVybkXM5ZyY8gMIvM9bwKE" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ mix('js/app.js') }}" type="module" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>