<revistas class=revistas>
    <div class="revistas-titulo">
    <h2 class="fuente-titulo">{{ __('Magazines') }}</h2>
    <hr class="linea-azul">
    </div>
    <div class="revista-carousel-wrapper">
        <button class="revista-carousel-btn revista-carousel-prev">←</button>

        <div class="revista-carousel-viewport">
            <div class="revista-carousel-track" id="revistaCarousel">
                @foreach($revistas as $revista)
                <div class="revista-carousel-item">
                    <a href="{{ asset('revistas/pdf/' . $revista . '.pdf') }}" target="_blank">
                    <img src="{{ asset('revistas/images/' . $revista . '.jpg') }}" alt="{{ $revista }}">
                    </a>
                    <h5>{{ $revista }}</h5>
                </div>
                @endforeach
            </div>
        </div>

        <button class="revista-carousel-btn revista-carousel-next">→</button>
    </div>
</revistas>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const track = document.getElementById('revistaCarousel');
    const items = document.querySelectorAll('.revista-carousel-item');
    const nextBtn = document.querySelector('.revista-carousel-next');
    const prevBtn = document.querySelector('.revista-carousel-prev');

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