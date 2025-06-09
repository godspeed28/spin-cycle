<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="text-start d-flex flex-column bg-page">
    <h5 class="align-self-start" style="margin-left:150px;"><a href="/" class="hover-menu text-decoration-none text-info">Home</a> / About</h5>
    <br>
    <h1 class="align-self-start fw-bold" style="margin-left:150px;">About</h1>
</div>

<hr class="text-info w-50 mx-auto">

<div class="container d-md-flex text-center mt-5 mb-5">

    <div class="container position-relative">
        <img class="img-fluid" height="470" width="600" src="/img/clean-clothes.jpg" alt="">
        <img src="/img/classify-clothes.jpg" alt="Gambar baru"
            class="position-absolute bottom-0 start-0 ukuran-img-about">
    </div>

    <div class="container text-start">

        <b class="text-info">2 Years of Experience</b>
        <p class="intro-home">Your Dry Cleaning and Laundry. Done.</p>
        <p>Kami adalah profesional dalam bisnis laundry dan dry cleaning, yang berarti kami selalu mengikuti perkembangan teknologi, metode pembersihan, dan solusi terbaru untuk menangani noda atau kain halus. Selain itu, kami mempertahankan standar integritas bisnis tertinggi dengan mematuhi peraturan lokal dan nasional serta aturan keselamatan lingkungan. Kami bersemangat untuk mengubah cara anda berpikir tentang laundry!</p>


        <div class="container">
            <ul class="list-unstyled">
                <li><i class="bi bi-check-circle-fill text-primary"></i> Eco-friendly cleaning processes</li>
                <li><i class="bi bi-check-circle-fill text-primary"></i> Fast turnaround time</li>
                <li><i class="bi bi-check-circle-fill text-primary"></i> Free pick-up and delivery service</li>
                <li><i class="bi bi-check-circle-fill text-primary"></i> Best Quality</li>
            </ul>
        </div>

    </div>

</div>

<hr class="text-info w-50 mx-auto">

<div class="container">
    <p class="text-info text-center"><b>Our Advantages</b></p>
    <p class="intro-home text-center">Why Choose Us</p>
    <div class="container my-5">
        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="card bg-transparent border-0 shadow-none text-dark" style="backdrop-filter: blur(10px);">
                    <div class="card-body">
                        <i class="about-circle bi bi-lightbulb text-info fs-3"></i>
                        &nbsp;
                        <h5 class="card-title mt-3 text">Personalized Experience</h5>
                        <br><br>
                        <p class="card-text">
                            Kami sangat memperhatikan pakaian Anda, dengan memisahkan berdasarkan jenis kain dan memberikan pakaian instan untuk membuat Anda tampil menonjol.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="card bg-transparent border-0 shadow-none text-dark" style="backdrop-filter: blur(10px);">
                    <div class="card-body">
                        <i class="about-circle bi bi-tags text-info fs-3"></i>
                        &nbsp;
                        <h5 class="card-title mt-3 text">Affordable Pricing</h5>
                        <br><br>
                        <p class="card-text">
                            Harga yang ramah di kantong adalah salah satu keunggulan kami. Tersedia pilihan antara 2 jenis harga.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="card bg-transparent border-0 shadow-none text-dark" style="backdrop-filter: blur(10px);">
                    <div class="card-body">
                        <i class="about-circle bi bi-phone text-info fs-3"></i>
                        &nbsp;
                        <h5 class="card-title mt-3 text">Convenience</h5>
                        <br><br>
                        <p class="card-text">
                            Hanya dengan satu sentuhan tombol, laundry Anda selesai, memberi Anda waktu luang untuk dihabiskan bersama keluarga dan teman.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-md-4">
                <div class="card bg-transparent border-0 shadow-none text-dark" style="backdrop-filter: blur(10px);">
                    <div class="card-body">
                        <i class="about-circle bi bi-award text-info fs-3"></i>
                        &nbsp;
                        <h5 class="card-title mt-3 text">Quality</h5>
                        <br><br>
                        <p class="card-text">
                            Kami menggunakan produk terbaik di kelasnya, untuk memastikan pakaian favorit Anda selalu siap dikenakan.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="col-md-4">
                <div class="card bg-transparent border-0 shadow-none text-dark" style="backdrop-filter: blur(10px);">
                    <div class="card-body">
                        <i class="about-circle bi bi-truck text-info fs-3"></i>
                        &nbsp;
                        <h5 class="card-title mt-3 text">Express Delivery</h5>
                        <br><br>
                        <p class="card-text">
                            Dengan layanan antar super cepat kami, laundry Anda akan selesai dalam waktu kurang dari 8 jam.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="col-md-4">
                <div class="card bg-transparent border-0 shadow-none text-dark" style="backdrop-filter: blur(10px);">
                    <div class="card-body">
                        <i class="about-circle bi bi-bag-check text-info fs-3"></i>
                        &nbsp;
                        <h5 class="card-title mt-3 text">Instant Order Update</h5>
                        <br><br>
                        <p class="card-text">
                            Pembaruan rutin atas pesanan Anda, agar Anda dapat memantau laundry dan merencanakan dengan lebih baik.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<hr class="text-info w-50 mx-auto">

<?= $this->endSection(); ?>