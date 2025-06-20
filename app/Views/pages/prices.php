<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="text-start d-flex flex-column bg-page">
    <h5 class="align-self-start" style="margin-left:150px;"><a href="/" class="hover-menu text-decoration-none text-info">Home</a> / Prices</h5>
    <br>
    <h1 class="align-self-start fw-bold" style="margin-left:150px;">Prices</h1>
</div>

<hr class="text-info w-50 mx-auto">

<div class="container mt-5">
    <p class="text-info text-center"><b>Affordable Prices</b></p>
    <p class="intro-home text-center">Our Laundry Prices</p>
    <p class="text-muted text-center">Harga kami sederhana dan terjangkau yang ramah di kantong <br> dibandingkan dengan harga di pusat perbelanjaan.</p>
    <section class="py-3">
        <div class="container text-center">
            <div class="row g-4">
                <!-- Service 1 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card rounded-0 h-100 shadow-sm">
                        <img width="50" height="50" src="https://img.icons8.com/ios/50/washing.png" class="icon mx-auto mt-5" alt="washing" />
                        <div class="card-body">
                            <h5 class="card-title text">Regular Wash & Fold</h5>
                            <p class="text-muted">Washed and folded</p>
                            <h5 class="">From <span class="fs-4 fw-bold text-info"><?= ubahRp($hargaLayanan['Cuci Lipat']) ?></span>
                            </h5>
                        </div>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card rounded-0 h-100 shadow-sm">
                        <img width="50" height="50" src="https://img.icons8.com/ios/50/laundry-bag.png" class="icon mx-auto mt-5" alt="laundry-bag" />
                        <div class="card-body">
                            <h5 class="card-title text">Express Laundry</h5>
                            <p class="text-muted">Fast service</p>
                            <h5 class="">From <span class="fs-4 fw-bold text-info"><?= ubahRp(10000) ?></span>
                            </h5>
                            <br>
                        </div>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card rounded-0 h-100 shadow-sm">
                        <img width="50" height="50" src="https://img.icons8.com/ios/50/dryclean-short-cycle.png" class="icon mx-auto mt-5" alt="dryclean-short-cycle" />
                        <div class="card-body">
                            <h5 class="card-title text">Dry Cleaning</h5>
                            <p class="text-muted">Clean and crisp</p>
                            <h5 class="">From <span class="fs-4 fw-bold text-info"><?= ubahRp($hargaLayanan['Cuci Kering']) ?></span>
                            </h5>
                        </div>
                    </div>
                </div>

                <!-- Service 4 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card rounded-0 h-100 shadow-sm">
                        <img width="50" height="50" src="https://img.icons8.com/ios/50/iron.png" class="icon mx-auto mt-5" alt="ironing" />
                        <div class="card-body">
                            <h5 class="card-title text">Ironing</h5>
                            <p class="text-muted">Pressed clothes</p>
                            <h5 class="">From <span class="fs-4 fw-bold text-info"><?= ubahRp($hargaLayanan['Setrika Saja']) ?></span>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<hr class="text-info w-50 mx-auto">

<div class="container">
    <p class="text-info text-center"><b>Our Items Info</b></p>
    <p class="intro-home text-center">Full Items Table</p>
    <p class="text-muted text-center">
        Biaya laundry dihitung per kilogram, dengan tarif berbeda untuk setiap <br> jenis layanan seperti cuci lipat, cuci strika, atau setrika saja.
    </p>

    <div class="container text-white fs-5 fw-bold justify-content-center d-flex">
        <div class="p-3 m-3 bg-info" id="most">Most Popular Items</div>
        <div class="p-3 m-3 text-dark" id="full">Full Apparel List</div>
    </div>
    <style>
        .rounded-row td:first-child {
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
        }

        .rounded-row td:last-child {
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
        }

        #most,
        #full:hover {
            cursor: pointer;
        }
    </style>
    <div class="container" id="populerItems">
        <table class="table table-striped">
            <tbody>
                <?php foreach ($items as $item) : ?>
                    <tr class="rounded-row">
                        <td><?= remove_underscore($item['nama_pakaian']) ?></td>
                        <td><?= $item['berat_satuan'] ?> Kg</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="container d-none" id="fullItems">
        <table class="table table-striped">
            <tbody>
                <?php foreach ($itemsfull as $item) : ?>
                    <tr class="rounded-row">
                        <td><?= remove_underscore($item['nama']) ?></td>
                        <td><?= $item['berat'] ?> Kg</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<hr class="text-info w-50 mx-auto">
<script>
    const most = document.getElementById('most')
    const full = document.getElementById('full')
    const contentPopuler = document.getElementById('populerItems')
    const contentItems = document.getElementById('fullItems')

    full.addEventListener('click', function() {
        contentPopuler.classList.add('d-none');
        contentItems.classList.remove('d-none');

        most.classList.remove('bg-info', 'text-white');
        most.classList.add('text-dark');

        full.classList.remove('text-dark');
        full.classList.add('bg-info', 'text-white');
    });

    most.addEventListener('click', function() {
        contentItems.classList.add('d-none');
        contentPopuler.classList.remove('d-none');

        full.classList.remove('bg-info', 'text-white');
        full.classList.add('text-dark');

        most.classList.remove('text-dark');
        most.classList.add('bg-info', 'text-white');
    });
</script>

<?= $this->endSection(); ?>