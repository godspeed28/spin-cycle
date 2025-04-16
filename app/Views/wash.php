<?= $this->extend('layout-login/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="card shadow border-primary">
        <div class="card-header border-primary bg-transparent text-white">
            <h4><i class="bi bi-<?= $icon ?> me-2" style="color: black;"></i></h4>
        </div>
        <div class="card-body">
            <form action="<?= base_url('/pesan/simpan') ?>" method="post">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label"><i class="bi bi-person-fill me-1"></i>Nama Pelanggan</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"><i class="bi bi-card-checklist me-1"></i>Jenis Layanan</label>
                        <select class="form-select" name="jenis_layanan" required>
                            <option value="">-- Pilih Layanan --</option>
                            <option value="Cuci Kering">Cuci Kering - Rp 5.000/kg</option>
                            <option value="Cuci Setrika">Cuci Setrika - Rp 7.000/kg</option>
                            <option value="Setrika Saja">Setrika Saja - Rp 4.000/kg</option>
                        </select>
                    </div>
                </div>

                <h5 class="mb-3"><i class="bi bi-box-seam me-1"></i>Jumlah dan Jenis Pakaian</h5>

                <div class="row">
                    <?php
                    foreach ($pakaian as $item): ?>
                        <div class="col-md-4 mb-3">
                            <label><i class="bi bi-<?= $item['icon'] ?> me-1"></i><?= $item['nama'] ?></label>
                            <input type="number" class="form-control item-input" name="<?= strtolower(str_replace(' ', '_', $item['nama'])) ?>" data-weight="<?= $item['berat'] ?>" value="0" min="0">
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-scale me-1"></i>Total Berat (kg)</label>
                    <input type="text" class="form-control" id="total_berat" name="berat" readonly>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label"><i class="bi bi-calendar-event me-1"></i>Tanggal Penjemputan</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"><i class="bi bi-clock me-1"></i>Waktu Penjemputan</label>
                        <input type="time" class="form-control">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-geo-alt-fill me-1"></i>Alamat Penjemputan</label>
                    <textarea class="form-control" name="alamat" rows="2" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-chat-left-dots me-1"></i>Catatan Tambahan</label>
                    <textarea class="form-control" rows="2" placeholder="Contoh: Tolong jemput sore, pakaian bayi pisahkan..."></textarea>
                </div>

                <div class="d-grid">

                    <a href="/Wash/checkout" class="btn btn-primary btn-lg"><i class="bi bi-send-fill me-1"></i>Pesan Sekarang</a>
                    <!-- <button type="submit" class="btn btn-primary btn-lg">
                        <i class="bi bi-send-fill me-1"></i>Pesan Sekarang
                    </button> -->
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Script hitung berat -->
<script>
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