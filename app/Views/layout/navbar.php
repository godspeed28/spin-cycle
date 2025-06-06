<div class="d-md-flex d-none p-3">
    <p class="mt-2 mb-1 text-secondary" style="margin-right:100px;">50136 Kota Semarang, Semarang Tengah.</p>
    <p class="mt-2 mb-1 text-secondary" style="margin-right:100px;">Mon-Fri 08:00 AM - 05:00 PM</p>
    <p class="mt-2 mb-1 text-secondary" style="margin-right:100px;">info@spincycle.com</p>
    <p class="mt-2 mb-1" style="margin-right:80px;"><i class="bi bi-telephone-fill text-info" style="font-size: 0.85rem; "></i> <b><?= $tel ?></b></p>
    <a href="https://facebook.com" class="text-dark me-3 mt-2 mb-1"><i class="bi bi-facebook"></i></a>
    <a href="https://instagram.com" class="text-dark me-3 mt-2 mb-1"><i class="bi bi-instagram"></i></a>
    <a href="https://twitter.com" style="margin-right:80px;" class=" text-dark mt-2 mb-1"><i class="bi bi-twitter"></i></a>
    <div class="clock mt-2 mb-1" id="clock">00:00:00</div>

</div>
<hr class="d-none d-md-block text-dark fw-bold">
<nav class="navbar mb-3 p-3 navbar-expand-lg sticky-top" style="background-color: white;">
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

        </svg><span class="fw-bold text-info"> Spin <span class="text-dark">Cycle</span> </span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">

            <li class="nav-item">
                <a class="nav-link <?= (uri_string() == '') ? 'active-nav' : '' ?>" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= (uri_string() == 'Pages/about') ? 'active-nav' : '' ?>" href="/Pages/about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= (uri_string() == 'Pages/services') ? 'active-nav' : '' ?>" href="/Pages/services">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= (uri_string() == 'Pages/contact') ? 'active-nav' : '' ?>" href="/Pages/contact">Contact</a>
            </li>

            <div class="cart-icon d-flex align-items-center position-relative ms-md-5 me-4 mt-0" style="margin-right: 10px;">
                <h5 class="mb-0">
                    <i class="bi bi-cart fs-3 text-dark"></i>
                </h5>
                <span id="cart-quantity" class="badge bg-info position-absolute top-1 start-100 translate-middle rounded-pill">
                    0
                </span>
            </div>


        </ul>
        &nbsp;
        <br>
        <a href="" class="bg-info p-2 text-light fw-bold text-decoration-none">Schedule a Pickup</a>
    </div>
</nav>

<!-- Modal -->
<!-- <div class="modal fade" id="userSettingModal" tabindex="-1" aria-labelledby="userSettingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <form action="/user/update" method="post">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="userSettingModalLabel"><i class="bi bi-person-circle me-2"></i>Account Settings</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> -->

<!-- <div class="modal-body p-4"> -->
<!-- Username -->
<!-- <div class="mb-3">
                        <label for="username" class="form-label"><i class="bi bi-person-fill me-1"></i>Username</label>
                        <input type="text" class="form-control" id="username" name="username" required placeholder="Masukkan username">
                    </div> -->

<!-- Email -->
<!-- <div class="mb-3">
                        <label for="email" class="form-label"><i class="bi bi-envelope-fill me-1"></i>Email</label>
                        <input type="email" class="form-control" id="email" name="email" required placeholder="contoh@email.com">
                    </div> -->

<!-- Alamat -->
<!-- <div class="mb-3">
                        <label for="alamat" class="form-label"><i class="bi bi-geo-alt-fill me-1"></i>Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="2" required placeholder="Masukkan alamat lengkap"></textarea>
                    </div> -->

<!-- No Telepon -->
<!-- <div class="mb-3">
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
</div> -->