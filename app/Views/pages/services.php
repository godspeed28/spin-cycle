<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="text-start d-flex flex-column bg-page">
    <h5 class="align-self-start" style="margin-left:150px;"><a href="/" class="hover-menu text-decoration-none text-info">Home</a> / Services</h5>
    <br>
    <h1 class="align-self-start fw-bold" style="margin-left:150px;">Services</h1>

</div>

<hr class="text-info w-50 mx-auto">

<div class="container mt-5">
    <p class="text-info text-center"><b>Our Services</b></p>
    <p class="intro-home text-center">Dry Cleaning & Laundry,
        Free Delivery</p>
    <section class="py-3">
        <div class="container text-center">
            <div class="row g-4">
                <!-- Service 1 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card rounded-0 h-100 shadow-sm">
                        <img width="50" height="50" src="https://img.icons8.com/ios/50/washing.png" class="icon mx-auto mt-5" alt="washing" />
                        <div class="card-body">
                            <h5 class="card-title text">Regular Wash & Fold</h5>
                            <p class="card-text">Cuci dan lipat pakaian sehari-hari dengan proses higienis dan cepat.</p>
                            <a href="" class="bg-info text-light p-2 fw-bold text-decoration-none">More Info</a>
                        </div>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card rounded-0 h-100 shadow-sm">
                        <img width="50" height="50" src="https://img.icons8.com/ios/50/laundry-bag.png" class="icon mx-auto mt-5" alt="laundry-bag" />
                        <div class="card-body">
                            <h5 class="card-title text">Express Laundry</h5>
                            <p class="card-text">Layanan cepat, pakaian bersih dan rapi dalam 4–6 jam saja.</p>
                            <br>
                            <a href="" class="bg-info text-light p-2 fw-bold text-decoration-none">More Info</a>
                        </div>
                    </div>
                </div>

                <!-- Service 3 (Dry Cleaning) - FIXED -->
                <div class="col-md-6 col-lg-3">
                    <div class="card rounded-0 h-100 shadow-sm">
                        <img width="50" height="50" src="https://img.icons8.com/ios/50/dryclean-short-cycle.png" class="icon mx-auto mt-5" alt="dryclean-short-cycle" />
                        <div class="card-body">
                            <h5 class="card-title text">Dry Cleaning</h5>
                            <p class="card-text">Perawatan profesional untuk jas, gaun pesta, dan bahan khusus lainnya.</p>
                            <a href="" class="bg-info text-light p-2 fw-bold text-decoration-none">More Info</a>
                        </div>
                    </div>
                </div>

                <!-- Service 4 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card rounded-0 h-100 shadow-sm">
                        <img width="50" height="50" src="https://img.icons8.com/ios/50/iron.png" class="icon mx-auto mt-5" alt="ironing" />
                        <div class="card-body">
                            <h5 class="card-title text">Ironing Only</h5>
                            <p class="card-text">Setrika pakaian kamu biar makin rapi dan siap dipakai.</p><br>
                            <a href="" class="bg-info text-light p-2 fw-bold text-decoration-none">More Info</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

<hr class="text-info w-50 mx-auto">

<div class="container">
    <p class="text-info text-center"><b>[ Why you’ll love us ]</b></p>
    <p class="intro-home text-center">Our Features</p>
    <div class="container">
        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="card rounded-0 card-2 bg-light border-0 shadow-none text-dark " style="backdrop-filter: blur(10px);">
                    <div class="card-body">
                        <i class="about-circle fas fa-leaf fs-3 text-info"></i>
                        <h5 class="card-title mt-3">Eco-Friendly Dry Cleaning</h5>
                        <p class="card-text">
                            Our commitment to eco-friendly practices extends beyond our use of 100% toxin-free cleaning techniques. Our company is also incredibly proud to be a carbon-neutral business. </p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="card rounded-0 card-2 bg-transparent border-0 text-dark" style="backdrop-filter: blur(10px);">
                    <div class="card-body">
                        <i class="fas fa-shirt about-circle text-info fs-3" style="font-size: 2rem;"></i>
                        <h5 class="card-title mt-3">Wash & Fold</h5>
                        <p class="card-text py-2">
                            We are excited to offer quality shoe repair & bag services alongside our second to none dry cleaning and wash & fold service. Our staff use the highest quality products. </p>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="card rounded-0 card-2 bg-light border-0 shadow-none text-dark" style="backdrop-filter: blur(10px);">
                    <div class="card-body">
                        <i class="about-circle bi bi-box text-info fs-3"></i>
                        <h5 class="card-title mt-3">Package Delivery</h5>
                        <p class="card-text py-1">
                            Laundry services are considerably the most convenient services that people look for. Laundry is one of the most difficult chores that we have to deal with on a regular basis. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr class="text-info w-50 mx-auto">


<?= $this->endSection(); ?>