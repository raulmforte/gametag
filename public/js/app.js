
/*
window.addEventListener('scroll', function () {
    const fixedHeader = document.querySelector('.fixed-header');
    const topBar = document.querySelector('.top-bar');

    if (window.scrollY > 0) {

      fixedHeader.style.top = "0";
      topBar.style.top = "-50px";
      topBar.style.opacity = "0";
    } else {

      fixedHeader.style.top = "50px";
      topBar.style.top = "0";
      topBar.style.opacity = "1";
    }
  });*/



  function animateNumber(id, endValue, duration) {
    let startValue = 0;
    let startTime = null;

    function animate(time) {
        if (!startTime) startTime = time;
        const progress = time - startTime;

        const currentValue = Math.min(Math.floor(progress / duration * endValue), endValue);
        document.querySelector(id).textContent = currentValue;

        if (progress < duration) {
            requestAnimationFrame(animate);
        } else {
            document.querySelector(id).textContent = endValue;
        }
    }

    requestAnimationFrame(animate);
}

window.onload = function() {
    animateNumber('#clientes', 30000, 1500);
    animateNumber('#paises', 160, 1500);
    animateNumber('#referencias', 30000, 1500);
    animateNumber('#almacen', 10000, 1500);
};

window.addEventListener('scroll', function () {
  const fixedHeader = document.querySelector('.fixed-header');

  // Cuando el usuario haga scroll hacia abajo
  if (window.scrollY > 0) {
      // El header blanco se moverá hacia arriba para cubrir el header negro
      fixedHeader.style.top = '0px';  // El header blanco sube y cubre al negro
  } else {
      // Cuando el usuario vuelve arriba, el header blanco vuelve a su posición original
      fixedHeader.style.top = '30px';  // El header blanco se coloca debajo del negro

  }
});

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


document.addEventListener("DOMContentLoaded", function () {
  const container = document.querySelector(".carrusel-historia .carousel-inner-custom");
  const items = document.querySelectorAll(".carrusel-historia .carousel-item-custom");
  const prevBtn = document.querySelector(".carrusel-historia .carousel-prev-custom");
  const nextBtn = document.querySelector(".carrusel-historia .carousel-next-custom");

  let currentIndex = 0;

  const getItemsPerView = () => {
    if (window.innerWidth < 576) return 1;
    if (window.innerWidth < 992) return 2;
    return 4;
  };

  const updateCarousel = () => {
    const itemWidth = items[0].offsetWidth;
    const scrollAmount = currentIndex * itemWidth;
    container.style.transform = `translateX(-${scrollAmount}px)`;
  };

  const next = () => {
    const maxIndex = items.length - getItemsPerView();
    if (currentIndex < maxIndex) {
      currentIndex++;
      updateCarousel();
    }
  };

  const prev = () => {
    if (currentIndex > 0) {
      currentIndex--;
      updateCarousel();
    }
  };

  nextBtn.addEventListener("click", next);
  prevBtn.addEventListener("click", prev);

  // Auto slide
  setInterval(() => {
    const maxIndex = items.length - getItemsPerView();
    currentIndex = (currentIndex < maxIndex) ? currentIndex + 1 : 0;
    updateCarousel();
  }, 5000);

  window.addEventListener("resize", () => {
    currentIndex = 0;
    updateCarousel();
  });

  updateCarousel();
});