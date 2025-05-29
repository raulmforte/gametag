<style>
.noticias-carrusel-container {
    position: relative; /* posiciona el contenedor */
    max-width: 2000px; /* ancho máximo */
    margin: 0 auto; /* centra el contenedor */
    padding: 1rem; /* espacio interno */
    overflow: hidden; /* oculta el contenido desbordado */
    background: #fff; /* fondo blanco */
    border-radius: 6px; /* bordes redondeados */
    box-shadow: 0 0 10px rgb(0 0 0 / 0.1); /* sombra ligera */
}

.carrusel-viewport {
    overflow: hidden; /* oculta el contenido desbordado */
    width: 100%; /* ocupa todo el ancho */
}

.carrusel-track {
    display: flex; /* usa flexbox para los elementos */
    transition: transform 0.4s ease; /* transición suave */
    gap: 1rem; /* espacio entre los elementos */
}

.carrusel-item {
    flex: 0 0 25%; /* cada elemento ocupa el 25% del contenedor */
    box-sizing: border-box; /* incluye el padding y borde en el tamaño */
    background: #f9f9f9; /* fondo gris claro */
    padding: 0.5rem; /* espacio interno */
    border-radius: 4px; /* bordes redondeados */
    text-align: center; /* texto centrado */
    display: flex; /* usa flexbox */
    flex-direction: column; /* organiza los elementos en columna */
    align-items: center; /* centra los elementos horizontalmente */
}

.carrusel-item img {
    width: 100%; /* ocupa todo el ancho */
    height: 350px; /* altura fija */
    object-fit: cover; /* ajusta la imagen */
    border-radius: 4px; /* bordes redondeados */
}

.carrusel-btn {
    position: absolute; /* posiciona el botón */
    top: 50%; /* centra verticalmente */
    transform: translateY(-50%); /* ajusta la posición */
    background: #ff6600; /* fondo naranja */
    border: none; /* sin borde */
    color: white; /* texto blanco */
    font-size: 2rem; /* tamaño de fuente */
    padding: 0.25rem 0.75rem; /* espacio interno */
    cursor: pointer; /* cambia el cursor */
    border-radius: 4px; /* bordes redondeados */
    user-select: none; /* evita la selección de texto */
    z-index: 10; /* prioridad en el apilamiento */
}

.carrusel-prev {
    left: 10px; /* posición izquierda */
}

.carrusel-next {
    right: 10px; /* posición derecha */
}

.carrusel-btn:disabled {
    background: #ccc; /* fondo gris */
    cursor: not-allowed; /* cursor no permitido */
}
</style>

<div class="mb-5 mt-5">
    <h1 class="text-center mt-5 mb-5">Noticias</h1> <!-- encabezado -->
    <div class="noticias-carrusel-container">
        <button class="carrusel-btn carrusel-prev">‹</button> <!-- botón anterior -->

        <div class="carrusel-viewport">
            <div class="carrusel-track">
                @foreach($noticias as $noticia)
                <div class="carrusel-item">
                    <a href="{{ route('news2_mostrar', $noticia->id) }}" class="text-decoration-none text-dark d-block">
                        <img src="{{ asset('fotos/' . $noticia->imagen) }}" alt="{{ $noticia->titular }}" /> <!-- imagen -->
                        <h5 class="mt-2">{{ $noticia->titular }}</h5> <!-- titular -->
                        <p class="small">{!! Str::limit($noticia->descripcion, 100) !!}</p> <!-- descripción limitada -->
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        <button class="carrusel-btn carrusel-next">›</button> <!-- botón siguiente -->
    </div>

    <div class="d-flex justify-content-center mt-5">
        <a href="{{ route('news2') }}" class="btn btn-warning px-4"
            style="background-color: #ff6600; border:none; color: white; font-weight: 600;">
            {{ __('More news') }} <!-- botón para más noticias -->
        </a>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const track = document.querySelector(".carrusel-track");
    const items = document.querySelectorAll(".carrusel-item");
    const prevBtn = document.querySelector(".carrusel-prev");
    const nextBtn = document.querySelector(".carrusel-next");

    const itemsVisible = 4; // número de elementos visibles
    const totalItems = items.length; // total de elementos
    let currentIndex = 0;

    const style = getComputedStyle(track);
    const gap = parseInt(style.gap) || 0; // espacio entre elementos

    const itemWidth = items[0].offsetWidth + gap; // ancho total de cada elemento

    const maxIndex = Math.ceil(totalItems / itemsVisible) - 1; // índice máximo

    const updateButtons = () => {
        prevBtn.disabled = currentIndex === 0; // desactiva el botón anterior si está en el inicio
        nextBtn.disabled = currentIndex === maxIndex; // desactiva el botón siguiente si está en el final
    };

    const updateCarousel = () => {
        const moveX = currentIndex * itemsVisible * itemWidth; // calcula el desplazamiento
        track.style.transform = `translateX(-${moveX}px)`; // mueve el carrusel
        updateButtons(); // actualiza los botones
    };

    nextBtn.addEventListener("click", () => {
        if (currentIndex < maxIndex) {
            currentIndex++;
            updateCarousel(); // mueve al siguiente grupo
        }
    });

    prevBtn.addEventListener("click", () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateCarousel(); // mueve al grupo anterior
        }
    });

    window.addEventListener("resize", () => {
        currentIndex = 0; // reinicia el índice al cambiar el tamaño de la ventana
        updateCarousel();
    });

    updateCarousel(); // inicializa el carrusel
});
</script>