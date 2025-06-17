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
                        <th>Tanggal dan Waktu Pickup</th>
                        <td><?= ubahTanggalWaktu($order['tanggal'], $order['waktu']) ?></td>
                    </tr>
                    <tr>
                        <th>Jenis Layanan</th>
                        <td><?= esc($order['jenis_layanan']) ?><?= $order['jasa_express'] ? ' (Express)' : '' ?>, <?= ubahRp($hargaLayanan->harga_per_kg) ?></td>
                    </tr>
                    <tr>
                        <th>Qty</th>
                        <td>
                            <?php foreach ($items as $index => $item) : ?>
                                <?= remove_underscore($item['nama_pakaian']) . ' ' . $item['jumlah'] . 'pcs' ?><?php if ($index < count($items) - 1) : ?>,<?php else : ?>.<?php endif; ?>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Total Berat</th>
                        <td><?= esc($order['total_berat']) ?> kg
                            (<?php foreach ($items as $index => $item) : ?><?= remove_underscore($item['nama_pakaian']) . ' ' . $item['total_berat'] . 'kg' ?><?php if ($index < count($items) - 1) : ?>, <?php endif; ?><?php endforeach; ?>)
                        </td>
                    </tr>
                    <tr>
                        <th>Total Harga</th>
                        <td><?= ubahRp($order['total_harga']) ?></td>
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