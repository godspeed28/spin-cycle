<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<style>
    .custom-border {
        border: 1px solid black;
    }
</style>

<div class="text-start d-flex flex-column bg-page">
    <h5 class="align-self-start" style="margin-left:150px;"><a href="/" class="hover-menu text-decoration-none text-info">Home</a> / Wash</h5>
    <br>
    <h1 class="align-self-start fw-bold" style="margin-left:150px;">Wash</h1>
</div>

<hr class="text-info w-50 mx-auto">

<div class="container">
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="text-danger text-center" role="alert" style="max-width:300px;">
            <?= session()->getFlashdata('error') ?> &nbsp; <a href="/Login/">Login</a>
        </div>
    <?php endif; ?>
</div>

<div class="container mt-5">
    <div class="card shadow-none border-0">
        <div class="card-header text-white rounded-0" style="background-color:rgb(247, 242, 242);">
            <h4><i class="bi bi-<?= $icon ?> me-2" style="color: black;"></i></h4>
        </div>

        <div class="card-body">
            <form id="pickupForm" action="<?= base_url('/Wash/checkout') ?>" method="post">
                <p class="text-start fw-bold">Order summary</p>
                <hr class="text-info w-50 mx-auto">
                <div class="row mb-3 text-start">
                    <div class="col-md-6">
                        <label class="form-label">Nama Pelanggan</label>
                        <input autofocus type="text" class="custom-border rounded-0 form-control" name="nama" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jenis Layanan</label>
                        <select class="custom-border form-select rounded-0" name="jenis_layanan" required>
                            <option value="">Pilih Layanan</option>
                            <option value="Cuci Kering">Cuci Kering - Rp 5.000/kg</option>
                            <option value="Cuci Setrika">Cuci Setrika - Rp 7.000/kg</option>
                            <option value="Setrika Saja">Setrika Saja - Rp 4.000/kg</option>
                        </select>
                    </div>
                </div>

                <!-- Dropdown Jenis Pakaian -->
                <div class="row mb-0">
                    <div class="col-md-6 text-start">
                        <select class="custom-border form-select rounded-0" id="jenisPakaian" required>
                            <option value="">Pilih jenis pakaian</option>
                            <?php foreach ($pakaian as $item): ?>
                                <option value="<?= $item['nama'] ?>"><?= $item['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php foreach ($pakaian as $item): ?>
                            <div class="mt-2 formTambahan" id="form_<?= $item['nama'] ?>" style="display: none;">
                                <label class="form-label">Jumlah <?= $item['nama'] ?></label>
                                <input type="number" class="custom-border rounded-0 form-control item-input"
                                    name="<?= $item['nama'] ?>" data-weight="<?= $item['berat'] ?>" value="0" min="0">
                            </div>
                        <?php endforeach; ?>
                        <div class="mb-3 mt-3">
                            <label class="form-label" style="text-align: left !important; display:block;"></label>
                            <textarea class="custom-border rounded-0 form-control" placeholder="Alamat penjemputan" name="alamat" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="hidden" name="expressService" value="no">
                                <input class="form-check-input" type="checkbox" value="yes" id="expressService" name="expressService">
                                <label class="form-check-label" for="expressCheckbox">
                                    Gunakan jasa express
                                </label>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 text-start">
                                <label class="form-label"></i>Tanggal Penjemputan</label>
                                <input type="date" name="tanggal" id="tanggal" class="custom-border rounded-0 form-control">
                            </div>
                            <div class="col-md-6 text-start">
                                <label class="form-label"></i>Waktu Penjemputan</label>
                                <input type="time" name="waktu" id="waktu" class="custom-border rounded-0 form-control">
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6 mb-3" style="margin-top: 10px;">
                        <hr class="text-info w-0 mx-auto">

                        <p class="text-start fw-bold">Additional information</p>

                        <hr class="text-info w-0 mx-auto">

                        <label class="form-label" style="text-align: left !important; display:block;">Catatan tambahan (opsional)</label>
                        <textarea class="custom-border rounded-0 form-control" name="catatan" rows="5" placeholder="Contoh: Tolong jemput sore, pakaian bayi pisahkan..."></textarea>
                    </div>
                </div>


                <script>

                </script>


                <div class="row">

                    <div class="mb-3 col-md-6">
                        <label class="form-label" style="text-align: left !important; display:block;">
                            Total Berat (kg)</label>
                        <input type="text" class="custom-border rounded-0 form-control" id="total_berat" name="berat" readonly>
                    </div>
                </div>

                <hr class="text-info w-0 mx-auto">


                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-end">
                        <button type="submit" class="text-light rounded-0 fs-5 btn btn-info">
                            Procced to checkout
                        </button>
                    </div>


                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // validasi

    const form = document.getElementById('pickupForm');

    form.addEventListener('submit', function(e) {
        e.preventDefault(); // cegah submit dulu, nanti submit manual kalau lolos

        const dateInput = document.getElementById('tanggal').value;
        const timeInput = document.getElementById('waktu').value;
        const expressChecked = document.getElementById('expressService').checked;

        if (!dateInput || !timeInput) {
            alert('Tanggal dan waktu harus diisi');
            return; // jangan lanjut submit
        }

        const date = new Date(dateInput);
        const today = new Date();
        today.setHours(0, 0, 0, 0);
        date.setHours(0, 0, 0, 0);

        if (date < today) {
            Swal.fire({
                icon: 'error',
                title: 'Tanggal Tidak Valid',
                text: 'Tanggal yang dipilih sudah lewat. Silakan pilih tanggal hari ini atau yang akan datang.',
                confirmButtonText: 'OK'
            });
            return;
        }

        const day = date.getDay();
        const timeParts = timeInput.split(':');
        const hours = parseInt(timeParts[0], 10);
        const minutes = parseInt(timeParts[1], 10);

        let validTime = false;
        if (day >= 1 && day <= 5) { // Senin - Jumat
            if ((hours > 8 || (hours === 8 && minutes >= 0)) && (hours < 17 || (hours === 17 && minutes === 0))) {
                validTime = true;
            }
        } else if (day === 0 || day === 6) { // Minggu atau Sabtu
            if ((hours > 10 || (hours === 10 && minutes >= 0)) && (hours < 17 || (hours === 17 && minutes === 0))) {
                validTime = true;
            }
        }

        if (!validTime) {
            Swal.fire({
                icon: 'error',
                title: 'Waktu Penjemputan Tidak Valid',
                html: `
              <p>Waktu penjemputan tidak valid untuk hari yang dipilih.</p>
              <p><strong>Senin-Jumat:</strong> 08:00 - 17:00</p>
              <p><strong>Sabtu-Minggu:</strong> 10:00 - 17:00</p>
            `,
                confirmButtonText: 'OK'
            });
            return;
        }

        // Validasi express service
        const pickupDateTime = new Date(dateInput + 'T' + timeInput + ':00');
        const cutoff = new Date(pickupDateTime);
        cutoff.setHours(11, 0, 0, 0);

        if (expressChecked && pickupDateTime >= cutoff) {
            Swal.fire({
                icon: 'error',
                title: 'Layanan Express Tidak Valid',
                text: 'Layanan express hanya tersedia untuk pemesanan sebelum jam 11 siang pada hari penjemputan.',
                confirmButtonText: 'OK'
            });
            return;
        }

        // Kalau sampai sini, semua validasi lolos, submit form manual
        form.submit();
    });

    // validasi end

    document.getElementById('jenisPakaian').addEventListener('change', function() {
        const selected = this.value;

        // Sembunyikan semua formTambahan
        document.querySelectorAll('.formTambahan').forEach(function(form) {
            form.style.display = 'none';
        });

        // Tampilkan form yang sesuai dengan pilihan
        if (selected) {
            const selectedForm = document.getElementById('form_' + selected);
            if (selectedForm) {
                selectedForm.style.display = 'block';
            }
        }
    });
    const inputs = document.querySelectorAll('.item-input');
    const beratOutput = document.getElementById('total_berat');

    function hitungBerat() {
        let total = 0;
        inputs.forEach(input => {
            const jumlah = parseFloat(input.value) || 0;
            const berat = parseFloat(input.dataset.weight) || 0;
            total += jumlah * berat;
        });
        beratOutput.value = total.toFixed(2);
    }

    inputs.forEach(input => {
        input.addEventListener('input', hitungBerat);
    });

    hitungBerat();
</script>

<?= $this->endSection(); ?>