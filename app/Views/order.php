<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<style>
    .custom-border {
        border: 1px solid black;
    }

    .button {
        background-color: transparent;
        border: none;
    }

    .button:hover {
        color: blue;
        transition: color 0.3s ease-in-out;
    }
</style>

<div class="text-start d-flex flex-column bg-page">
    <h5 class="align-self-start" style="margin-left:150px;">
        <a href="/" class="hover-menu text-decoration-none text-info">Home</a> / Order Status
    </h5>
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
                <div class="accordion rounded-0" id="ordersAccordion">
                    <?php foreach ($orders as $index => $order): ?>
                        <div class="accordion-item mb-3 rounded-0">
                            <h2 class="accordion-header" id="heading<?= $index ?>">
                                <button class="accordion-button <?php
                                                                switch ($order['status']) {
                                                                    case 'Menunggu konfirmasi':
                                                                        echo 'text-warning bg-warning-soft'; // Kuning pastel
                                                                        break;
                                                                    case 'Menunggu penjemputan':
                                                                        echo 'text-warning'; // Oranye pastel
                                                                        break;
                                                                    case 'Sedang dicuci':
                                                                        echo 'text-primary bg-primary-soft'; // Biru pastel
                                                                        break;
                                                                    case 'Siap diantar':
                                                                        echo 'text-success bg-success-soft'; // Hijau muda pastel
                                                                        break;
                                                                    case 'Dalam pengantaran':
                                                                        echo 'text-success bg-success-soft'; // Hijau pastel (lebih gelap dari 'Siap diantar')
                                                                        break;
                                                                    case 'Selesai':
                                                                        echo 'text-primary bg-primary-soft'; // Biru tua pastel
                                                                        break;
                                                                    case 'Dibatalkan':
                                                                        echo 'text-danger bg-danger-soft'; // Merah pastel
                                                                        break;
                                                                    default:
                                                                        echo 'text-secondary bg-light';
                                                                }
                                                                ?> collapsed" type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse<?= $index ?>"
                                    aria-expanded="false"
                                    aria-controls="collapse<?= $index ?>">
                                    <?= esc($order['status']) ?> | <?= esc($order['no_resi']) ?> |
                                    Created At: <?= $order['created_at'] ?>
                                </button>
                            </h2>
                            <div id="collapse<?= $index ?>" class="accordion-collapse collapse"
                                aria-labelledby="heading<?= $index ?>" data-bs-parent="#ordersAccordion">
                                <div class="accordion-body">
                                    <p class="text-start">Thank you. Your order has been received.</p>
                                    <hr>
                                    <div class="d-flex flex-wrap">
                                        <div class="text-secondary mx-2">Order Number: <?= esc($order['no_resi']) ?></div>
                                        <div class="vr mx-2"></div>
                                        <div class="text-secondary mx-2">Date Pickup: <?= esc($order['tanggal']) ?> - <?= esc($order['waktu']) ?></div>
                                        <div class="vr mx-2"></div>
                                        <div class="text-secondary mx-2">Total: Rp<?= number_format($order['total_harga'], 0, ',', '.') ?></div>
                                        <div class="vr mx-2"></div>
                                        <div class="text-secondary mx-2">Metode Pembayaran: <?= esc($order['metode_pembayaran']) ?></div>
                                    </div>
                                    <hr>
                                    <div class="container">
                                        <h5 class="text-start text-info mb-3"><i class="bi bi-geo-alt"></i> Alamat Pickup & Pengiriman</h5>
                                        <h6 class="text-start"><?= esc($order['nama']) ?><?= ' (+62) ' . substr($noHp, 1) ?></h6>
                                        <p class="text-start"><?= esc($order['alamat']) ?></p>
                                    </div>
                                    <hr>
                                    <p class="text-start"><strong>Catatan:</strong> <?= esc($order['catatan']) ?></p>
                                    <hr>
                                    <div x-data="{ open: false }">
                                        <button @click="open = !open" class="button mb-3 w-100 text-start"><u><b>Order details</b></u></button>
                                        <div x-show="open" class="table-responsive">
                                            <table class="table">
                                                <thead class="table-transparent">
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
                                                                <td><?= esc(str_replace('_', ' ', $item['nama_pakaian'])) ?></td>
                                                                <td><?= esc($item['jumlah']) ?></td>
                                                                <td><?= esc($item['berat_satuan']) ?></td>
                                                                <td><?= esc($item['total_berat']) ?></td>
                                                                <td>Rp<?= number_format($item['subtotal'], 0, ',', '.') ?></td>
                                                            </tr>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                            <?php if (!empty($order['jasa_express']) && $order['jasa_express'] != 0): ?>
                                                <p class="text-end text-secondary"><strong>Jasa Express:</strong> Rp<?= number_format($order['jasa_express'], 0, ',', '.') ?></p>
                                            <?php endif; ?>
                                            <p class="text-end text-secondary"><strong>Jenis Layanan:</strong> <?= esc($order['jenis_layanan']) ?></p>
                                            <p class="text-end text-secondary"><strong>Total Berat:</strong> <?= esc($order['total_berat']) ?> kg</p>
                                            <p class="text-end text-secondary"><strong>Total Harga:</strong>
                                                <span class="text-info fw-bold fs-3">Rp<?= number_format($order['total_harga'], 0, ',', '.') ?></span>
                                            </p>
                                        </div>
                                    </div>
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