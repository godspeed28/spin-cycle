<?= $this->extend('layout-admin/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3"><?= $title ?></h3>
                <a href="<?= base_url('order') ?>" class="btn btn-secondary btn-sm mb-3">← Kembali</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>No Resi</th>
                        <td><?= esc($order['no_resi']) ?></td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td><?= esc($order['nama']) ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><?= esc($order['alamat']) ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td><?= esc($order['tanggal']) ?></td>
                    </tr>
                    <tr>
                        <th>Waktu</th>
                        <td><?= esc($order['waktu']) ?></td>
                    </tr>
                    <tr>
                        <th>Jenis Layanan</th>
                        <td><?= esc($order['jenis_layanan']) ?> <?= $order['jasa_express'] ? '(Express)' : '' ?></td>
                    </tr>
                    <tr>
                        <th>Total Berat</th>
                        <td><?= esc($order['total_berat']) ?> kg</td>
                    </tr>
                    <tr>
                        <th>Total Harga</th>
                        <td>Rp<?= number_format($order['total_harga'], 0, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <th>Metode Pembayaran</th>
                        <td><?= esc($order['metode_pembayaran']) ?></td>
                    </tr>
                    <tr>
                        <th>Paid</th>
                        <td><?= $order['paid'] ? 'Sudah Bayar' : 'Belum Bayar' ?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><?= $order['status'] ?></td>
                    </tr>
                    <tr>
                        <th>Dibuat Pada</th>
                        <td><?= esc($order['created_at']) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>