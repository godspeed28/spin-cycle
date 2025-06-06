// Ambil elemen indikator dot dan carousel
const dots = document.querySelectorAll('#customIndicators .dot');
const carouselEl = document.querySelector('#cardCarousel');

// Buat atau ambil instance carousel jika elemen ada
const carousel = carouselEl ? bootstrap.Carousel.getOrCreateInstance(carouselEl) : null;

// Pasang event listener hanya jika carousel dan dots ada
if (carousel && dots.length > 0) {
  // Update dot aktif saat slide berubah
  carouselEl.addEventListener('slide.bs.carousel', e => {
    dots.forEach(dot => dot.classList.remove('active'));
    if (dots[e.to]) {
      dots[e.to].classList.add('active');
    }
  });

  // Klik dot untuk pindah slide
  dots.forEach(dot => {
    dot.addEventListener('click', () => {
      const slideIndex = parseInt(dot.dataset.slide);
      if (!isNaN(slideIndex)) {
        carousel.to(slideIndex);
      }
    });
  });
}

// Scroll to top button
const scrollBtn = document.getElementById("scrollTopBtn");

if (scrollBtn) {
  window.addEventListener('scroll', () => {
    if (window.scrollY > 100) {
      scrollBtn.style.display = "block";
    } else {
      scrollBtn.style.display = "none";
    }
  });

  scrollBtn.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
}

// jam
function updateClock() {
    const now = new Date();
    let hours = now.getHours();
    const minutes = now.getMinutes();
    const seconds = now.getSeconds();

    const ampm = hours >= 12 ? 'PM' : 'AM';

    // Ubah jam menjadi format 12 jam
    hours = hours % 12;
    hours = hours ? hours : 12; // Jam 0 diubah jadi 12

    const formattedTime = `${padZero(hours)}:${padZero(minutes)}:${padZero(seconds)} ${ampm}`;
    document.getElementById('clock').innerText = formattedTime;
}

function padZero(number) {
    return number < 10 ? '0' + number : number;
}

// Update setiap detik
setInterval(updateClock, 1000);

// Panggil pertama kali saat halaman dimuat
updateClock();
