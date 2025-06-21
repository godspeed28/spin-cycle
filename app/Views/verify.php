<?= $this->extend('layout-verify/template'); ?>

<?= $this->section('content'); ?>

<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow rounded-0 p-4" style="width: 100%; max-width: 400px;">
        <h6 class="text-center mb-3">Masukan Password SpinCycle</h5>

            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger text-center" role="alert">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('check') ?>" method="post">
                <?= csrf_field(); ?>

                <div class="mb-3 mt-3 position-relative">
                    <input type="password" name="verify_pass" id="verify-pass" placeholder="Masukan password untuk verifikasi" class="form-control form-control rounded-0 pr-5" required autofocus>

                    <span id="togglePassword" style="cursor: pointer; position: absolute; top: 5px; right: 15px;">
                        <i class="bi bi-eye-slash-fill"></i>
                    </span>
                </div>

                <button type="submit" class="btn btn-info w-100 text-white fw-bold mt-3 rounded-0">Konfirmasi</button>
            </form>
    </div>
</div>

<script>
    const togglePassword = document.querySelector("#togglePassword");
    const passwordInput = document.querySelector("#verify-pass");

    togglePassword.addEventListener("click", function() {

        const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
        passwordInput.setAttribute("type", type);

        this.innerHTML = type === "password" ?
            '<i class="bi bi-eye-slash-fill"></i>' :
            '<i class="bi bi-eye-fill"></i>';
    });
</script>

<?= $this->endSection(); ?>