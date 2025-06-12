<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="text-start d-flex flex-column bg-page">
    <h5 class="align-self-start" style="margin-left:150px;"><a href="/" class="hover-menu text-decoration-none text-info">Home</a> / <span class="text-info">Services</span> / <?= $item ?></h5>
    <br>
    <h1 class="align-self-start fw-bold" style="margin-left:150px;"><?= $item ?></h1>
</div>

<hr class="text-info w-50 mx-auto">

<div class="container">
    <p class="text-info text-start"><b>[ What we offer ]</b></p>
    <p class="intro-home"><?= $item ?></p>
    <p style="border-left: 4px solid #0dcaf0; padding-left: 10px;">
        Layanan Express Laundry kami dirancang untuk Anda yang membutuhkan pakaian bersih dalam waktu cepat. Dengan proses pencucian dan pengeringan yang efisien, kami menjamin hasil yang bersih, wangi, dan rapi hanya dalam beberapa jam.
    </p>
    <p class="intro-home fs-2">Express Laundry Service — Cepat, Bersih, dan Praktis</p>
    Nikmati layanan laundry ekspres dengan kualitas terbaik. Kami menawarkan layanan cuci kilat dengan waktu penyelesaian hanya dalam satu hari, bahkan dalam hitungan jam. Cocok untuk pelanggan yang memiliki jadwal padat namun tetap ingin tampil bersih dan segar. Kami juga menyediakan layanan antar-jemput gratis untuk kenyamanan Anda. Beberapa keuntungan layanan kami:
</div>

<hr class="text-info w-50 mx-auto">

<div class="container d-md-flex">
    <div class="container">
        <ul class="list-unstyled">
            <li><i class="bi bi-check-circle-fill text-primary"></i> Proses pencucian cepat dan efisien</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Kualitas hasil cucian terjamin</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Layanan antar-jemput gratis</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Menggunakan deterjen ramah lingkungan</li>
        </ul>
    </div>

    <hr class="text-info w-50 mx-auto d-md-none">

    <div class="container">
        <ul class="list-unstyled">
            <li><i class="bi bi-check-circle-fill text-primary"></i> Proses pencucian cepat dan efisien</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Kualitas hasil cucian terjamin</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Layanan antar-jemput gratis</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Menggunakan deterjen ramah lingkungan</li>
        </ul>
    </div>
</div>

<div class="container">
    <p class="intro-home fs-2">Bagaimana Layanan Express Laundry Bekerja</p>
    <p>Layanan Express Laundry adalah solusi ideal bagi Anda yang membutuhkan pakaian bersih dan wangi dalam waktu singkat. Cukup serahkan cucian Anda kepada kami melalui drop-off atau penjemputan, dan kami akan mengerjakannya dengan cepat menggunakan teknologi modern serta tenaga ahli berpengalaman.</p>

    <p class="mb-4">Setiap cucian diproses dengan perhatian khusus, menggunakan air bersih dan deterjen aman tanpa bahan kimia berbahaya. Kami memastikan setiap pakaian kembali dalam kondisi prima, siap pakai, dan tepat waktu.</p>
    <a class="bg-info text-light p-2 fw-bold text-decoration-none" href="/Wash">Get Service Now</a>
</div>

<hr class="text-info w-50 mx-auto">

<?= $this->endSection(); ?>
