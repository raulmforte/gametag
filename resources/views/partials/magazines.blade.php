<revistas class="revistas">
    <div class="revistas-titulo">
        <h2 class="fuente-titulo">Revistas</h2>
        <hr class="linea-azul"> <!-- línea decorativa -->
    </div>
    <div class="revista-carousel-wrapper">
        <button class="revista-carousel-btn revista-carousel-prev">←</button> <!-- botón para ir al elemento anterior -->

        <div class="revista-carousel-viewport">
            <div class="revista-carousel-track" id="revistaCarousel">
                @foreach($revistas as $revista)
                <div class="revista-carousel-item">
                    <a href="{{ asset('revistas/pdf/' . $revista . '.pdf') }}" target="_blank"> <!-- enlace al PDF de la revista -->
                        <img src="{{ asset('revistas/images/' . $revista . '.jpg') }}" alt="{{ $revista }}"> <!-- imagen de la revista -->
                    </a>
                    <h5>{{ $revista }}</h5> <!-- título de la revista -->
                </div>
                @endforeach
            </div>
        </div>

        <button class="revista-carousel-btn revista-carousel-next">→</button> <!-- botón para ir al siguiente elemento -->
    </div>
</revistas>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const track = document.getElementById('revistaCarousel');
    const items = document.querySelectorAll('.revista-carousel-item');
    const nextBtn = document.querySelector('.revista-carousel-next');
    const prevBtn = document.querySelector('.revista-carousel-prev');

    let currentPosition = 0;
    const itemWidth = items[0].offsetWidth; // ancho de cada elemento
    const visibleItems = 4; // número de elementos visibles
    const totalItems = items.length; // total de elementos

    nextBtn.addEventListener('click', () => {
        if (currentPosition < totalItems - visibleItems) {
            currentPosition++;
            track.style.transform = `translateX(-${itemWidth * currentPosition}px)`; // mueve el carrusel hacia la izquierda
        }
    });

    prevBtn.addEventListener('click', () => {
        if (currentPosition > 0) {
            currentPosition--;
            track.style.transform = `translateX(-${itemWidth * currentPosition}px)`; // mueve el carrusel hacia la derecha
        }
    });
});
</script>