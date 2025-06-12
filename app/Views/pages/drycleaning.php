<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="text-start d-flex flex-column bg-page">
    <h5 class="align-self-start" style="margin-left:150px;"><a href="/" class="hover-menu text-decoration-none text-info">Home</a> / <a href="/Pages/services" class="text-decoration-none hover-menu text-info">Services</a> / <?= $item ?></h5>
    <br>
    <h1 class="align-self-start fw-bold" style="margin-left:150px;"><?= $item ?></h1>
</div>

<hr class="text-info w-50 mx-auto">

<div class="container">
    <p class="text-info text-start"><b>[ What we offer ]</b></p>
    <p class="intro-home"><?= $item ?></p>
    <p style="border-left: 4px solid #0dcaf0; padding-left: 10px;">
        Layanan Dry Cleaning kami hadir untuk merawat pakaian berharga Anda dengan metode pencucian profesional tanpa air. Sangat cocok untuk bahan sensitif seperti sutra, wol, jas, gaun, dan pakaian formal lainnya yang membutuhkan penanganan khusus.
    </p>
    <p class="intro-home fs-2">Dry Cleaning Profesional untuk Pakaian Berkualitas Anda</p>
    Dengan menggunakan pelarut khusus dan peralatan modern, kami menjamin hasil dry cleaning yang bersih, rapi, dan menjaga kualitas serat kain. Kami juga menyediakan layanan antar-jemput gratis demi kenyamanan Anda. Berikut keunggulan layanan dry cleaning kami:
</div>

<hr class="text-info w-50 mx-auto">

<div class="container d-md-flex">
    <div class="container">
        <ul class="list-unstyled">
            <li><i class="bi bi-check-circle-fill text-primary"></i> Aman untuk pakaian berbahan halus</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Hasil bersih dan bebas noda</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Layanan antar-jemput gratis</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Penanganan profesional dan teliti</li>
        </ul>
    </div>

    <hr class="text-info w-50 mx-auto d-md-none">

    <div class="container">
        <ul class="list-unstyled">
            <li><i class="bi bi-check-circle-fill text-primary"></i> Proses dry cleaning ramah lingkungan</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Cocok untuk jas, gaun pesta, dan batik</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Kualitas premium dengan inspeksi akhir</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Dijamin bebas kerusakan</li>
        </ul>
    </div>
</div>

<div class="container">
    <p class="intro-home fs-2">Bagaimana Dry Cleaning Bekerja</p>
    <p>Dry cleaning adalah proses pembersihan pakaian tanpa menggunakan air, melainkan pelarut khusus yang dapat mengangkat kotoran dan noda secara efektif tanpa merusak bahan. Cocok untuk pakaian formal dan kain mewah.</p>

    <p class="mb-4">Cukup serahkan pakaian Anda melalui layanan antar-jemput kami atau drop-off di lokasi terdekat. Tim profesional kami akan memproses setiap pakaian secara hati-hati, memastikan hasil akhir yang rapi dan bersih. Kami menjamin kepuasan Anda—jika tidak puas, kami akan ulangi prosesnya tanpa biaya tambahan.</p>
    <a class="bg-info text-light p-2 fw-bold text-decoration-none" href="/Wash">Get Service Now</a>
</div>

<hr class="text-info w-50 mx-auto">

<?= $this->endSection(); ?>