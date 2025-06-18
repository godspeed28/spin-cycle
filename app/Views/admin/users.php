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
                        <h4 class="card-title">Tabel Users</h4>
                        <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addRowModal">
                            <i class="fa fa-plus"></i> Tambah User
                        </button>
                    </div>
                </div>

                <div class="card-body">

                    <!-- Modal Tambah -->
                    <div class="modal fade" id="addRowModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="<?= base_url('/users/save') ?>" method="post" class="modal-content">
                                <?= csrf_field(); ?>
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah User Baru</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="small">Isi semua field dengan benar.</p>
                                    <div class="mb-3">
                                        <label>Username</label>
                                        <input name="username" type="text" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input name="email" type="email" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Password</label>
                                        <input name="password" type="password" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>No. Handphone</label>
                                        <input name="no_telp" type="text" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Role</label>
                                        <select name="role" class="form-control" required>
                                            <option value="" disabled selected>Pilih Role</option>
                                            <option value="admin">Admin</option>
                                            <option value="customer">Customer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Table Users -->
                    <div class="table-responsive">
                        <table id="myTable" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>No. HP</th>
                                    <th>Role</th>
                                    <th style="width: 10%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user) : ?>
                                    <?php if ($user['username'] != getUsername()) : ?>
                                        <tr>
                                            <td><?= esc($user['username']) ?></td>
                                            <td><?= esc($user['email']) ?></td>
                                            <td><?= esc($user['no_telp']) ?></td>
                                            <td><?= esc($user['role']) ?></td>
                                            <td>
                                                <div class="form-button-action">
                                                    <!-- Edit -->
                                                    <button type="button" class="btn btn-link btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $user['id'] ?>" title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <!-- Delete -->
                                                    <form id="deleteForm-<?= $user['id'] ?>" action="<?= base_url('/users/delete/' . $user['id']) ?>" method="post" class="d-inline">
                                                        <?= csrf_field(); ?>
                                                        <button type="button" class="btn btn-link btn-danger btn-sm" title="Hapus" onclick="confirmDelete(<?= $user['id'] ?>)">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <!-- Modal Edit -->
                        <?php foreach ($users as $user) : ?>
                            <div class="modal fade" id="editModal<?= $user['id'] ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="<?= base_url('/users/update/' . $user['id']) ?>" method="post" class="modal-content">
                                        <?= csrf_field(); ?>
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit User</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label>Username</label>
                                                <input name="username" type="text" class="form-control" value="<?= esc($user['username']) ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Email</label>
                                                <input name="email" type="email" class="form-control" value="<?= esc($user['email']) ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>No. Handphone</label>
                                                <input name="no_telp" type="text" class="form-control" value="<?= esc($user['no_telp']) ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Role</label>
                                                <select name="role" class="form-control" required>
                                                    <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                                                    <option value="customer" <?= $user['role'] == 'customer' ? 'selected' : '' ?>>Customer</option>
                                                </select>
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

<?= $this->endSection(); ?>