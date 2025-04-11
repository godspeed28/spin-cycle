<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            &nbsp;&nbsp;<span class="text-info border-bottom" style="font-size: small;">OUR SERVICES</span>
            <section class="py-3 mt-3 bg-light">
                <div class="container text-center">
                    <div class="row g-4">

                        <!-- Service 1 -->
                        <div class="col-md-6 col-lg-3">
                            <div class="card h-100 shadow-sm">
                                <img src="https://img.icons8.com/color/96/000000/washing-machine.png" class="card-img-top w-50 mx-auto mt-3" alt="Wash & Fold">
                                <div class="card-body">
                                    <h5 class="card-title">Regular Wash & Fold</h5>
                                    <p class="card-text">Cuci dan lipat pakaian sehari-hari dengan proses higienis dan cepat.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Service 2 -->
                        <div class="col-md-6 col-lg-3">
                            <div class="card h-100 shadow-sm">
                                <img src="https://img.icons8.com/color/96/000000/clock--v1.png" class="card-img-top w-50 mx-auto mt-3" alt="Express Laundry">
                                <div class="card-body">
                                    <h5 class="card-title">Express Laundry</h5>
                                    <p class="card-text">Layanan cepat, pakaian bersih dan rapi dalam 4–6 jam saja.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Service 3 (Dry Cleaning) - FIXED -->
                        <div class="col-md-6 col-lg-3">
                            <div class="card h-100 shadow-sm">
                                <img src="https://cdn-icons-png.flaticon.com/512/869/869636.png" class="card-img-top w-50 mx-auto mt-3" alt="Dry Cleaning" style="height: 96px;">
                                <div class="card-body">
                                    <h5 class="card-title">Dry Cleaning</h5>
                                    <p class="card-text">Perawatan profesional untuk jas, gaun pesta, dan bahan khusus lainnya.</p>
                                </div>
                            </div>
                        </div>



                        <!-- Service 4 -->
                        <div class="col-md-6 col-lg-3">
                            <div class="card h-100 shadow-sm">
                                <img src="https://img.icons8.com/color/96/000000/iron.png" class="card-img-top w-50 mx-auto mt-3" alt="Ironing">
                                <div class="card-body">
                                    <h5 class="card-title">Ironing Only</h5>
                                    <p class="card-text">Setrika pakaian kamu biar makin rapi dan siap dipakai.</p>
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