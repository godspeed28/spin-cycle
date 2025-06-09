<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<style>
    .custom-border {
        border: 1px solid black;
    }
</style>

<div class="text-start d-flex flex-column bg-page">
    <h5 class="align-self-start" style="margin-left:150px;"><a href="/" class="hover-menu text-decoration-none text-info">Home</a> / Order Status</h5>
    <br>
    <h1 class="align-self-start fw-bold" style="margin-left:150px;">Order Status</h1>
</div>
<h2 class="mb-4">Pesanan Saya</h2>

<?php if (empty($orders)): ?>
    <div class="alert alert-info">Belum ada pesanan.</div>
<?php else: ?>
    <div class="accordion" id="ordersAccordion">
        <?php foreach ($orders as $index => $order): ?>
            <div class="accordion-item mb-3">
                <h2 class="accordion-header" id="heading<?= $index ?>">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $index ?>" aria-expanded="false" aria-controls="collapse<?= $index ?>">
                        Order ID: <?= esc($order['no_resi']) ?> | Tanggal: <?= esc($order['tanggal']) ?>
                    </button>
                </h2>
                <div id="collapse<?= $index ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $index ?>" data-bs-parent="#ordersAccordion">
                    <div class="accordion-body">
                        <p><strong>Jenis Layanan:</strong> <?= esc($order['jenis_layanan']) ?></p>
                        <p><strong>Total Harga:</strong> <span class="badge bg-success">Rp<?= number_format($order['total_harga'], 0, ',', '.') ?></span></p>
                        <p><strong>Nama:</strong> <?= esc($order['nama']) ?></p>
                        <p><strong>Alamat:</strong> <?= esc($order['alamat']) ?></p>
                        <p><strong>Waktu:</strong> <?= esc($order['waktu']) ?></p>
                        <p><strong>Catatan:</strong> <?= esc($order['catatan']) ?></p>
                        <p><strong>Total Berat:</strong> <?= esc($order['total_berat']) ?> kg</p>
                        <p><strong>Metode Pembayaran:</strong> <?= esc($order['metode_pembayaran']) ?></p>

                        <h5 class="mt-4">Detail Pesanan:</h5>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Nama Pakaian</th>
                                        <th>Jumlah</th>
                                        <th>Berat Satuan (kg)</th>
                                        <th>Total Berat (kg)</th>
                                        <th>Subtotal (Rp)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($orderItem as $item): ?>
                                        <?php if ($item['order_id'] == $order['id']): ?>
                                            <tr>
                                                <td><?= esc($item['nama_pakaian']) ?></td>
                                                <td><?= esc($item['jumlah']) ?></td>
                                                <td><?= esc($item['berat_satuan']) ?></td>
                                                <td><?= esc($item['total_berat']) ?></td>
                                                <td>Rp<?= number_format($item['subtotal'], 0, ',', '.') ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <h5 class="mt-4">Status Pesanan:</h5>
                        <ul class="list-group">
                            <?php foreach ($orderStatuses[$order['id']] as $status): ?>
                                <li class="list-group-item">
                                    <span class="badge bg-primary me-2"><?= esc($status['status']) ?></span>
                                    <?= date('d-m-Y H:i:s', strtotime($status['updated_at'])) ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>


<?= $this->endSection(); ?>