// ===============================
// Custom Carousel & Dots
// ===============================
try {
  const dots = document.querySelectorAll("#customIndicators .dot");
  const carouselEl = document.querySelector("#cardCarousel");
  const carousel = carouselEl
    ? bootstrap.Carousel.getOrCreateInstance(carouselEl)
    : null;

  if (carousel && dots.length > 0) {
    // Update dot aktif saat slide berubah
    carouselEl.addEventListener("slide.bs.carousel", (e) => {
      try {
        dots.forEach((dot) => dot.classList.remove("active"));
        if (dots[e.to]) {
          dots[e.to].classList.add("active");
        }
      } catch (err) {
        console.error("Carousel dot update error:", err);
      }
    });

    // Klik dot untuk pindah slide
    dots.forEach((dot) => {
      dot.addEventListener("click", () => {
        const slideIndex = parseInt(dot.dataset.slide);
        if (!isNaN(slideIndex)) {
          try {
            carousel.to(slideIndex);
          } catch (err) {
            console.error("Carousel to slide error:", err);
          }
        }
      });
    });
  }
} catch (err) {
  console.error("Carousel initialization error:", err);
}

// ===============================
// Scroll to Top Button
// ===============================
try {
  const scrollBtn = document.getElementById("scrollTopBtn");

  if (scrollBtn) {
    if (window.location.pathname !== "/profil-customer") {
      window.addEventListener("scroll", () => {
        scrollBtn.style.display = window.scrollY > 100 ? "block" : "none";
      });

      scrollBtn.addEventListener("click", () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
      });
    } else {
      scrollBtn.style.display = "none"; // sembunyikan jika di /profil-customer
    }
  }
} catch (err) {
  console.error("Scroll button error:", err);
}

// ===============================
// Clock
// ===============================
try {
  const clockEl = document.getElementById("clock");

  if (clockEl) {
    function padZero(number) {
      return number < 10 ? "0" + number : number;
    }

    function updateClock() {
      try {
        const now = new Date();
        let hours = now.getHours();
        const minutes = now.getMinutes();
        const seconds = now.getSeconds();
        const ampm = hours >= 12 ? "PM" : "AM";

        hours = hours % 12 || 12; // 0 -> 12
        const formattedTime = `${padZero(hours)}:${padZero(minutes)}:${padZero(
          seconds
        )} ${ampm}`;
        clockEl.innerText = formattedTime;
      } catch (err) {
        console.error("Update clock error:", err);
      }
    }

    // Update setiap detik & panggil pertama kali
    updateClock();
    setInterval(updateClock, 1000);
  }
} catch (err) {
  console.error("Clock initialization error:", err);
}

// ===============================
// Navbar Toggler
// ===============================
try {
  const toggler = document.querySelector(".toggler");
  const bsCollapse = document.getElementById("navbarNav");

  if (toggler) {
    toggler.addEventListener("click", () => toggler.classList.toggle("open"));
  }

  if (bsCollapse) {
    const collapseInstance = new bootstrap.Collapse(bsCollapse, {
      toggle: false,
    });

    bsCollapse.addEventListener("hidden.bs.collapse", () => {
      toggler?.classList.remove("open");
    });

    bsCollapse.addEventListener("shown.bs.collapse", () => {
      toggler?.classList.add("open");
    });
  }
} catch (err) {
  console.error("Navbar toggler error:", err);
}
