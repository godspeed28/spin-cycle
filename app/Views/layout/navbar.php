<nav class="navbar mb-3 navbar-expand-lg bg-body-transparent">
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
                <a class="nav-link <?= (uri_string() == '') ? 'active' : '' ?>" href="/">Home</a>
                <a class="nav-link <?= (uri_string() == 'Pages/about') ? 'active' : '' ?>" href="/Pages/about">About</a>
                <a class="nav-link <?= (uri_string() == 'Pages/services') ? 'active' : '' ?>"
                    href="/Pages/services">Services</a>
                <a class="nav-link <?= (uri_string() == 'Pages/contact') ? 'active' : '' ?>"
                    href="/Pages/contact">Contact</a>
                <?php if (!session()->get('logged_in')) : ?>
                    <a href="/Login/" id="login" class="btn btn-primary" style="margin-left: 15px;">Login</a>
                    <a href="/Daftar/" id="daftar" class="btn btn-outline-primary" style="margin-left: 10px;">Daftar</a>
                <?php else : ?>
                    <a href="/Login/logout" id="logout" class="btn btn-danger" style="margin-left: 10px;">Logout</a>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>