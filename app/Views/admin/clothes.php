<?= $this->extend('layout-admin/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3"><?= $title ?></h3>
            </div>
        </div>

        <!-- Flash Message -->
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php elseif (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Tabel Pakaian</h4>
                        <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addRowModal">
                            <i class="fa fa-plus"></i> Tambah Pakaian
                        </button>
                    </div>
                </div>

                <div class="card-body">

                    <!-- Modal Tambah -->
                    <div class="modal fade" id="addRowModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="<?= base_url('/clothes/save') ?>" method="post" enctype="multipart/form-data" class="modal-content">
                                <?= csrf_field(); ?>
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Pakaian Baru</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="small">Isi semua field dengan benar.</p>
                                    <div class="mb-3">
                                        <label>Nama</label>
                                        <input name="nama" type="text" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Berat (kg)</label>
                                        <input name="berat" type="number" step="0.01" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Gambar</label>
                                        <input name="foto" type="file" class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Table Pakaian -->
                    <div class="table-responsive">
                        <table id="myTable" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Berat</th>
                                    <th>Gambar</th>
                                    <th style="width: 10%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($clothes as $cloth) : ?>
                                    <tr>
                                        <td><?= esc($cloth['nama']) ?></td>
                                        <td><?= esc($cloth['berat']) ?> kg</td>
                                        <td><img width="50" class="img-thumbnail" src="<?= base_url('uploads/' . $cloth['foto']) ?>" alt=""></td>
                                        <td>
                                            <div class="form-button-action">
                                                <!-- Edit -->
                                                <button type="button" class="btn btn-link btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $cloth['id'] ?>" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <!-- Delete -->
                                                <form id="deleteForm-<?= $cloth['id'] ?>" action="<?= base_url('/clothes/delete/' . $cloth['id']) ?>" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <button type="button" class="btn btn-link btn-danger btn-sm" title="Hapus" onclick="confirmDelete(<?= $cloth['id'] ?>)">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <!-- Modal Edit Per Item -->
                        <?php foreach ($clothes as $cloth) : ?>
                            <div class="modal fade" id="editModal<?= $cloth['id'] ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="<?= base_url('/clothes/update/' . $cloth['id']) ?>" method="post" enctype="multipart/form-data" class="modal-content">
                                        <?= csrf_field(); ?>
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Pakaian</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label>Nama</label>
                                                <input name="nama" type="text" class="form-control" value="<?= esc($cloth['nama']) ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Berat (kg)</label>
                                                <input name="berat" type="number" step="0.01" class="form-control" value="<?= esc($cloth['berat']) ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Gambar</label><br>
                                                <img src="<?= base_url('uploads/' . $cloth['foto']) ?>" alt="" width="50" class="img-thumbnail mb-2">
                                                <input name="foto" type="file" class="form-control">
                                                <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert Delete Confirmation -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Data tidak bisa dikembalikan!",
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

<!-- Optional: Validasi File JS -->
<script>
    document.querySelectorAll('input[type="file"]').forEach(input => {
        input.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                if (!allowedTypes.includes(file.type)) {
                    alert('Hanya file gambar (jpg/png/jpeg) yang diperbolehkan!');
                    this.value = '';
                } else if (file.size > 2 * 1024 * 1024) {
                    alert('Ukuran file maksimal 2MB!');
                    this.value = '';
                }
            }
        });
    });
</script>

<?= $this->endSection(); ?>