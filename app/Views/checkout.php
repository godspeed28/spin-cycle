<?= $this->extend('layout-login/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="card shadow-lg border-primary">
        <div class="card-header border-primary bg-transparent">
            <h4><i class="bi bi-<?= $icon ?> me-2" style="color:black;"></i></h4>
        </div>
        <div class="card-body">
            <h5><i class="bi bi-person-circle me-2"></i>Nama Pelanggan: <span id="namaPelanggan">Jimmy Page</span></h5>
            <h6><i class="bi bi-geo-alt-fill me-2"></i>Alamat: <span id="alamatPelanggan">Jl. Raya No. 10, Jakarta</span></h6>
            <h6><i class="bi bi-calendar-event me-2"></i>Tanggal Penjemputan: <span id="tanggalPenjemputan">16 April 2025</span></h6>
            <h6><i class="bi bi-clock-fill me-2"></i>Waktu Penjemputan: <span id="waktuPenjemputan">10:30 WIB</span></h6>

            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>Jenis Pakaian</th>
                        <th>Jumlah</th>
                        <th>Berat (kg)</th>
                    </tr>
                </thead>
                <tbody id="detailPakaian">
                    <!-- Rincian pakaian akan diisi melalui JavaScript -->
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" class="text-end"><strong>Ongkos Kirim</strong></td>
                        <td id="ongkosKirim">Rp 0</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-end"><strong>Jenis Layanan</strong></td>
                        <td id="jenisLayanan">0.00 kg</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-end"><strong>Total Berat</strong></td>
                        <td id="totalBeratCheckout">0.00 kg</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-end"><strong>Harga Estimasi</strong></td>
                        <td id="totalHargaCheckout">Rp 0</td>
                    </tr>
                </tfoot>
            </table>

            <div class="mb-3">
                <label for="metodePembayaran" class="form-label">
                    <strong><i class="bi bi-credit-card-2-back me-2"></i>Metode Pembayaran</strong>
                </label>
                <select class="form-select" id="metodePembayaran">
                    <option selected disabled>Pilih metode pembayaran</option>
                    <option value="cod">Bayar di Tempat (COD)</option>
                    <option value="midtrans">Bayar via Midtrans (Gopay, ShopeePay, Transfer Bank, QRIS, dll)</option>
                </select>
            </div>

            <div class="d-grid mt-4">
                <button class="btn btn-primary btn-lg">
                    <i class="bi bi-check-circle me-2"></i>Konfirmasi Pesanan
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    // Data simulasi dari form sebelumnya (harus disesuaikan dengan data form)
    const pakaianData = [{
            nama: 'Kaos',
            jumlah: 5,
            berat: 0.2
        },
        {
            nama: 'Kemeja',
            jumlah: 7,
            berat: 0.3
        }
        // {
        //     nama: 'Jaket Tebal',
        //     jumlah: 1,
        //     berat: 1.0
        // },
        // {
        //     nama: 'Sprei King',
        //     jumlah: 1,
        //     berat: 0.8
        // }
    ];

    // Estimasi harga per kg
    const cuciKering = 5000;
    const cuciStrika = 8000;
    const strikaSaja = 4000;
    const ongkir = 8000;

    function updateCheckout() {
        const tableBody = document.getElementById('detailPakaian');
        let totalBerat = 0;
        let totalHarga = 0;

        // Hapus konten lama
        tableBody.innerHTML = '';

        pakaianData.forEach(pakaian => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${pakaian.nama}</td>
                <td>${pakaian.jumlah}</td>
                <td>${(pakaian.jumlah * pakaian.berat).toFixed(2)} kg</td>
            `;
            tableBody.appendChild(row);

            totalBerat += pakaian.jumlah * pakaian.berat;
        });

        totalHarga = totalBerat * strikaSaja + ongkir;

        // Update total berat dan harga estimasi
        document.getElementById('ongkosKirim').textContent = `Rp ${ongkir.toLocaleString()}`;
        document.getElementById('jenisLayanan').textContent = `Strika Saja - Rp ${strikaSaja.toLocaleString()}`;
        document.getElementById('totalBeratCheckout').textContent = `${totalBerat.toFixed(2)} kg`;
        document.getElementById('totalHargaCheckout').textContent = `Rp ${totalHarga.toLocaleString()}`;
    }

    updateCheckout(); // Inisialisasi halaman checkout
</script>

<?= $this->endSection(); ?>