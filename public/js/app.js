function animateNumber(id, endValue, duration) {
  let startValue = 0;
  let startTime = null;

  function animate(time) {
      if (!startTime) startTime = time;
      const progress = time - startTime;

      const currentValue = Math.min(Math.floor(progress / duration * endValue), endValue); // calcula el valor actual
      document.querySelector(id).textContent = currentValue; // actualiza el contenido del elemento

      if (progress < duration) {
          requestAnimationFrame(animate); // continúa la animación
      } else {
          document.querySelector(id).textContent = endValue; // asegura que el valor final se establezca
      }
  }

  requestAnimationFrame(animate); // inicia la animación
}

window.onload = function() {
  animateNumber('#clientes', 30000, 1500); // anima el número de clientes
  animateNumber('#paises', 160, 1500); // anima el número de países
  animateNumber('#referencias', 30000, 1500); // anima el número de referencias
  animateNumber('#almacen', 10000, 1500); // anima el número de almacenes
};

document.addEventListener('DOMContentLoaded', () => {
  const track = document.getElementById('catalogoCarousel');
  const items = document.querySelectorAll('.catalogo-carousel-item');
  const nextBtn = document.querySelector('.catalogo-carousel-next');
  const prevBtn = document.querySelector('.catalogo-carousel-prev');

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

document.addEventListener("DOMContentLoaded", function () {
const container = document.querySelector(".carrusel-historia .carousel-inner-custom");
const items = document.querySelectorAll(".carrusel-historia .carousel-item-custom");
const prevBtn = document.querySelector(".carrusel-historia .carousel-prev-custom");
const nextBtn = document.querySelector(".carrusel-historia .carousel-next-custom");

let currentIndex = 0;

const getItemsPerView = () => {
  if (window.innerWidth < 576) return 1; // 1 elemento visible en pantallas pequeñas
  if (window.innerWidth < 992) return 2; // 2 elementos visibles en pantallas medianas
  return 4; // 4 elementos visibles en pantallas grandes
};

const updateCarousel = () => {
  const itemWidth = items[0].offsetWidth; // ancho de cada elemento
  const scrollAmount = currentIndex * itemWidth; // cantidad de desplazamiento
  container.style.transform = `translateX(-${scrollAmount}px)`; // mueve el carrusel
};

const next = () => {
  const maxIndex = items.length - getItemsPerView(); // índice máximo permitido
  if (currentIndex < maxIndex) {
    currentIndex++;
    updateCarousel(); // actualiza el carrusel
  }
};

const prev = () => {
  if (currentIndex > 0) {
    currentIndex--;
    updateCarousel(); // actualiza el carrusel
  }
};

nextBtn.addEventListener("click", next); // evento para el botón siguiente
prevBtn.addEventListener("click", prev); // evento para el botón anterior

// Auto slide
setInterval(() => {
  const maxIndex = items.length - getItemsPerView();
  currentIndex = (currentIndex < maxIndex) ? currentIndex + 1 : 0; // alterna entre los elementos
  updateCarousel();
}, 5000); // intervalo de 5 segundos

window.addEventListener("resize", () => {
  currentIndex = 0; // reinicia el índice al cambiar el tamaño de la ventana
  updateCarousel();
});

updateCarousel(); // inicializa el carrusel
});