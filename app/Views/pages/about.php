<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    &nbsp;&nbsp;<span class="text-info border-bottom" style="font-size: small;">ABOUT US</span>
    <section class="py-3 bg-white" id="about">
        <div class="container">
            <p class="text-muted">
                Kami adalah penyedia layanan laundry profesional yang berdiri sejak tahun <strong>2023</strong>. Kami hadir untuk mempermudah hidup Anda dengan layanan cuci, setrika, dan antar-jemput pakaian yang cepat, bersih, dan terpercaya.
                Dengan dukungan tenaga kerja berpengalaman dan peralatan modern, kami memastikan pakaian Anda dirawat dengan standar kualitas terbaik.
            </p>
            <a href="/Pages/services" class="btn btn-primary mt-3">Lihat Layanan Kami</a>
        </div>
    </section>


</div>
<?= $this->endSection(); ?>