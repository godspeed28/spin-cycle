<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<div class="bg-page py-4 px-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-info">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
        </ol>
    </nav>

    <h1 class="fw-bold">Checkout</h1>
</div>

<hr class="text-info w-50 mx-auto mb-5">

<div class="container" style="max-width: 700px;">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <h4 class="card-title mb-4">Detail Pesanan</h4>

            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <th>Nama</th>
                        <td><?= esc($nama) ?: '<em>Belum diisi</em>' ?></td>
                    </tr>
                    <tr>
                        <th>Jasa Express</th>
                        <td><?= esc($jasa_express) ?: '<em>Tidak ada</em>' ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal dan waktu</th>
                        <td><?= esc($tanggal) . '&nbsp;' . esc($waktu) ?: '<em>Tidak ada</em>' ?></td>
                    </tr>
                    <tr>
                        <th>Jenis Layanan</th>
                        <td><?= esc($jenis_layanan) ?: '<em>Tidak ada</em>' ?></td>
                    </tr>
                    <tr>
                        <th>Berat</th>
                        <td><?= $berat ? esc($berat) . ' kg' : '<em>0 kg</em>' ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><?= esc($alamat) ?: '<em>Belum diisi</em>' ?></td>
                    </tr>
                    <tr>
                        <th>Catatan</th>
                        <td><?= esc($catatan) ?: '<em>Tidak ada catatan</em>' ?></td>
                    </tr>
                    <tr>
                        <th>Total Harga</th>
                        <td class="text-primary fw-bold">Rp <?= number_format($total_harga ?? 0, 0, ',', '.') ?></td>
                    </tr>
                </tbody>
            </table>

            <h5 class="mt-4">Jenis Pakaian yang Dipilih</h5>
            <?php $jenisPakaian = json_decode($jenis_pakaian, true); ?>
            <?php if (!empty($jenisPakaian)) : ?>
                <ul class="list-group list-group-flush mb-3">
                    <?php foreach ($jenisPakaian as $namaPakaian => $jumlah) : ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?= esc($namaPakaian) ?>
                            <span class="badge bg-primary rounded-pill"><?= esc($jumlah) ?> pcs</span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else : ?>
                <p class="text-muted fst-italic">Tidak ada pakaian yang dipilih.</p>
            <?php endif; ?>

            <form action="/pesanan/konfirmasi" method="POST">
                <?= csrf_field(); ?>

                <div class="mb-3 mt-4">
                    <label for="metode_pembayaran" class="form-label fw-semibold">Metode Pembayaran</label>
                    <select name="metode_pembayaran" id="metode_pembayaran" class="form-select" required>
                        <option value="" disabled selected>Pilih Metode Pembayaran</option>
                        <option value="Transfer Bank">Transfer Bank</option>
                        <option value="COD">Bayar di Tempat (COD)</option>
                        <option value="E-Wallet">E-Wallet (OVO, GoPay, dll)</option>
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg px-5">
                        <i class="bi bi-check-circle"></i> Konfirmasi Pesanan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>