<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | Spin Cycle</title>
    <link rel="icon" href="/img/favicon.png" type="image/x-icon" />
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key=<?= $apiKey ?>></script>
    <script>
        snap.pay("<?= $snapToken ?>", {
            onSuccess: function(result) {
                Swal.fire({
                    icon: 'success',
                    title: 'Pembayaran Berhasil!',
                    text: 'Terima kasih, pembayaran Anda telah dikonfirmasi.',
                    confirmButtonText: 'Lanjutkan'
                }).then(() => {
                    window.location.href = "/";
                });
            },
            onPending: function(result) {
                Swal.fire({
                    icon: 'info',
                    title: 'Pembayaran Pending',
                    text: 'Silakan selesaikan pembayaran Anda untuk melanjutkan.',
                    confirmButtonText: 'OK'
                });
            },
            onError: function(result) {
                Swal.fire({
                    icon: 'error',
                    title: 'Pembayaran Gagal',
                    text: 'Terjadi kesalahan saat memproses pembayaran.',
                    confirmButtonText: 'Coba Lagi'
                });
            },
            onClose: function() {
                Swal.fire({
                    icon: 'warning',
                    title: 'Jendela Ditutup',
                    text: 'Kamu menutup jendela pembayaran sebelum menyelesaikannya.',
                    confirmButtonText: 'OK'
                });
            }
        });
    </script>
</body>

</html>