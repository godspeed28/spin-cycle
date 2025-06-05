 const dots = document.querySelectorAll('#customIndicators .dot');
  const carousel = bootstrap.Carousel.getInstance(document.querySelector('#cardCarousel'));
  
  // Update dot aktif saat slide berubah
  document.querySelector('#cardCarousel').addEventListener('slide.bs.carousel', e => {
    dots.forEach(dot => dot.classList.remove('active'));
    dots[e.to].classList.add('active');
  });

  // Kalau mau klik dot untuk pindah slide, bisa aktifkan pointer-events dan tambahkan event:
  dots.forEach(dot => {
    dot.addEventListener('click', () => {
      carousel.to(parseInt(dot.dataset.slide));
    });
  });