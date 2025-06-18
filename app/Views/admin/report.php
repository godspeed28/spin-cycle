<?= $this->extend('layout-admin/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="page-inner">
        <!-- Judul halaman -->
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3"><?= $title ?></h3>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">

                <!-- Header dengan tombol cetak PDF & Ekspor Excel -->
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title m-0">Tabel Laporan</h4>
                    <div class="d-flex gap-2">
                        <a href="<?= base_url('generate-pdf?tanggal_awal=' . $tanggal_awal . '&tanggal_akhir=' . $tanggal_akhir) ?>"
                            target="_blank"
                            class="btn btn-danger">
                            Cetak PDF
                        </a>
                        <a href="<?= base_url('generate-excel?tanggal_awal=' . $tanggal_awal . '&tanggal_akhir=' . $tanggal_akhir) ?>"
                            target="_blank"
                            class="btn btn-success">
                            Ekspor Excel
                        </a>
                    </div>
                </div>


                <div class="card-body">
                    <!-- Form Filter Tanggal -->
                    <form method="get" class="mb-4">
                        <div class="row g-2 align-items-end">
                            <div class="col-md-4">
                                <label for="tanggal_awal" class="form-label">Tanggal Awal</label>
                                <input type="date" id="tanggal_awal" name="tanggal_awal"
                                    value="<?= esc($tanggal_awal) ?>"
                                    class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
                                <input type="date" id="tanggal_akhir" name="tanggal_akhir"
                                    value="<?= esc($tanggal_akhir) ?>"
                                    class="form-control">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary w-100">Filter</button>
                            </div>
                        </div>
                    </form>

                    <!-- Tabel Data -->
                    <div class="table-responsive">
                        <table id="myTable" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Resi</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Nama Pakaian</th>
                                    <th>Jumlah</th>
                                    <th>Total Berat</th>
                                    <th>Subtotal</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($items as $item): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= esc($item->no_resi) ?></td>
                                        <td><?= esc($item->nama) ?></td>
                                        <td><?= remove_underscore($item->nama_pakaian) ?></td>
                                        <td><?= esc($item->jumlah) ?></td>
                                        <td><?= esc($item->total_berat) ?></td>
                                        <td><?= ubahRp($item->subtotal) ?></td>
                                        <td><?= esc($item->tanggal) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>