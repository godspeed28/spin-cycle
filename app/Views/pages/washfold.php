<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="text-start d-flex flex-column bg-page">
    <h5 class="align-self-start" style="margin-left:150px;"><a href="/" class="hover-menu text-decoration-none text-info">Home</a> / <a class="text-decoration-none hover-menu text-info" href="/Pages/services">Services</a> / <?= $item ?></h5>
    <br>
    <h1 class="align-self-start fw-bold" style="margin-left:150px;"><?= $item ?></h1>
</div>

<hr class="text-info w-50 mx-auto">

<div class="container">
    <p class="text-info text-start"><b>[ What we offer ]</b></p>
    <p class="intro-home"><?= $item ?></p>
    <p style="border-left: 4px solid #0dcaf0; padding-left: 10px;">
        Layanan <?= $item ?> kami dirancang untuk memudahkan Anda dalam mengurus cucian harian. Kami menangani proses mencuci, mengeringkan, dan melipat pakaian Anda dengan standar kebersihan dan kerapihan tinggi. Sangat cocok untuk individu yang sibuk atau keluarga yang membutuhkan solusi praktis untuk urusan laundry.
    </p>
    <p class="intro-home fs-2">Layanan Laundry Wash and Fold Langsung ke Rumah Anda</p>
    Nikmati kemudahan layanan laundry cuci-lipat dari para ahli laundry profesional kami. Kami menyediakan layanan satu hari selesai atau di hari yang sama dengan jaminan kepuasan 100% untuk pelanggan di area layanan kami. Kami menggabungkan kualitas laundry premium dengan kenyamanan layanan antar-jemput cucian secara gratis. Anda juga bisa menggunakan drop box 24 jam di toko atau loker kami untuk menitipkan cucian kapan pun Anda mau. Pelanggan kami termasuk:
</div>

<hr class="text-info w-50 mx-auto">
<div class="container d-md-flex">
    <div class="container">
        <ul class="list-unstyled">
            <li><i class="bi bi-check-circle-fill text-primary"></i> Proses pembersihan ramah lingkungan</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Waktu penyelesaian cepat</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Layanan antar-jemput gratis</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Kualitas terbaik</li>
        </ul>
    </div>

    <hr class="text-info w-50 mx-auto d-md-none">

    <div class="container">
        <ul class="list-unstyled">
            <li><i class="bi bi-check-circle-fill text-primary"></i> Proses pembersihan ramah lingkungan</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Waktu penyelesaian cepat</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Layanan antar-jemput gratis</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Kualitas terbaik</li>
        </ul>
    </div>
</div>

<div class="container">
    <p class="intro-home fs-2">Bagaimana Cara Kerja Layanan Wash and Fold</p>
    <p>Wash and Fold, atau disebut juga laundry cuci-lipat, adalah solusi ideal untuk pakaian sehari-hari Anda yang tidak memerlukan dry cleaning. Kami akan mencuci, mengeringkan, dan melipat pakaian Anda dengan rapi dan bersih, menjadikannya siap pakai kapan pun dibutuhkan.</p>

    <p class="mb-4">Cukup gunakan layanan drop-off kami atau jadwalkan penjemputan di rumah Anda. Berikan instruksi khusus jika ada pakaian yang memerlukan penanganan berbeda. Tim profesional kami akan menangani sisanya dengan peralatan modern, detergen bebas bahan kimia berbahaya, dan air bersih jernih. Setiap pakaian akan diselesaikan dengan tangan oleh petugas kami dan dicek ulang untuk memastikan hasil yang sempurna — atau akan kami ulang tanpa biaya tambahan.</p>
    <a class="bg-info text-light p-2 fw-bold text-decoration-none" href="/Wash">Get Service Now</a>
</div>

<hr class="text-info w-50 mx-auto">

<?= $this->endSection(); ?>