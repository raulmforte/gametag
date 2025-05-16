
<catalogos class=catalogos>
    <div class="catalogos-titulo">
        <h2 class="fuente-titulo">Catalogos</h2>
        <hr class="linea-azul">
    </div>
    <div class="catalogo-carousel-wrapper">
        <button class="catalogo-carousel-btn catalogo-carousel-prev">←</button>

        <div class="catalogo-carousel-viewport">
            <div class="catalogo-carousel-track" id="catalogoCarousel">
                @foreach($catalogos as $catalogo)
                <div class="catalogo-carousel-item">
                    <a href="{{ asset('catalogos/pdf/' . $catalogo['filename'] . '.pdf') }}" target="_blank">
                    <img src="{{ asset('catalogos/images/' . $catalogo['filename'] . '.jpg') }}" alt="{{ $catalogo['name'] }}">
                    </a>
                    <h5>{{ $catalogo['name'] }}</h5>
                </div>
                @endforeach
            </div>
        </div>

        <button class="catalogo-carousel-btn catalogo-carousel-next">→</button>
    </div>
</catalogos>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const track = document.getElementById('catalogoCarousel');
    const items = document.querySelectorAll('.catalogo-carousel-item');
    const nextBtn = document.querySelector('.catalogo-carousel-next');
    const prevBtn = document.querySelector('.catalogo-carousel-prev');

    let currentPosition = 0;
    const itemWidth = items[0].offsetWidth;
    const visibleItems = 4;
    const totalItems = items.length;

    nextBtn.addEventListener('click', () => {
        if (currentPosition < totalItems - visibleItems) {
            currentPosition++;
            track.style.transform = `translateX(-${itemWidth * currentPosition}px)`;
        }
    });

    prevBtn.addEventListener('click', () => {
        if (currentPosition > 0) {
            currentPosition--;
            track.style.transform = `translateX(-${itemWidth * currentPosition}px)`;
        }
    });
});
</script>
