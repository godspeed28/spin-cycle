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
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Table Layanan</h4>
                        <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addRowModal">
                            <i class="fa fa-plus"></i>
                            Tambah Layanan
                        </button>
                    </div>
                </div>
                <div class="card-body">

                    <!-- Modal Tambah -->
                    <div class="modal fade" id="addRowModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <h5 class="modal-title">
                                        <span class="fw-mediumbold">Tambah</span>
                                        <span class="fw-light">Layanan</span>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="<?= base_url('/services/save') ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <div class="modal-body">
                                        <p class="small">Isi form untuk menambahkan layanan baru. Pastikan semua data terisi.</p>
                                        <div class="row">
                                            <div class="col-sm-12 mb-3">
                                                <label>Nama Layanan</label>
                                                <input name="nama" type="text" class="form-control" required>
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <label>Harga Per Kg</label>
                                                <input name="harga_per_kg" type="number" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-0">
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Tabel Service -->
                    <div class="table-responsive">
                        <table id="myTable" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Harga Per Kg</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($services as $service) : ?>
                                    <tr>
                                        <td><?= esc($service['nama']) ?></td>
                                        <td><?= esc(ubahRp($service['harga_per_kg'])) ?></td>
                                        <td>
                                            <div class="form-button-action">
                                                <!-- Tombol Edit -->
                                                <button type="button" class="btn btn-link btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#editModal<?= $service['id'] ?>" data-bs-toggle="tooltip" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <!-- Tombol Hapus -->
                                                <form id="deleteForm-<?= $service['id'] ?>" action="<?= base_url('/services/delete/' . $service['id']) ?>" method="post" class="d-inline">
                                                    <?= csrf_field() ?>
                                                    <button type="button" class="btn btn-link btn-danger" data-bs-toggle="tooltip" title="Hapus" onclick="confirmDelete(<?= $service['id'] ?>)">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="editModal<?= $service['id'] ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="<?= base_url('/services/update/' . $service['id']) ?>" method="post">
                                                <?= csrf_field(); ?>
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Layanan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label>Nama</label>
                                                            <input name="nama" type="text" class="form-control" value="<?= esc($service['nama']) ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label>Harga Per Kg</label>
                                                            <input name="harga_per_kg" type="number" class="form-control" value="<?= esc($service['harga_per_kg']) ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
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

<!-- Script SweetAlert & Tooltip -->
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Yakin ingin menghapus data ini?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm-' + id).submit();
            }
        });
    }
</script>

<?= $this->endSection(); ?>