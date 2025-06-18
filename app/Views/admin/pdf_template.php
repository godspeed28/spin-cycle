<!DOCTYPE html>
<html>

<head>
    <title>Laporan Order Item</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h3 {
            margin-bottom: 0;
        }
    </style>
</head>

<body>

    <h3>Laporan Order Item</h3>
    <?php if ($tanggal_awal && $tanggal_akhir): ?>
        <p>Periode: <?= date('d/m/Y', strtotime($tanggal_awal)) ?> - <?= date('d/m/Y', strtotime($tanggal_akhir)) ?></p>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>No Resi</th>
                <th>Nama Pelanggan</th>
                <th>Nama Pakaian</th>
                <th>Jumlah</th>
                <th>Total Berat (Kg)</th>
                <th>Subtotal (Rp)</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($items as $item): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $item->no_resi ?></td>
                    <td><?= $item->nama ?></td>
                    <td><?= remove_underscore($item->nama_pakaian) ?></td>
                    <td><?= $item->jumlah ?></td>
                    <td><?= $item->total_berat ?></td>
                    <td><?= number_format($item->subtotal, 0, ',', '.') ?></td>
                    <td><?= $item->tanggal ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>