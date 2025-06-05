<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container" style="margin-top: 90px;">
    <div class="row">
        <div class="col">
            &nbsp;&nbsp;<span class="text-info border-bottom" style="font-size: small;">OUR SERVICES</span>
            <section class="py-3 mt-3 bg-light">
                <div class="container text-center">
                    <div class="row g-4">

                        <!-- Service 1 -->
                        <div class="col-md-6 col-lg-3">
                            <div class="card h-100 shadow-sm">
                                <img width="50" height="50" src="https://img.icons8.com/ios/50/washing.png" class="mx-auto mt-5" alt="washing" />
                                <div class="card-body">
                                    <h5 class="card-title">Regular Wash & Fold</h5>
                                    <p class="card-text">Cuci dan lipat pakaian sehari-hari dengan proses higienis dan cepat.</p>
                                    <a href="" class="bg-info text-light p-2 fw-bold text-decoration-none">More Info</a>
                                </div>
                            </div>
                        </div>

                        <!-- Service 2 -->
                        <div class="col-md-6 col-lg-3">
                            <div class="card h-100 shadow-sm">
                                <img width="50" height="50" src="https://img.icons8.com/ios/50/laundry-bag.png" class="mx-auto mt-5" alt="laundry-bag" />
                                <div class="card-body">
                                    <h5 class="card-title">Express Laundry</h5>
                                    <p class="card-text">Layanan cepat, pakaian bersih dan rapi dalam 4–6 jam saja.</p>
                                    <br>
                                    <a href="" class="bg-info text-light p-2 fw-bold text-decoration-none">More Info</a>
                                </div>
                            </div>
                        </div>

                        <!-- Service 3 (Dry Cleaning) - FIXED -->
                        <div class="col-md-6 col-lg-3">
                            <div class="card h-100 shadow-sm">
                                <img width="50" height="50" src="https://img.icons8.com/ios/50/dryclean-short-cycle.png" class="mx-auto mt-5" alt="dryclean-short-cycle" />
                                <div class="card-body">
                                    <h5 class="card-title">Dry Cleaning</h5>
                                    <p class="card-text">Perawatan profesional untuk jas, gaun pesta, dan bahan khusus lainnya.</p>
                                    <a href="" class="bg-info text-light p-2 fw-bold text-decoration-none">More Info</a>
                                </div>
                            </div>
                        </div>

                        <!-- Service 4 -->
                        <div class="col-md-6 col-lg-3">
                            <div class="card h-100 shadow-sm">
                                <img width="50" height="50" src="https://img.icons8.com/ios/50/iron.png" class="mx-auto mt-5" alt="ironing" />
                                <div class="card-body">
                                    <h5 class="card-title">Ironing Only</h5>
                                    <p class="card-text">Setrika pakaian kamu biar makin rapi dan siap dipakai.</p><br>
                                    <a href="" class="bg-info text-light p-2 fw-bold text-decoration-none">More Info</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </div>
    </div>

</div>
<?= $this->endSection(); ?>