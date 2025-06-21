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
            <?= session()->getFlashdata('error') ?>&nbsp;<a href="/Login/">Login</a>
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
                <?= csrf_field(); ?>
                <p class="text-start fw-bold">Order summary</p>
                <hr class="text-info w-50 mx-auto">
                <div class="row mb-3 text-start">

                    <div class="col-md-6">
                        <label class="form-label">Nama Pelanggan</label>
                        <input autofocus type="text" value="<?= old('nama') ?>" class="custom-border rounded-0 form-control <?= (isset($validation) && $validation->hasError('nama')) ? 'is-invalid' : ''; ?>" name="nama">
                        <div class="invalid-feedback">
                            <?php if (isset($validation)): ?>
                                <?= $validation->getError('nama'); ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jenis Layanan</label>
                        <select class="custom-border <?= (isset($validation) && $validation->hasError('jenis_layanan')) ? 'is-invalid' : ''; ?> form-select rounded-0" name="jenis_layanan">
                            <option value="" disabled <?= old('jenis_layanan') ? '' : 'selected'; ?>>Pilih Layanan</option>
                            <?php foreach ($jenis_layanan as $item) : ?>
                                <option value="<?= $item['nama'] ?>" <?= old('jenis_layanan') == $item['nama'] ? 'selected' : ''; ?>><?= $item['nama'] ?> - Rp <?= number_format($item['harga_per_kg'] ?? 0, 0, ',', '.'); ?>/kg</option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?php if (isset($validation)): ?>
                                <?= $validation->getError('jenis_layanan'); ?>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>

                <!-- Dropdown Jenis Pakaian -->
                <div class="row mb-0">
                    <div class="col-md-6 text-start">
                        <label class="form-label">Pilih Jenis Pakaian</label>
                        <select size="5" class=" custom-border form-select rounded-0" id="jenisPakaian">
                            <?php foreach ($pakaian as $item): ?>
                                <option style="width: auto;" value="<?= $item['nama'] ?>"><?= $item['nama'] ?>. Berat : <?= $item['berat'] ?> Kg</option>
                            <?php endforeach; ?>
                        </select>
                        <?php foreach ($pakaian as $item): ?>
                            <div class="mt-2 formTambahan" id="form_<?= $item['nama'] ?>" style="display: none;">
                                <label class="form-label">Jumlah <?= $item['nama'] ?></label>
                                <input type="number" class="custom-border rounded-0 form-control item-input"
                                    name="<?= $item['nama'] ?>" data-weight="<?= $item['berat'] ?>" value="0" min="0">
                            </div>
                        <?php endforeach; ?>
                        <div id="output" class="mt-3"></div>
                        <div class="mb-3 mt-3">
                            <label class="form-label" style="text-align: left !important; display:block;"></label>
                            <textarea class="custom-border rounded-0 form-control  <?= (isset($validation) && $validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" placeholder="Alamat penjemputan" name="alamat" rows="3"><?= old('alamat', $user['alamat'] ?? '') ?></textarea>
                            <div class="invalid-feedback">
                                <?php if (isset($validation)): ?>
                                    <?= $validation->getError('alamat'); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="hidden" name="expressService" value="no">
                                <input class="form-check-input" type="checkbox" value=10000 id="expressService" name="expressService">
                                <label class="form-check-label" for="expressCheckbox">
                                    Gunakan jasa express
                                </label>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 text-start">
                                <label class="form-label"></i>Tanggal Penjemputan</label>
                                <input type="date" value="<?= old('tanggal') ?>" name="tanggal" id="tanggal" class="custom-border rounded-0 form-control">
                            </div>
                            <div class="col-md-6 text-start">
                                <label class="form-label"></i>Waktu Penjemputan</label>
                                <input type="time" name="waktu" value="<?= old('waktu') ?>" id="waktu" class="custom-border rounded-0 form-control">
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6 mb-3" style="margin-top: 10px;">
                        <hr class="text-info w-0 mx-auto">

                        <p class="text-start fw-bold">Additional information</p>

                        <hr class="text-info w-0 mx-auto">

                        <label class="form-label" style="text-align: left !important; display:block;">Catatan tambahan (opsional)</label>
                        <textarea class="custom-border rounded-0 form-control" name="catatan" rows="5" placeholder="Contoh: Tolong jemput sore, pakaian bayi pisahkan..."><?= old('catatan') ?></textarea>
                    </div>
                </div>


                <script>

                </script>


                <div class="row">

                    <div class="mb-3 col-md-6">
                        <label class="form-label" style="text-align: left !important; display:block;">
                            Total Berat (kg)</label>
                        <input type="text" class="custom-border rounded-0 form-control <?= (isset($validation) && $validation->hasError('berat')) ? 'is-invalid' : ''; ?>" id="total_berat" name="berat" readonly>
                        <div class="text-start invalid-feedback">
                            <?php if (isset($validation)): ?>
                                <?= $validation->getError('berat'); ?>
                            <?php endif; ?>
                        </div>
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
        const totalBerat = document.getElementById('total_berat').value;

        // if (!dateInput || !timeInput) {
        //     alert('Tanggal dan waktu harus diisi');
        //     return; // jangan lanjut submit
        // }

        const date = new Date(dateInput);
        const today = new Date();

        if (date < today) {
            Swal.fire({
                icon: 'error',
                title: 'Tanggal Tidak Valid',
                text: 'Tanggal atau jam yang dipilih sudah lewat. Silakan pilih tanggal hari ini atau yang akan datang.',
                confirmButtonText: 'OK',
                confirmButtonColor: '#0dcaf0'
            });
            return;
        }

        // if (totalBerat < 1.0) {
        //     Swal.fire({
        //         icon: 'error',
        //         title: 'Minimal 1 Kg',
        //         text: 'Total berat tidak boleh kurang dari 1 Kg  ',
        //         confirmButtonText: 'OK'
        //     });
        //     return;
        // }

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
                confirmButtonText: 'OK',
                confirmButtonColor: '#0dcaf0'
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
                confirmButtonText: 'OK',
                confirmButtonColor: '#0dcaf0'
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

    function tampilkanDetailPakaian() {
        const output = document.getElementById('output');
        output.innerHTML = ''; // kosongkan isi sebelumnya

        inputs.forEach(input => {
            const jumlah = parseFloat(input.value) || 0;
            const berat = parseFloat(input.dataset.weight) || 0;

            if (jumlah > 0) {
                const nama = input.name;
                const totalBerat = jumlah * berat;

                output.innerHTML += `${nama} ${jumlah} x ${berat} kg) = <strong>${totalBerat.toFixed(2)} kg</strong></p>
                <hr>`;
            }
        });
    }

    inputs.forEach(input => {
        input.addEventListener('input', tampilkanDetailPakaian);
    });

    tampilkanDetailPakaian(); // jalankan saat halaman pertama kali load
</script>

<?= $this->endSection(); ?>