<style>
.noticias-carrusel-container {
    position: relative;
    max-width: 2000px;
    margin: 0 auto;
    padding: 1rem;
    overflow: hidden;
    background: #fff;
    border-radius: 6px;
    box-shadow: 0 0 10px rgb(0 0 0 / 0.1);
}

.carrusel-viewport {
    overflow: hidden;
    width: 100%;
}

.carrusel-track {
    display: flex;
    transition: transform 0.4s ease;
    gap: 1rem; /* 1rem = 16px aprox */
}
.carrusel-item {
    flex: 0 0 100%; /* por defecto 1 item */
    box-sizing: border-box;
    background: #f9f9f9;
    padding: 0.5rem;
    border-radius: 4px;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.carrusel-item img {
    width: 100%;
    height: 350px;
    object-fit: cover;
    border-radius: 4px;
}

.carrusel-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: #ff6600;
    border: none;
    color: white;
    font-size: 2rem;
    padding: 0.25rem 0.75rem;
    cursor: pointer;
    border-radius: 4px;
    user-select: none;
    z-index: 10;
}

.carrusel-prev {
    left: 10px;
}

.carrusel-next {
    right: 10px;
}

.carrusel-btn:disabled {
    background: #ccc;
    cursor: not-allowed;
}

/* Tablet: 2 items visibles */
@media (min-width: 600px) {
    .carrusel-item {
        flex: 0 0 48%; /* casi la mitad - gap */
    }
}

/* Desktop: 4 items visibles */

@media (min-width: 1024px) {
    .carrusel-item {
        flex: 0 0 calc((100% - 3rem) / 4); /* 4 items con gaps */
    }
}
</style>

<div class="mb-5 mt-5">
    <h1 class="text-center mt-5 mb-5">Noticias</h1>
    <div class="noticias-carrusel-container">
        <button class="carrusel-btn carrusel-prev" aria-label="Noticias anteriores">‹</button>
        <div class="carrusel-viewport">
            <div class="carrusel-track">
                @foreach($noticias as $noticia)
                <div class="carrusel-item">
                    <a href="{{ route('news2_mostrar', $noticia->id) }}" class="text-decoration-none text-dark d-block">
                        <img src="{{ asset('fotos/' . $noticia->imagen) }}" alt="{{ $noticia->titular }}" />
                        <h5 class="mt-2">{{ $noticia->titular }}</h5>
                        <p class="small">{!! Str::limit($noticia->descripcion, 100) !!}</p>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        <button class="carrusel-btn carrusel-next" aria-label="Noticias siguientes">›</button>
    </div>

    <div class="d-flex justify-content-center mt-5">
        <a href="{{ route('news2') }}" class="btn btn-warning px-4"
            style="background-color: #ff6600; border:none; color: white; font-weight: 600;">
            Más noticias
        </a>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const track = document.querySelector(".carrusel-track");
    const items = document.querySelectorAll(".carrusel-item");
    const prevBtn = document.querySelector(".carrusel-prev");
    const nextBtn = document.querySelector(".carrusel-next");

    let currentIndex = 0;

    // Función para calcular cuántos ítems se ven según pantalla
    function getItemsVisible() {
        const width = window.innerWidth;
        if (width >= 1024) return 4;
        if (width >= 600) return 2;
        return 1;
    }

    function updateCarousel() {
        const itemsVisible = getItemsVisible();
        const style = getComputedStyle(track);
        const gap = parseInt(style.gap) || 0;
        const itemWidth = items[0].offsetWidth + gap;
        const maxIndex = Math.ceil(items.length / itemsVisible) - 1;

        if (currentIndex > maxIndex) currentIndex = maxIndex < 0 ? 0 : maxIndex;

        const moveX = currentIndex * itemsVisible * itemWidth;
        track.style.transform = `translateX(-${moveX}px)`;

        prevBtn.disabled = currentIndex === 0;
        nextBtn.disabled = currentIndex >= maxIndex;
    }

    nextBtn.addEventListener("click", () => {
        const itemsVisible = getItemsVisible();
        const maxIndex = Math.ceil(items.length / itemsVisible) - 1;
        if (currentIndex < maxIndex) {
            currentIndex++;
            updateCarousel();
        }
    });

    prevBtn.addEventListener("click", () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateCarousel();
        }
    });

    window.addEventListener("resize", () => {
        currentIndex = 0;
        updateCarousel();
    });

    updateCarousel();
});
</script>