<button id="scrollTopBtn" class="btn btn-info shadow">
    <i class="bi bi-arrow-up"></i>
</button>
<div class="container">
    <footer class="m-3 b-top bg-transparent text-dark py-4">
        <div class="container text-center">
            <p class="mb-1">&copy; <?= date('Y'); ?> <b class="text-info">Spin <span class="text-dark">Cycle</span></b>. All Rights Reserved.</p>

            <!-- Contact Info -->
            <p class="mb-1">
                <a href="mailto:info@spincycle.com" class="text-info text-decoration-none">info@spincycle.com</a> |
                <a href="tel:+62123456789" class="text-info text-decoration-none"><?= $tel ?></a>
            </p>

            <!-- Privacy & Terms -->
            <p class="mb-0">
                <a href="/Pages/privacy" class="text-info text-decoration-none">Privacy Policy</a> |
                <a href="/Pages/terms" class="text-info text-decoration-none">Terms of Service</a>
            </p>

            <!-- Social Media -->
            <div class="mt-2">
                <a href="https://facebook.com" class="text-dark me-3"><i class="bi bi-facebook"></i></a>
                <a href="https://instagram.com" class="text-dark me-3"><i class="bi bi-instagram"></i></a>
                <a href="https://twitter.com" class="text-dark"><i class="bi bi-twitter"></i></a>
            </div>
        </div>
    </footer>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (window.location.href.includes("/profil-customer")) {
            const scrollTopBtn = document.getElementById("scrollTopBtn");
            if (scrollTopBtn) {
                scrollTopBtn.style.display = "none"; // Sembunyikan tombol
            }
        }
    });
</script>