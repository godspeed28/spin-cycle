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

        <div class="container mt-4">
            <div class="card shadow-sm">
                <div class="card-header bg-white text-dark">
                    <h5 class="fw-bold mb-0">Setting Profil</h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('profil/update') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>

                        <!-- Username -->
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" value="<?= $user['username'] ?>">
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="<?= $user['email'] ?>">
                        </div>

                        <!-- No Telepon -->
                        <div class="mb-3">
                            <label for="no_telp" class="form-label">No. Telepon</label>
                            <input type="text" name="no_telp" class="form-control" value="<?= $user['no_telp'] ?>">
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Password Baru -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password Baru</label>
                                    <input type="password" name="password" class="form-control">
                                </div>

                                <!-- Konfirmasi Password -->
                                <div class="mb-3">
                                    <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                                    <input type="password" name="confirm_password" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Foto Profil -->
                                <div class="mb-3">
                                    <label for="foto" class="form-label">Foto Profil</label>
                                    <input type="file" name="foto" class="form-control">
                                    <?php if (!empty($user['foto'])) : ?>
                                        <p class="text-muted mt-2">Kosongkan jika tidak ingin mengganti foto.</p>
                                    <?php else : ?>
                                        <p class="text-muted mt-2">Belum ada foto.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>