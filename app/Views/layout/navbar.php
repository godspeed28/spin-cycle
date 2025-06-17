<div class="d-md-flex d-none border-bottom border-1 pr-3">
    <p class="mt-3 ps-3 mb-2 text-secondary" style="margin-right:50px;">50136 Kota Semarang, Semarang Tengah.</p>
    <p class="mt-3 mb-2 text-secondary" style="margin-right:50px;">Mon-Fri 08:00 AM - 05:00 PM</p>
    <p class="mt-3 mb-2 text-secondary" style="margin-right:50px;">info@spincycle.com</p>
    <p class="mt-3 mb-2" style="margin-right:50px; margin-left:100px"><i class="bi bi-telephone-fill text-info" style="font-size: 0.85rem; "></i> <b><a href="https://wa.me/<?= $phone ?>" class="underline-hover text-decoration-none text-dark" target="_blank"><?= $tel ?></a>
        </b></p>
    <a href="https://facebook.com" class="text-dark me-3 mt-3 mb-2"><i class="hover-info bi bi-facebook"></i></a>
    <a href="https://instagram.com" class="text-dark me-3 mt-3 mb-2"><i class="hover-info bi bi-instagram"></i></a>
    <a href="https://twitter.com" style="margin-right:50px;" class=" text-dark mt-3 mb-2"><i class="hover-info bi bi-twitter"></i></a>
    <div class="clock mt-3 mb-2" id="clock">00:00:00</div>

</div>
<!-- <hr class="d-none d-md-block text-dark fw-bold"> -->
<nav class="navbar px-3 navbar-expand-lg sticky-top" style="background-color: white;">
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
    <button class="navbar-toggler toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="toggler-icon line1"></span>
        <span class="toggler-icon line2"></span>
        <span class="toggler-icon line3"></span>
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
                    <a href="/OrderController"><i class="fas fs-4 fa-truck"></i></a>
                </h5>
                <span id="cart-quantity" class="badge bg-info position-absolute top-1 start-100 translate-middle rounded-pill">
                    <?= esc($count ?? 0) ?>
                </span>
            </div>


        </ul>
        &nbsp;
        <br>
        <div class="d-flex">
            <a href="/Wash" class="bg-info p-2 text-light fw-bold text-decoration-none">Schedule a Pickup</a>
            &nbsp;
            &nbsp;
            <style>
                .authhover:hover {
                    color: gray !important;
                }

                @media(min-width:768px) {
                    .dropdown-menu {
                        margin-left: -130px;
                    }
                }
            </style>
            <?php if (!session()->get('logged_in')) : ?>
                <div class="mt-2">
                    <a href="/Login" class="authhover text-dark fw-bold text-decoration-none" style="margin-right: 3px;">Login</a>
                    |
                    <a href="/Daftar" class="authhover text-dark fw-bold text-decoration-none" style="margin-left: 3px;">Daftar</a>
                </div>
                <!-- Icon User Settings -->
            <?php else : ?>
                <div class="dropdown">
                    <i style="margin:10px;" type="button" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle fas fs-4 fa-user-cog"></i>
                    <ul class="dropdown-menu" style=" margin-top: 10px;">
                        <li><a class="dropdown-item" href="#">Akun Saya</a></li>
                        <li><a class="dropdown-item" href="/OrderController/">Pesanan Saya</a></li>
                        <li><a class="dropdown-item text-danger" href="/Login/logout">Logout</a></li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</nav>