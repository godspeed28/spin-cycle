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

<hr class="text-info w-50 mx-auto">

<div class="container mt-5">
    <div class="card shadow-none border-0">
        <div class="card-header text-white rounded-0" style="background-color:rgb(247, 242, 242);">
            <h4><i class="fs-5 fa fa-<?= $icon ?> me-2" style="color: black;"></i></h4>
        </div>

        <div class="card-body">
            <p class="text-start fw-bold">My Order</p>
            <hr class="text-dark">
            <?php if (empty($orders)): ?>
                <div class="alert alert-info">Belum ada pesanan.</div>
            <?php else: ?>
                <div class="rounded-0 accordion" id="ordersAccordion">
                    <?php foreach ($orders as $index => $order): ?>
                        <?php foreach ($orderStatuses[$order['id']] as $status): ?>
                            <div class="rounded-0 accordion-item mb-3">
                                <?php
                                $warnaStatus = 'text-info'; // default

                                if ($status['status'] === 'Dibatalkan') {
                                    $warnaStatus = 'text-danger';
                                } elseif ($status['status'] === 'Selesai') {
                                    $warnaStatus = 'text-success';
                                }
                                ?>
                                <h2 class="accordion-header" id="heading<?= $index ?>">
                                    <button class="accordion-button <?= $warnaStatus ?> collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $index ?>" aria-expanded="false" aria-controls="collapse<?= $index ?>">
                                        <?= esc($status['status']) ?> | <?= esc($order['no_resi']) ?> | <?= date('d-F-Y', strtotime(esc($status['created_at']))) ?>
                                    </button>
                                </h2>
                                <div id="collapse<?= $index ?>" class="text-start accordion-collapse collapse" aria-labelledby="heading<?= $index ?>" data-bs-parent="#ordersAccordion">
                                    <div class="accordion-body">
                                        <?php if (!empty($order['jasa_express']) && $order['jasa_express'] != 0): ?>
                                            <p><strong>Jasa Express:</strong> Rp<?= number_format($order['jasa_express'], 0, ',', '.') ?></p>
                                        <?php endif; ?>
                                        <p><strong>Jenis Layanan:</strong> <?= esc($order['jenis_layanan']) ?></p>
                                        <p><strong>Total Harga:</strong> <span class="badge bg-success">Rp<?= number_format($order['total_harga'], 0, ',', '.') ?></span></p>
                                        <p><strong>Nama:</strong> <?= esc($order['nama']) ?></p>
                                        <p><strong>Alamat:</strong> <?= esc($order['alamat']) ?></p>
                                        <p><strong>Waktu:</strong> <?= esc($order['waktu']) ?></p>
                                        <p><strong>Catatan:</strong> <?= esc($order['catatan']) ?></p>
                                        <p><strong>Total Berat:</strong> <?= esc($order['total_berat']) ?> kg</p>
                                        <p><strong>Metode Pembayaran:</strong> <?= esc($order['metode_pembayaran']) ?></p>

                                        <div x-data="{ open: false }">
                                            <button @click="open = !open">Detail Pesanan</button>
                                            <div x-show="open" class="table-responsive">
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
                                        </div>
                                    <?php endforeach; ?>
                                    </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>