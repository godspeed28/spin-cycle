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

<div class="container my-4">
    <div class="card border-0 shadow-lg">
        <div class="card-header bg-primary text-white rounded-top-3">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="bi bi-bag-plus me-2"></i>PENJEMPUTAN LAUNDRY</h4>
                <span class="badge bg-white text-primary fs-6">1 Langkah</span>
            </div>
        </div>

        <div class="card-body p-4">
            <form id="pickupForm" action="<?= base_url('/Wash/checkout') ?>" method="post">
                <?= csrf_field(); ?>

                <!-- Progress Bar -->
                <div class="progress mb-5" style="height: 8px;">
                    <div class="progress-bar bg-success" style="width: 100%" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                <!-- Bagian Informasi Pesanan -->
                <div class="row g-4">
                    <!-- Kolom Kiri -->
                    <div class="col-lg-6">
                        <div class="sticky-top" style="top: 20px;">
                            <!-- Informasi Pelanggan -->
                            <div class="mb-4 p-3 bg-light rounded-2">
                                <h5 class="fw-bold text-primary mb-3">
                                    <i class="bi bi-person-circle me-2"></i>Informasi Pelanggan
                                </h5>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                                    <input type="text" value="<?= old('nama') ?>"
                                        class="form-control <?= (isset($validation) && $validation->hasError('nama') ? 'is-invalid' : ''); ?>"
                                        name="nama" placeholder="Nama sesuai KTP">
                                    <div class="invalid-feedback">
                                        <?= isset($validation) ? $validation->getError('nama') : '' ?>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Alamat Penjemputan <span class="text-danger">*</span></label>
                                    <textarea class="form-control <?= (isset($validation) && $validation->hasError('alamat') ? 'is-invalid' : ''); ?>"
                                        name="alamat" rows="3" placeholder="Lengkap dengan RT/RW dan patokan"><?= old('alamat', $user['alamat'] ?? '') ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= isset($validation) ? $validation->getError('alamat') : '' ?>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-link mt-1 p-0 text-decoration-none" data-bs-toggle="modal" data-bs-target="#alamatModal">
                                        <i class="bi bi-geo-alt"></i> Gunakan lokasi saat ini
                                    </button>
                                </div>
                            </div>

                            <!-- Pilihan Layanan -->
                            <div class="mb-4 p-3 bg-light rounded-2">
                                <h5 class="fw-bold text-primary mb-3">
                                    <i class="bi bi-list-check me-2"></i>Pilihan Layanan
                                </h5>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Jenis Layanan <span class="text-danger">*</span></label>
                                    <select class="form-select <?= (isset($validation) && $validation->hasError('jenis_layanan') ? 'is-invalid' : ''); ?>"
                                        name="jenis_layanan" id="layananSelect">
                                        <option value="" disabled <?= old('jenis_layanan') ? '' : 'selected' ?>>-- Pilih Layanan --</option>
                                        <?php foreach ($jenis_layanan as $item) : ?>
                                            <option value="<?= $item['nama'] ?>" data-harga="<?= $item['harga_per_kg'] ?>"
                                                <?= old('jenis_layanan') == $item['nama'] ? 'selected' : '' ?>>
                                                <?= $item['nama'] ?> - Rp <?= number_format($item['harga_per_kg'], 0, ',', '.') ?>/kg
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= isset($validation) ? $validation->getError('jenis_layanan') : '' ?>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Pilih Pakaian <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <select class="form-select" id="jenisPakaian">
                                            <option value="" selected disabled>-- Jenis Pakaian --</option>
                                            <?php foreach ($pakaian as $item): ?>
                                                <option value="<?= $item['nama'] ?>" data-berat="<?= $item['berat'] ?>">
                                                    <?= $item['nama'] ?> (<?= $item['berat'] ?> kg/pcs)
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <button class="btn btn-primary" type="button" id="tambahPakaian">
                                            <i class="bi bi-plus"></i> Tambah
                                        </button>
                                    </div>

                                    <!-- Daftar Pakaian yang Dipilih -->
                                    <div id="daftarPakaian" class="mt-3">
                                        <?php foreach ($pakaian as $item): ?>
                                            <div class="formTambahan mb-2" id="form_<?= $item['nama'] ?>" style="display: none;">
                                                <div class="d-flex align-items-center bg-white p-2 rounded-1 border">
                                                    <span class="flex-grow-1">
                                                        <span class="fw-semibold"><?= $item['nama'] ?></span>
                                                        <small class="text-muted d-block"><?= $item['berat'] ?> kg/pcs</small>
                                                    </span>
                                                    <div class="input-group" style="width: 120px;">
                                                        <button class="btn btn-outline-secondary btn-sm decrement" type="button">-</button>
                                                        <input type="number" class="form-control form-control-sm text-center item-input"
                                                            name="<?= $item['nama'] ?>" data-weight="<?= $item['berat'] ?>"
                                                            value="0" min="0">
                                                        <button class="btn btn-outline-secondary btn-sm increment" type="button">+</button>
                                                    </div>
                                                    <button type="button" class="btn btn-sm btn-link text-danger ms-2 remove-item">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                                <div class="alert alert-info py-2 small" id="output">
                                    <div class="text-center">Belum ada pakaian dipilih</div>
                                </div>

                                <!-- Total Berat -->
                                <div class="input-group mb-3">
                                    <span class="input-group-text fw-semibold bg-white">Total Berat</span>
                                    <input type="text" class="form-control fw-bold <?= (isset($validation) && $validation->hasError('berat') ? 'is-invalid' : ''); ?>"
                                        id="total_berat" name="berat" readonly>
                                    <span class="input-group-text bg-white">kg</span>
                                    <div class="invalid-feedback">
                                        <?= isset($validation) ? $validation->getError('berat') : '' ?>
                                    </div>
                                </div>

                                <!-- Layanan Tambahan -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Layanan Tambahan</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="expressService" name="expressService" value="10000">
                                        <label class="form-check-label fw-semibold" for="expressService">
                                            <i class="bi bi-lightning-charge-fill text-warning"></i> Express Delivery (+Rp 10.000)
                                        </label>
                                        <small class="d-block text-muted">Pakaian selesai 2x lebih cepat</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="col-lg-6">
                        <!-- Jadwal Penjemputan -->
                        <div class="mb-4 p-3 bg-light rounded-2">
                            <h5 class="fw-bold text-primary mb-3">
                                <i class="bi bi-calendar2-check me-2"></i>Jadwal Penjemputan
                            </h5>

                            <div class="row g-2">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Tanggal <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-calendar3"></i></span>
                                        <input type="date" value="<?= old('tanggal') ?>" name="tanggal" id="tanggal"
                                            class="form-control" min="<?= date('Y-m-d') ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Waktu <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-clock"></i></span>
                                        <input type="time" name="waktu" value="<?= old('waktu') ?>" id="waktu"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>

                            <!-- Informasi Jam Operasional -->
                            <div class="alert alert-secondary mt-3 py-2 small">
                                <div class="d-flex">
                                    <i class="bi bi-info-circle-fill me-2 mt-1"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">Jam Operasional:</h6>
                                        <ul class="mb-0">
                                            <li><strong>Senin-Jumat:</strong> 08:00 - 17:00 WIB</li>
                                            <li><strong>Sabtu-Minggu:</strong> 10:00 - 17:00 WIB</li>
                                        </ul>
                                        <p class="mb-0 mt-1"><strong>Layanan Express:</strong> Hanya untuk penjemputan sebelum jam 11:00</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Catatan Tambahan -->
                        <div class="mb-4 p-3 bg-light rounded-2">
                            <h5 class="fw-bold text-primary mb-3">
                                <i class="bi bi-pencil-square me-2"></i>Catatan Tambahan
                            </h5>

                            <textarea class="form-control" name="catatan" rows="5"
                                placeholder="Contoh: 
- Ada noda membandel di baju putih
- Gunakan detergen khusus bayi
- Jemput di pagar belakang"><?= old('catatan') ?></textarea>
                            <small class="text-muted">Opsional</small>
                        </div>

                        <!-- Ringkasan Biaya -->
                        <div class="p-3 bg-light rounded-2">
                            <h5 class="fw-bold text-primary mb-3">
                                <i class="bi bi-receipt me-2"></i>Perkiraan Biaya
                            </h5>

                            <div class="bg-white rounded-1 p-3 border">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Subtotal:</span>
                                    <span id="subtotal">Rp 0</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Layanan Express:</span>
                                    <span id="biayaExpress">Rp 0</span>
                                </div>
                                <hr class="my-2">
                                <div class="d-flex justify-content-between fw-bold">
                                    <span>Total Perkiraan:</span>
                                    <span id="totalBiaya">Rp 0</span>
                                </div>
                                <small class="text-muted">* Harga akhir mungkin berbeda berdasarkan berat aktual</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-between mt-4">
                    <button type="button" class="btn btn-outline-secondary rounded-1" onclick="history.back()">
                        <i class="bi bi-arrow-left me-2"></i>Kembali
                    </button>
                    <button type="submit" class="btn btn-primary rounded-1 px-4" id="submitBtn">
                        <span id="submitText">Proses Pesanan</span>
                        <span id="submitLoader" class="spinner-border spinner-border-sm d-none" role="status"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Alamat -->
<div class="modal fade" id="alamatModal" tabindex="-1" aria-labelledby="alamatModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="alamatModalLabel">Gunakan Lokasi Saat Ini</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="map" style="height: 300px; width: 100%;" class="mb-3 rounded-1"></div>
                <div class="alert alert-warning small">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    Pastikan Anda memberikan izin akses lokasi untuk menggunakan fitur ini
                </div>
                <button type="button" class="btn btn-primary w-100" id="confirmLocation">
                    <i class="bi bi-check-circle me-2"></i>Gunakan Lokasi Ini
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    // Inisialisasi
    document.addEventListener('DOMContentLoaded', function() {
        updateItemDetails();
        calculateTotalCost();

        // Set tanggal minimal hari ini
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('tanggal').min = today;

        // Jika ada tanggal sebelumnya di old(), set ke minimal hari ini jika sudah lewat
        if (document.getElementById('tanggal').value && document.getElementById('tanggal').value < today) {
            document.getElementById('tanggal').value = today;
        }
    });

    // Fungsi untuk menampilkan SweetAlert dengan animasi
    function showAlert(icon, title, html, confirmButtonText = 'Mengerti') {
        return Swal.fire({
            icon: icon,
            title: title,
            html: html,
            confirmButtonText: confirmButtonText,
            confirmButtonColor: '#0d6efd',
            customClass: {
                popup: 'animate__animated animate__fadeInDown',
                container: 'rounded-3'
            },
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        });
    }

    // Validasi form sebelum submit
    document.getElementById('pickupForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const submitBtn = document.getElementById('submitBtn');
        const submitText = document.getElementById('submitText');
        const submitLoader = document.getElementById('submitLoader');

        // Tampilkan loading
        submitText.textContent = 'Memproses...';
        submitLoader.classList.remove('d-none');
        submitBtn.disabled = true;

        const form = this;
        const dateInput = document.getElementById('tanggal').value;
        const timeInput = document.getElementById('waktu').value;
        const expressChecked = document.getElementById('expressService').checked;
        const totalBerat = parseFloat(document.getElementById('total_berat').value) || 0;
        const jenisLayanan = document.getElementById('layananSelect').value;

        // Validasi dasar
        if (!jenisLayanan) {
            showAlert('error', 'Layanan Belum Dipilih', 'Silakan pilih jenis layanan terlebih dahulu.');
            resetSubmitButton();
            return;
        }

        if (totalBerat < 1.0) {
            showAlert('error', 'Berat Minimal', 'Total berat harus minimal 1 kg untuk penjemputan.');
            resetSubmitButton();
            return;
        }

        if (!dateInput || !timeInput) {
            showAlert('error', 'Data Tidak Lengkap', 'Harap isi tanggal dan waktu penjemputan.');
            resetSubmitButton();
            return;
        }

        const date = new Date(dateInput);
        const today = new Date();
        today.setHours(0, 0, 0, 0);

        // Validasi tanggal tidak boleh kemarin
        if (date < today) {
            showAlert('error', 'Tanggal Tidak Valid', 'Anda tidak bisa memilih tanggal yang sudah lewat.');
            resetSubmitButton();
            return;
        }

        // Validasi jam operasional
        const day = date.getDay(); // 0=Minggu, 1=Senin, ..., 6=Sabtu
        const [hours, minutes] = timeInput.split(':').map(Number);
        let isValidTime = false;

        if (day >= 1 && day <= 5) { // Weekdays (Senin-Jumat)
            isValidTime = (hours > 8 || (hours === 8 && minutes >= 0)) &&
                (hours < 17 || (hours === 17 && minutes === 0));
        } else { // Weekend (Sabtu-Minggu)
            isValidTime = (hours > 10 || (hours === 10 && minutes >= 0)) &&
                (hours < 17 || (hours === 17 && minutes === 0));
        }

        if (!isValidTime) {
            const jamOperasional = day >= 1 && day <= 5 ?
                'Senin-Jumat: 08:00 - 17:00 WIB' : 'Sabtu-Minggu: 10:00 - 17:00 WIB';

            showAlert(
                'error',
                'Jam Tidak Valid',
                `Jam penjemputan tidak sesuai dengan jam operasional.<br><strong>${jamOperasional}</strong>`
            );
            resetSubmitButton();
            return;
        }

        // Validasi layanan express (harus sebelum jam 11)
        if (expressChecked) {
            const pickupTime = new Date(dateInput + 'T' + timeInput);
            const cutoffTime = new Date(dateInput + 'T11:00:00');

            if (pickupTime >= cutoffTime) {
                showAlert(
                    'error',
                    'Layanan Express',
                    'Layanan express hanya tersedia untuk penjemputan sebelum jam 11:00 pada hari yang sama.'
                );
                resetSubmitButton();
                return;
            }
        }

        // Jika semua validasi lolos, submit form setelah 1 detik (untuk UX)
        setTimeout(() => {
            form.submit();
        }, 1000);

        function resetSubmitButton() {
            submitText.textContent = 'Proses Pesanan';
            submitLoader.classList.add('d-none');
            submitBtn.disabled = false;
        }
    });

    // Fungsi untuk menambah pakaian
    document.getElementById('tambahPakaian').addEventListener('click', function() {
        const select = document.getElementById('jenisPakaian');
        const selectedValue = select.value;

        if (!selectedValue) {
            showAlert('warning', 'Peringatan', 'Silakan pilih jenis pakaian terlebih dahulu');
            return;
        }

        const formDiv = document.getElementById('form_' + selectedValue);
        if (formDiv) {
            formDiv.style.display = 'block';
            const input = formDiv.querySelector('input');
            input.value = parseInt(input.value) + 1 || 1;
            calculateTotalWeight();
            select.value = '';
        }
    });

    // Fungsi untuk menghitung total berat
    function calculateTotalWeight() {
        let total = 0;
        const inputs = document.querySelectorAll('.item-input');

        inputs.forEach(input => {
            if (input.closest('.formTambahan').style.display !== 'none') {
                const quantity = parseFloat(input.value) || 0;
                const weightPerItem = parseFloat(input.dataset.weight) || 0;
                total += quantity * weightPerItem;
            }
        });

        document.getElementById('total_berat').value = total.toFixed(2);
        updateItemDetails();
        calculateTotalCost();
    }

    // Fungsi untuk menampilkan detail item
    function updateItemDetails() {
        const output = document.getElementById('output');
        const inputs = document.querySelectorAll('.item-input');
        let html = '';
        let hasItems = false;

        inputs.forEach(input => {
            if (input.closest('.formTambahan').style.display !== 'none') {
                const quantity = parseFloat(input.value) || 0;
                if (quantity > 0) {
                    hasItems = true;
                    const itemName = input.name;
                    const weightPerItem = parseFloat(input.dataset.weight);
                    const totalWeight = quantity * weightPerItem;

                    html += `
                        <div class="d-flex justify-content-between small mb-1">
                            <span>${itemName} (${quantity} pcs)</span>
                            <span>${totalWeight.toFixed(2)} kg</span>
                        </div>
                    `;
                }
            }
        });

        if (hasItems) {
            const totalBerat = parseFloat(document.getElementById('total_berat').value) || 0;
            output.innerHTML = `
                <div class="fw-semibold mb-2">Detail Pakaian:</div>
                ${html}
                <hr class="my-2">
                <div class="d-flex justify-content-between fw-semibold">
                    <span>Total Berat:</span>
                    <span>${totalBerat} kg</span>
                </div>
            `;
        } else {
            output.innerHTML = '<div class="text-center">Belum ada pakaian dipilih</div>';
        }
    }

    // Fungsi untuk menghitung total biaya
    function calculateTotalCost() {
        const berat = parseFloat(document.getElementById('total_berat').value) || 0;
        const layananSelect = document.getElementById('layananSelect');
        const hargaPerKg = layananSelect.options[layananSelect.selectedIndex]?.dataset.harga || 0;
        const expressChecked = document.getElementById('expressService').checked;

        const subtotal = berat * hargaPerKg;
        const biayaExpress = expressChecked ? 10000 : 0;
        const total = subtotal + biayaExpress;

        document.getElementById('subtotal').textContent = formatRupiah(subtotal);
        document.getElementById('biayaExpress').textContent = formatRupiah(biayaExpress);
        document.getElementById('totalBiaya').textContent = formatRupiah(total);
    }

    // Format mata uang Rupiah
    function formatRupiah(angka) {
        return 'Rp ' + Math.round(angka).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    // Event delegation untuk tombol increment/decrement
    document.getElementById('daftarPakaian').addEventListener('click', function(e) {
        if (e.target.classList.contains('increment')) {
            const input = e.target.closest('.input-group').querySelector('input');
            input.value = parseInt(input.value) + 1;
            calculateTotalWeight();
        } else if (e.target.classList.contains('decrement')) {
            const input = e.target.closest('.input-group').querySelector('input');
            if (input.value > 0) {
                input.value = parseInt(input.value) - 1;
                calculateTotalWeight();
            }
        } else if (e.target.classList.contains('remove-item') || e.target.closest('.remove-item')) {
            const formDiv = e.target.closest('.formTambahan');
            formDiv.querySelector('input').value = 0;
            formDiv.style.display = 'none';
            calculateTotalWeight();
        }
    });

    // Event listener untuk input langsung
    document.querySelectorAll('.item-input').forEach(input => {
        input.addEventListener('change', calculateTotalWeight);
    });

    // Event listener untuk layanan express
    document.getElementById('expressService').addEventListener('change', calculateTotalCost);

    // Event listener untuk pilihan layanan
    document.getElementById('layananSelect').addEventListener('change', calculateTotalCost);

    // Event listener untuk pilihan pakaian
    document.getElementById('jenisPakaian').addEventListener('change', function() {
        const selected = this.value;
        if (selected) {
            this.blur(); // Hilangkan focus untuk mobile
        }
    });

    // Inisialisasi map untuk alamat (placeholder)
    document.getElementById('alamatModal').addEventListener('shown.bs.modal', function() {
        // Implementasi map akan ditambahkan di sini
        console.log('Map initialized');
    });

    // Konfirmasi lokasi
    document.getElementById('confirmLocation').addEventListener('click', function() {
        // Implementasi geolocation akan ditambahkan di sini
        showAlert('success', 'Lokasi Diterima', 'Lokasi Anda telah berhasil disimpan');
        const modal = bootstrap.Modal.getInstance(document.getElementById('alamatModal'));
        modal.hide();
    });
</script>

<?= $this->endSection(); ?>