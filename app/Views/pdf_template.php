<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
    <link rel="icon" type="image/x-icon" href="/img/favicon.png" />
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.5;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #444;
            margin: 5px 0;
        }

        .content {
            margin: 10px 0;
        }

        .card {
            border: none;
        }

        .card-header {
            background-color: #f7f2f2;
            padding: 8px;
        }

        .text-secondary {
            color: #6c757d;
        }

        .text-info {
            color: #17a2b8;
        }

        .text-success {
            color: #28a745;
        }

        .text-danger {
            color: #dc3545;
        }

        .fw-bold {
            font-weight: bold;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }

        .table th,
        .table td {
            padding: 6px;
            border: 1px solid #dee2e6;
            text-align: left;
        }

        .table th {
            background-color: #f8f9fa;
        }

        hr {
            margin: 8px 0;
            border: 0;
            border-top: 1px solid #eee;
        }

        .d-flex {
            display: flex;
            flex-wrap: wrap;
        }

        .mb-3 {
            margin-bottom: 10px;
        }

        .text-start {
            text-align: left;
        }

        .text-end {
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-header">
            <h4><?= esc($title) ?></h4>
        </div>

        <div class="card-body">
            <hr>
            <?php if (empty($orders)): ?>
                <div>Belum ada pesanan.</div>
            <?php else: ?>
                <?php foreach ($orders as $index => $order): ?>
                    <?php foreach ($orderStatuses[$order['id']] as $status): ?>
                        <?php
                        $warnaStatus = 'text-info'; // default
                        if ($status['status'] === 'Dibatalkan') {
                            $warnaStatus = 'text-danger';
                        } elseif ($status['status'] === 'Selesai') {
                            $warnaStatus = 'text-success';
                        }
                        ?>
                        <div class=" mb-3">
                            <h3 class="<?= $warnaStatus ?>">
                                <?= esc($status['status']) ?> | <?= esc($order['no_resi']) ?> |
                                <?= date('d-F-Y h:i:s A', strtotime(esc($status['created_at']))) ?>
                            </h3>

                            <div>
                                <hr>
                                <div class="d-flex">
                                    <div style="margin: 5px 10px;">Order Number: <?= esc($order['no_resi']) ?></div>
                                    <div style="margin: 5px 10px;">Date Pickup: <?= esc($order['tanggal']) . '-' . $order['waktu'] ?></div>
                                    <div style="margin: 5px 10px;">Total: Rp<?= number_format($order['total_harga'], 0, ',', '.') ?></div>
                                    <div style="margin: 5px 10px;">Metode Pembayaran: <?= esc($order['metode_pembayaran']) ?></div>
                                </div>
                                <hr>

                                <h5 class="text-info mb-3">Alamat Pickup & Pengiriman</h5>
                                <h6><?= esc($order['nama']) ?><?= ' (+62) ' . substr($noHp, 1) ?></h6>
                                <p><?= esc($order['alamat']) ?></p>
                                <hr>

                                <p><strong>Catatan:</strong> <?= esc($order['catatan']) ?></p>
                                <hr>

                                <h5 class="fw-bold">Order details</h5>
                                <table class="table">
                                    <thead>
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
                                    <p class="text-end"><strong>Jasa Express:</strong> Rp<?= number_format($order['jasa_express'], 0, ',', '.') ?></p>
                                <?php endif; ?>
                                <p class="text-end"><strong>Jenis Layanan:</strong> <?= esc($order['jenis_layanan']) ?></p>
                                <p class="text-end"><strong>Total Berat:</strong> <?= esc($order['total_berat']) ?> kg</p>
                                <p class="text-end fw-bold">Total Harga: Rp<?= number_format($order['total_harga'], 0, ',', '.') ?></p>
                            </div>
                        </div>
                        <hr>
                        <div style="margin-bottom: 27%;"></div>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>