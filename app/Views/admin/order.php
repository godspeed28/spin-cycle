<?= $this->extend('layout-admin/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3"><?= $title ?></h3>
            </div>
        </div>

        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar Pesanan</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTable" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Layanan</th>
                                    <!-- <th>Total Berat</th> -->
                                    <th>Total Harga</th>
                                    <th>Status</th>
                                    <th>Paid</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($orders as $order) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= esc($order['nama']) ?></td>
                                        <td>
                                            <?= esc($order['jenis_layanan']) ?>
                                            <?= $order['jasa_express'] ? '(Express)' : '' ?>
                                        </td>

                                        <td>Rp<?= number_format($order['total_harga'], 0, ',', '.') ?></td>
                                        <td><?= $order['status'] ?></td>
                                        <td><?= $order['paid'] ? 'Sudah Bayar' : 'Belum Bayar' ?></td>
                                        <td class="d-flex gap-2">
                                            <a href="<?= base_url('admin/orders/detail/' . $order['id']) ?>" class="btn btn-sm btn-primary">
                                                Lihat Detail
                                            </a>
                                            <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#kelolaModal<?= $order['id'] ?>">
                                                Kelola
                                            </a>
                                        </td>
                                    </tr>
                                    <!-- Modal Kelola Pesanan -->
                                    <div class="modal fade" id="kelolaModal<?= $order['id'] ?>" tabindex="-1" aria-labelledby="kelolaModalLabel<?= $order['id'] ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="<?= base_url('order/update/' . $order['id']) ?>" method="post">
                                                <?= csrf_field(); ?>
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="kelolaModalLabel<?= $order['id'] ?>">Kelola Pesanan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label class="form-label">Status</label>
                                                            <select name="status" class="form-select" required>
                                                                <?php foreach ($statuses as $status) : ?>
                                                                    <option value="<?= $status ?>" <?= $order['status'] == $status ? 'selected' : '' ?>><?= $status ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">Status Pembayaran</label>
                                                            <select name="paid" class="form-select" required>
                                                                <option value="0" <?= $order['paid'] == 0 ? 'selected' : '' ?>>Belum Bayar</option>
                                                                <option value="1" <?= $order['paid'] == 1 ? 'selected' : '' ?>>Sudah Bayar</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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