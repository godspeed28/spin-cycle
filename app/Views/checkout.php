<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<div class="text-start d-flex flex-column bg-page">
    <h5 class="align-self-start" style="margin-left:150px;"><a href="/" class="hover-menu text-decoration-none text-info">Home</a> / Checkout</h5>
    <br>
    <h1 class="align-self-start fw-bold" style="margin-left:150px;">Checkout</h1>
</div>

<hr class="text-info w-50 mx-auto mb-5">

<div class="container">
    <div class="card rounded-0 shadow-none border-1 mb-4">
        <div class="card-header rounded-0 text-dark" style="background-color:rgb(247, 242, 242);">
        </div>
        <div class="card-body">
            <h5 class="text-start text-info mb-3"><i class="bi bi-geo-alt"></i> Alamat Pickup & Pengiriman</h5>
            <div class="d-flex">
                <div class="container" style="max-width:300px;">
                    <h6 class="text-start"><?= esc($nama) ?> <?= ' (+62) ' . substr($noHp, 1) ?></h6>
                </div>
                <div class="container-fluid p-0">
                    <p class="text-start">
                        <?php setlocale(LC_TIME, 'id_ID'); ?>
                        <?= esc($alamat) ?>, <span id="tanggal"></span>, Pukul <?= esc($waktu) ?>
                    </p>
                </div>
            </div>
            <script>
                const tanggal = new Date("<?= esc($tanggal) ?>");
                const options = {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                const formatTanggal = tanggal.toLocaleDateString('id-ID', options);
                document.getElementById('tanggal').textContent = formatTanggal;
            </script>
            <hr class="text-dark mx-auto">
            <div class="container">
            </div>
        </div>
    </div>
</div>

<?php $jenisPakaian = json_decode($jenis_pakaian, true); ?>
<?php if (!empty($jenisPakaian)) : ?>
    <?php $first = true; ?>
    <?php foreach ($jenisPakaian as $namaPakaian => $jumlah) : ?>
        <div class="container">
            <div class="card rounded-0 shadow-none border-1 mb-4">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="container">
                            <?php if ($first) : ?>
                                <h5 class="text-start">Produk Dipesan</h5>
                                <?php $first = false; ?>
                                <hr>
                            <?php else : ?>
                                <br>
                                <hr>
                            <?php endif; ?>
                            <p class="text-start">
                                <img class="rounded-3" src="<?= base_url('uploads/' . $iconPakaian[$namaPakaian]) ?>" width="50">
                                &nbsp; <?= str_replace('_', ' ', esc($namaPakaian)) ?>
                            </p>
                        </div>
                        <div class="container">
                            <div class="table-responsive">
                                <table class="table table-bordered-0 table-sm" style="margin-top:-15px;">
                                    <thead class="table-white">
                                        <tr>
                                            <th class="fw-normal text-secondary">Berat Satuan</th>
                                            <th class="fw-normal text-secondary">Jumlah</th>
                                            <th class="fw-normal text-secondary">Total Berat Satuan</th>
                                            <th class="fw-normal text-secondary">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <br>
                                    <tbody>
                                        <tr>
                                            <td> <?= $berat_satuan[$namaPakaian] ?> Kg</td>
                                            <td><?= esc($jumlah) ?> pcs</td>
                                            <td><?= $berat_satuan[$namaPakaian] * $jumlah ?></td>
                                            <?php $totalBeratSatuan = $berat_satuan[$namaPakaian] * $jumlah ?>
                                            <td>Rp <?= number_format($totalBeratSatuan * $harga_jenis_layanan[$jenis_layanan] ?? 0, 0, ',', '.'); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <p class="text-muted fst-italic">Tidak ada pakaian yang dipilih.</p>
<?php endif; ?>

<style>

</style>

<div class="d-flex"></div>
<form id="order-form" action="<?= base_url('checkout/proses') ?>" method="POST">
    <div class="container">
        <div class="card rounded-0 shadow-none border-1 mb-4">
            <div class="card-body text-start">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <p class="m-0">Catatan :</p>

                    <?= csrf_field(); ?>
                    <textarea class="text-start text-secondary" name="catatan" placeholder="" cols="50" rows="1"><?= esc($catatan) ?: 'Tidak ada catatan' ?></textarea>
                </div>
                <hr>
                <?php if ($jasa_express == 10000) : ?>
                    <h6 class="text-end text-secondary">Jasa Express : <span class="text-dark">Rp <?= number_format($jasa_express ?? 0, 0, ',', '.') ?></span></h6>
                <?php endif; ?>
                <h6 class="text-end text-secondary">Jenis Layanan: <span class="text-dark"><?= esc($jenis_layanan); ?>, Rp <?= number_format($harga_jenis_layanan[$jenis_layanan] ?? 0, 0, ',', '.') ?></span> </h6>
                <h6 class="text-end text-secondary">Total Berat Produk: <span class="text-dark"><?= esc($berat); ?> Kg</span> </h6>
                <h6 class="text-end text-secondary">Total Pesanan Produk: <span class="text-info fs-3">Rp <?= number_format($total_harga + $jasa_express ?? 0, 0, ',', '.') ?></span></h6>
            </div>
        </div>
    </div>

    <div class="container mt-5">

        <!-- input hidden -->
        <input type="hidden" name="nama" value="<?= esc($nama) ?>">
        <input type="hidden" name="alamat" value="<?= esc($alamat) ?>">
        <input type="hidden" name="tanggal" value="<?= esc($tanggal) ?>">
        <input type="hidden" name="waktu" value="<?= esc($waktu) ?>">
        <input type="hidden" name="jenis_layanan" value="<?= esc($jenis_layanan) ?>">
        <input type="hidden" name="jasa_express" value="<?= esc($jasa_express) ?>">
        <input type="hidden" name="total_berat" value="<?= esc($berat) ?>">
        <input type="hidden" name="total_harga" value="<?= $total_harga + $jasa_express ?>">
        <input type="hidden" name="jenis_pakaian" value='<?= esc($jenis_pakaian) ?>'>
        <?php foreach ($jenisPakaian as $namaPakaian => $jumlah) : ?>
            <input type="hidden" name="nama_pakaian[]" value="<?= $namaPakaian ?>">
            <input type="hidden" name="jumlah[]" value="<?= $jumlah ?>">
            <input type="hidden" name="berat_satuan[]" value="<?= $berat_satuan[$namaPakaian] ?>">
            <input type="hidden" name="subtotal[]" value="<?= ($berat_satuan[$namaPakaian] * $jumlah) * $harga_jenis_layanan[$jenis_layanan] ?>">
        <?php endforeach; ?>
        <input type="hidden" id="selected-method" name="metode_pembayaran" required>
        <!-- input hidden end -->

        <div class="card rounded-0 shadow-none border-1 mb-4">
            <div class="card-body text-start">
                <div class="d-flex align-items-center">
                    <h5 class="text-start me-3">Metode Pembayaran</h5>
                    <h6 id="cod" class="payment-option mt-1 px-3 me-2"
                        style="border: 1px solid #ccc; padding:10px; cursor:pointer;">
                        COD
                    </h6>
                    <h6 id="transfer" class="payment-option mt-1 px-3"
                        style="border: 1px solid #ccc; padding:10px; cursor:pointer;">
                        Transfer Mid Trans
                    </h6>
                </div>
                <div class="text-start invalid-feedback">
                    <?php if (isset($validation)): ?>
                        <?= $validation->getError('berat'); ?>
                    <?php endif; ?>
                </div>
                <hr class="text-dark">
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-end">
                        <button type="submit" class="text-light rounded-0 fs-5 btn btn-info">
                            Make an order
                        </button>
                    </div>
                </div>
            </div>
        </div>

</form>
</div>

<!-- Script Interaktif -->
<script>
    const paymentOptions = document.querySelectorAll('.payment-option');
    const hiddenInput = document.getElementById('selected-method');
    const form = document.getElementById('order-form');

    // Validasi pemilihan metode
    paymentOptions.forEach(option => {
        option.addEventListener('click', function() {
            // Reset semua
            paymentOptions.forEach(o => {
                o.style.border = '1px solid #ccc';
                o.style.backgroundColor = '';
                o.style.color = '';
            });

            // Tandai yang dipilih
            this.style.border = '2px solid #0dcaf0';
            this.style.backgroundColor = 'white';
            this.style.color = '#0dcaf0';

            // Set ke input hidden
            hiddenInput.value = this.textContent.trim();
        });
    });

    // Cek validasi sebelum submit
    form.addEventListener('submit', function(e) {
        if (hiddenInput.value === '') {
            e.preventDefault(); // hentikan pengiriman form
            Swal.fire({
                icon: 'error',
                title: 'Metode Pembayaran Tidak Valid',
                text: 'Silakan pilih metode pembayaran yang tersedia sebelum melanjutkan pemesanan.',
                confirmButtonText: 'OK',
                confirmButtonColor: '#0dcaf0'
            });
            return;

        }
    });
</script>



<?= $this->endSection(); ?>