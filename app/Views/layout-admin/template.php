<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>SpinCycle | Admin - <?= $title ?></title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="<?= base_url('img/favicon.png') ?>" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="<?= base_url('assets/js/plugin/webfont/webfont.min.js') ?>"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["<?= base_url('assets/css/fonts.min.css') ?>"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/plugins.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/kaiadmin.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/demo.css') ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

    <?= $this->include('layout-admin/sidebar'); ?>
    <?= $this->renderSection('content'); ?>
    <?= $this->include('layout-admin/footer'); ?>

    <!-- Core JS Files -->
    <script src="<?= base_url('assets/js/core/jquery-3.7.1.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/core/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/core/bootstrap.min.js') ?>"></script>

    <!-- Plugin JS -->
    <script src="<?= base_url('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugin/chart.js/chart.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugin/chart-circle/circles.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugin/datatables/datatables.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugin/sweetalert/sweetalert.min.js') ?>"></script>

    <!-- Kaiadmin JS -->
    <script src="<?= base_url('assets/js/kaiadmin.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/demo.js') ?>"></script>
    <script src="<?= base_url('assets/js/setting-demo.js') ?>"></script>

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- DataTables Init -->
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable(); // pastikan ID sesuai dengan tabel di bawah
        });

        // Saat pengguna mengetik di input search
        document.querySelector('.form-control').addEventListener('keyup', function() {
            const keyword = this.value.toLowerCase(); // ambil nilai input
            const rows = document.querySelectorAll('#myTable tr'); // ambil semua baris

            rows.forEach(function(row) {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(keyword) ? '' : 'none';
            });
        });
    </script>

</body>

</html>