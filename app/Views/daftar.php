<?= $this->extend('layout-login/template'); ?>

<?= $this->section('content'); ?>
<hr>
<div class="bg-home d-flex justify-content-center">
    <!-- Login Card -->
    <div class="card shadow-sm border-0 rounded-1 p-4 mb-4 mb-5 me-md-3" style="width: 100%; max-width: 400px;">
        <h4 class="mb-4 text-start fw-bold"><?= esc($title2) ?></h4>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger text-center" role="alert">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="/Daftar/auth" method="post">
            <div class="mb-3 me-3 ml-3 text-start">
                <div class="input-group">
                    <span class="input-group-text rounded-0 bg-light">
                        <i class="fa-solid fa-user"></i>
                    </span>
                    <input type="username" id="username" name="username" class="rounded-0 form-control" placeholder="Username" required>
                </div>
            </div>
            <div class="d-flex">
                <div class="mb-3 me-3 ml-3 text-start">
                    <div class="input-group">
                        <span class="input-group-text rounded-0 bg-light">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email" id="email" name="email" class="rounded-0 form-control" placeholder="E-mail" required>
                    </div>
                </div>
                <br>

                <div class="mb-3 text-start">
                    <div class="input-group">
                        <span class="input-group-text rounded-0 bg-light">
                            <i class="fa-solid fa-phone"></i>
                        </span>
                        <input type="text" id="no_telp" name="no_telp" class="rounded-0 form-control" placeholder="Nomor Telpon" required>
                    </div>
                </div>
            </div>
            <div class="mb-3 text-start">
                <div class="input-group">
                    <span class="input-group-text rounded-0 bg-light">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input type="password" id="password" name="password" class="rounded-0 form-control" placeholder="Password" required>
                </div>
            </div>
            <button type="submit" class="btn btn-info rounded-0 text-white w-100">Daftar</button>
        </form>

        <p class="text-center mt-3">Sudah punya akun? <a href="/Login/">Login</a></p>

    </div>
</div>
<?= $this->endSection(); ?>