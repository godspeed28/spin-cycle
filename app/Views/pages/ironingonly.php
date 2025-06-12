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
        Layanan *Ironing Only* kami diperuntukkan bagi Anda yang hanya membutuhkan jasa setrika tanpa pencucian. Ideal untuk pakaian yang sudah dicuci di rumah namun membutuhkan hasil setrika profesional agar lebih rapi dan siap pakai.
    </p>
    <p class="intro-home fs-2">Layanan Setrika Profesional — Rapi, Wangi, dan Cepat</p>
    Kami menggunakan setrika uap modern dan meja pres khusus untuk menjamin hasil maksimal. Dengan tenaga berpengalaman, setiap pakaian disetrika dengan detail dan hati-hati, lalu dilipat atau digantung sesuai permintaan Anda. Nikmati layanan antar-jemput gratis dan kemudahan lainnya dari kami:
</div>

<hr class="text-info w-50 mx-auto">

<div class="container d-md-flex">
    <div class="container">
        <ul class="list-unstyled">
            <li><i class="bi bi-check-circle-fill text-primary"></i> Hasil setrika rapi dan wangi</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Penanganan khusus bahan lembut dan sensitif</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Layanan antar-jemput gratis</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Bisa pilih lipat atau gantung</li>
        </ul>
    </div>

    <hr class="text-info w-50 mx-auto d-md-none">

    <div class="container">
        <ul class="list-unstyled">
            <li><i class="bi bi-check-circle-fill text-primary"></i> Ideal untuk pakaian kerja dan sekolah</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Proses cepat dan higienis</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Harga hemat, layanan maksimal</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Tersedia untuk perorangan dan bisnis</li>
        </ul>
    </div>
</div>

<div class="container">
    <p class="intro-home fs-2">Bagaimana Layanan Ironing Only Bekerja</p>
    <p>Cukup kumpulkan pakaian Anda yang ingin disetrika, lalu serahkan kepada kami melalui drop-off atau layanan penjemputan gratis. Tim kami akan menyetrika setiap item dengan hati-hati, memastikan tidak ada kusut atau kerusakan pada kain.</p>

    <p class="mb-4">Setelah disetrika, pakaian akan kami kemas dengan rapi sesuai permintaan Anda: dilipat dalam plastik atau digantung dengan hanger. Kami siap memenuhi kebutuhan rumah tangga, pekerja kantoran, hingga pelaku bisnis laundry outsourcing.</p>
    <a class="bg-info text-light p-2 fw-bold text-decoration-none" href="/Wash">Get Service Now</a>
</div>

<hr class="text-info w-50 mx-auto">

<?= $this->endSection(); ?>
