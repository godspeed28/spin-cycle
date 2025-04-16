<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    &nbsp;&nbsp;<span class="text-info border-bottom" style="font-size: small;">ABOUT US</span>
    <section class="py-3 bg-white" id="about">
        <div class="container">
            <p class="text-muted">
                Kami adalah penyedia layanan laundry profesional yang berdiri sejak tahun <strong>2023</strong>. Hadir untuk mempermudah hidup Anda dengan layanan cuci, setrika, dan antar-jemput pakaian yang cepat, bersih, dan terpercaya.
                Dengan dukungan tenaga kerja berpengalaman dan peralatan modern, kami memastikan pakaian Anda dirawat dengan standar kualitas terbaik.
            </p>
            <!-- <a href="/Pages/services" class="btn btn-primary mt-3">Lihat Layanan Kami</a> -->
        </div>
    </section>
    <div class="row g-4 py-1 mt-1 bg-light">
        <!-- Info Kontak -->
        <div class="col-md-6">
            <div class="bg-white shadow-sm rounded-4 p-4">
                <h5 class="text-info border-bottom" style="font-size: medium;">Info Kontak</h5>
                <p><strong>📍 Alamat:</strong> Jl. Nakula Raya No. 36, Kota Semarang</p>
                <p><strong>📱 Telepon / WA:</strong> <a href="https://wa.me/<?= esc($contact['tel']) ?>" target="_blank"><?= esc($contact['tl']) ?></a></p>
                <p><strong>📧 Email:</strong> spincyclelaundry@gmail.com</p>
                <p><strong>🕒 Jam Operasional:</strong> 08.00 - 21.00 (Setiap Hari)</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3960.2327909451096!2d110.4083611!3d-6.9818333!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2s!5e0!3m2!1sen!2sid!4v1744366896748!5m2!1sen!2sid" width="100%" height="110" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <!-- Formulir Pesan -->
        <div class="col-md-6">
            <div class="bg-white shadow-sm rounded-4 p-4 h-100">
                <h5 class="text-info border-bottom" style="font-size:medium;">Kirim Pesan</h5>
                <form>
                    <div class="mb-3">
                        <!-- <label for="name" class="form-label">Nama</label> -->
                        <input type="text" class="form-control" id="name" placeholder="Masukkan nama Anda">
                    </div>
                    <div class="mb-3">
                        <!-- <label for="email" class="form-label">Email / No. HP</label> -->
                        <input type="email" class="form-control" id="email" placeholder="Masukkan kontak Anda">
                    </div>
                    <div class="mb-3">
                        <!-- <label for="message" class="form-label">Pesan</label> -->
                        <textarea class="form-control" id="message" rows="4" placeholder="Tulis pesan atau pertanyaan Anda..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </form>
            </div>
        </div>

    </div>



</div>
<?= $this->endSection(); ?>