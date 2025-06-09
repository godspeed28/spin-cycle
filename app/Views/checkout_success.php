<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Checkout Sukses</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <script>
        <?php if (session()->getFlashdata('message')): ?>
            Swal.fire({
                title: 'Sukses!',
                text: '<?= session()->getFlashdata('message') ?>',
                icon: 'success',
                confirmButtonText: 'OK',
                confirmButtonColor: '#0dcaf0',
                timer: 3000,
                timerProgressBar: true
            }).then(() => {
                // Arahkan kembali ke halaman utama atau ke halaman lain jika perlu
                window.location.href = "<?= base_url('/') ?>";
            });
        <?php endif; ?>
    </script>

</body>

</html>