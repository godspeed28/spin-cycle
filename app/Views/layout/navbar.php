<nav class="navbar mb-3 navbar-expand-lg fixed-top " style="background-color: white;">
    <div class="container">
        <a class="navbar-brand" href="#">
            <svg width="50" height="50" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" fill="none">
                <!-- Background Circle -->
                <circle cx="100" cy="100" r="90" stroke="#3498db" stroke-width="10" fill="white" />

                <!-- Spinning Drum Effect -->
                <circle cx="100" cy="100" r="50" stroke="#3498db" stroke-width="8" fill="none" stroke-dasharray="30 10"
                    transform="rotate(-15,100,100)" />

                <!-- Water Bubbles -->
                <circle cx="70" cy="50" r="10" fill="#3498db" />
                <circle cx="130" cy="40" r="7" fill="#3498db" />
                <circle cx="150" cy="70" r="5" fill="#3498db" />

            </svg><span class="fw-bold text-info"> Spin Cycle</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <?php if (session()->get('logged_in')) : ?>
                    <li class="nav-item">
                        <a role="button" class="nav-link"><i class="bi bi-person-circle" data-bs-toggle="modal" data-bs-target="#userSettingModal"></i></a>
                    </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == '') ? 'active-nav' : '' ?>" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == 'Pages/about') ? 'active-nav' : '' ?>" href="/Pages/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == 'Pages/services') ? 'active-nav' : '' ?>" href="/Pages/services">Services</a>
                </li>

                <?php if (session()->get('logged_in')) : ?>
                    <li class="nav-item">
                        <a href="/pesanan" class="nav-link"><i class="fa-solid fa-receipt" style="color:#0d6efd;"></i></a>
                    </li>
                <?php endif; ?>

            </ul>
            &nbsp;
            <a href="" class="bg-info p-2 text-light fw-bold text-decoration-none">Schedule a Pickup</a>
        </div>

    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="userSettingModal" tabindex="-1" aria-labelledby="userSettingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <form action="/user/update" method="post">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="userSettingModalLabel"><i class="bi bi-person-circle me-2"></i>Account Settings</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-4">
                    <!-- Username -->
                    <div class="mb-3">
                        <label for="username" class="form-label"><i class="bi bi-person-fill me-1"></i>Username</label>
                        <input type="text" class="form-control" id="username" name="username" required placeholder="Masukkan username">
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label"><i class="bi bi-envelope-fill me-1"></i>Email</label>
                        <input type="email" class="form-control" id="email" name="email" required placeholder="contoh@email.com">
                    </div>

                    <!-- Alamat -->
                    <div class="mb-3">
                        <label for="alamat" class="form-label"><i class="bi bi-geo-alt-fill me-1"></i>Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="2" required placeholder="Masukkan alamat lengkap"></textarea>
                    </div>

                    <!-- No Telepon -->
                    <div class="mb-3">
                        <label for="telp" class="form-label"><i class="bi bi-telephone-fill me-1"></i>No. Telepon</label>
                        <input type="tel" class="form-control" id="telp" name="telp" required placeholder="08xxxxxxxxxx">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>