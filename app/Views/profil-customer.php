<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<style>
    ul {
        list-style: none;
        padding-left: 0;
    }

    #nav {
        cursor: pointer;
    }

    #nav li:hover {
        color: #0dcaf0;
        transition: 0.2s ease-in-out;
    }

    .neonGreen {
        color: #39FF14;
    }

    #pesananSaya ul li {
        cursor: pointer;
    }

    .fade-in {
        opacity: 0;
        transform: translateY(-10px);
        transition: opacity 0.3s ease, transform 0.3s ease;
    }

    .fade-in.show {
        opacity: 1;
        transform: translateY(0);
    }

    /* Responsive Styles */
    @media (max-width: 992px) {

        .bg-page h5,
        .bg-page h1 {
            margin-left: 20px !important;
        }

        .container.d-flex {
            flex-direction: column;
        }


        .container.pt-3.bg-light {
            max-width: 100% !important;
            border-right: none !important;
            border-bottom: 1px solid #ccc;
            margin-bottom: 20px;
        }

        #profilSaya,
        #pesananSaya,
        #ubahPass {
            margin-left: 0 !important;
        }

        .d-flex.container {
            flex-direction: column;
        }

        .form-control {
            max-width: 100% !important;
        }

        #pesananSaya ul.d-flex {
            flex-wrap: wrap;
            gap: 10px;
        }

        #pesananSaya ul.d-flex li {
            padding: 5px 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
    }

    @media (max-width: 768px) {
        .d-flex.container.justify-content-end {
            justify-content: center !important;
        }

        .btn-info {
            width: 100%;
            margin-top: 25px;
        }

        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .border.p-2.mb-3 {
            padding: 10px !important;
        }

        .d-flex.flex-wrap.small {
            flex-direction: column;
            gap: 5px;
        }

        .vr {
            display: none;
        }
    }

    @media (max-width: 576px) {
        .bg-page h5 {
            font-size: 14px;
        }

        .bg-page h1 {
            font-size: 24px;
        }

        .container.d-flex.p-3 {
            padding: 10px !important;
        }

        #pesananSaya ul.d-flex {
            overflow-x: auto;
            white-space: nowrap;
            display: block;
            padding-bottom: 10px;
        }

        #pesananSaya ul.d-flex li {
            display: inline-block;
            margin-right: 10px;
        }

        table.table-sm {
            font-size: 12px;
        }
    }
</style>

<div class="text-start d-flex flex-column bg-page">
    <h5 class="align-self-start ms-4 ms-lg-5"><a href="/" class="hover-menu text-decoration-none text-info">Home</a> / Profil</h5>
    <br>
    <h1 class="align-self-start fw-bold ms-4 ms-lg-5">Profil</h1>
</div>

<hr class="text-info w-75 w-lg-50 mx-auto">

<div class="container d-flex p-3 bg-light flex-column flex-lg-row">
    <div class="container pt-3 bg-light" style="border-right: 1px solid #ccc; max-width:200px;">
        <div class="container d-flex">
            <i class="fas fs-4 fa-user-cog"></i> &nbsp; &nbsp;
            <p class="text-muted mt-2" style="font-size: small;">Ubah Profil</p>
        </div>
        <ul id="nav" style="font-size: small;">
            <li id="navAkunSaya"><i class="text-primary bi bi-person"></i> <b>Akun Saya</b></li>
            <ul id="dropdownAkunSaya" style="margin-left: 25px;" class="text-muted">
                <li id="navProfil" class="text-info">Profil</li>
                <li id="navPass"><a href="<?= base_url('verify') ?>" style="text-decoration: none; color:inherit;">Ubah Password</a></li>
            </ul>
            <li id="navPesanan"><i class="text-primary bi bi-bag"></i> <b>Pesanan Saya</b></li>
        </ul>
    </div>
    <div id="profilSaya" class="container bg-white pt-3 ms-lg-3">
        <h5>Profil Saya</h5>
        <p style="font-size: small;">Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun</p>
        <hr>
        <div class="container">
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <form action="<?= base_url('profil-customer/update') ?>" method="post">
                <?= csrf_field() ?>
                <div class="d-flex flex-column flex-lg-row">
                    <div class="container">
                        <label for="username" class="text-muted" style="font-size: small;">Username</label>
                        <input type="text" name="username" id="username"
                            class="form-control rounded-0 <?= session('validation') && session('validation')->hasError('username') ? 'is-invalid' : '' ?>"
                            value="<?= old('username', $user['username']) ?>">
                        <?php if (session('validation') && session('validation')->hasError('username')) : ?>
                            <div class="invalid-feedback">
                                <?= session('validation')->getError('username') ?>
                            </div>
                        <?php endif; ?>

                        <label for="email" class="mt-3 text-muted" style="font-size: small;">Email</label>
                        <input type="email" name="email" id="email"
                            class="form-control rounded-0 <?= session('validation') && session('validation')->hasError('email') ? 'is-invalid' : '' ?>"
                            value="<?= old('email', $user['email']) ?>">
                        <?php if (session('validation') && session('validation')->hasError('email')) : ?>
                            <div class="invalid-feedback">
                                <?= session('validation')->getError('email') ?>
                            </div>
                        <?php endif; ?>

                        <label for="no_telp" class="mt-3 text-muted" style="font-size: small;">No. Hp</label>
                        <input type="tel" name="no_telp" id="no_telp"
                            class="form-control rounded-0 mb-3 <?= session('validation') && session('validation')->hasError('no_telp') ? 'is-invalid' : '' ?>"
                            value="<?= old('no_telp', $user['no_telp']) ?>">
                        <?php if (session('validation') && session('validation')->hasError('no_telp')) : ?>
                            <div class="invalid-feedback">
                                <?= session('validation')->getError('no_telp') ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="container">
                        <label for="alamat" class="text-muted" style="font-size: small;">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="4"
                            class="form-control rounded-0"
                            placeholder="Tuliskan alamat penjemputan dan pengiriman Anda"><?= old('alamat', $user['alamat']) ?></textarea>
                    </div>
                </div>
        </div>

        <div class="d-flex container justify-content-end">
            <button type="submit" class="btn text-white mb-3 fw-bold btn-info rounded-0">Simpan</button>
        </div>
        </form>
    </div>

    <div id="pesananSaya" class="container d-none pt-3 ms-lg-3">
        <div class="container shadow-sm bg-white">
            <ul class="d-flex flex-wrap gap-2">
                <li id="navSemua" class="active-nav">Semua</li>
                <li id="navProses">Diproses</li>
                <li id="navUnpaid">Belum Bayar</li>
                <li id="navKirim">Dikirim</li>
                <li id="navSelesai">Selesai</li>
                <li id="navBatal">Dibatalkan</li>
            </ul>
        </div>

        <div id="semuaPesanan" class="mt-2 shadow-sm container p-3 bg-white">
            <h5>Pesanan Saya</h5>
            <hr>
            <?php if (empty($orders)): ?>
                <div class="alert alert-info small text-center">Belum ada pesanan.</div>
            <?php else: ?>
                <p class="text-start small">
                    <a class="btn btn-sm btn-primary rounded-0" href="/test-download">📄 Cetak Invoice</a>
                </p>

                <?php foreach ($orders as $index => $order): ?>
                    <div class="border p-2 mb-3 bg-white rounded-0">
                        <h6 class="mb-2 fw-bold fs-6">
                            <span class="<?php
                                            switch ($order['status']) {
                                                case 'Menunggu konfirmasi':
                                                    echo 'text-warning';
                                                    break;
                                                case 'Menunggu penjemputan':
                                                    echo 'text-warning';
                                                    break;
                                                case 'Sedang dicuci':
                                                    echo 'text-primary';
                                                    break;
                                                case 'Siap diantar':
                                                    echo 'text-success';
                                                    break;
                                                case 'Dalam pengantaran':
                                                    echo 'text-success';
                                                    break;
                                                case 'Selesai':
                                                    echo 'text-primary';
                                                    break;
                                                case 'Dibatalkan':
                                                    echo 'text-danger';
                                                    break;
                                                default:
                                                    echo 'text-secondary';
                                            }
                                            ?>">
                                <?= esc($order['status']) ?> | <?= esc($order['no_resi']) ?> | Created: <?= $order['created_at'] ?>
                            </span>
                        </h6>

                        <p class="text-start small">Thank you. Your order has been received.</p>
                        <hr class="my-1">
                        <div class="d-flex flex-wrap small">
                            <div class="text-secondary mx-1">Order: <?= esc($order['no_resi']) ?></div>
                            <div class="vr mx-1"></div>
                            <div class="text-secondary mx-1">Pickup: <?= esc($order['tanggal']) ?> - <?= esc($order['waktu']) ?></div>
                            <div class="vr mx-1"></div>
                            <div class="text-secondary mx-1">Total: Rp<?= number_format($order['total_harga'], 0, ',', '.') ?></div>
                            <div class="vr mx-1"></div>
                            <div class="text-secondary mx-1">Pembayaran: <?= esc($order['metode_pembayaran']) ?></div>
                        </div>

                        <hr class="my-1">
                        <div class="container px-0 small">
                            <h6 class="text-start text-info mb-1"><i class="bi bi-geo-alt"></i> Alamat Pickup & Pengiriman</h6>
                            <p class="text-start mb-0"><?= esc($order['nama']) ?><?= ' (+62) ' . substr($noHp['no_telp'], 1) ?></p>
                            <p class="text-start"><?= esc($order['alamat']) ?></p>
                        </div>

                        <hr class="my-1">
                        <p class="text-start small"><strong>Catatan:</strong> <?= esc($order['catatan']) ?></p>

                        <hr class="my-1">
                        <div class="table-responsive small">
                            <h6 class="mb-1">Order Details:</h6>
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Nama Pakaian</th>
                                        <th>Jumlah</th>
                                        <th>Berat</th>
                                        <th>Total Berat</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($orderItem as $item): ?>
                                        <?php if ($item['order_id'] == $order['id']): ?>
                                            <tr>
                                                <td><?= esc(str_replace('_', ' ', $item['nama_pakaian'])) ?></td>
                                                <td><?= esc($item['jumlah']) ?></td>
                                                <td><?= esc($item['berat_satuan']) ?> kg</td>
                                                <td><?= esc($item['total_berat']) ?> kg</td>
                                                <td>Rp<?= number_format($item['subtotal'], 0, ',', '.') ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                            <?php if (!empty($order['jasa_express']) && $order['jasa_express'] != 0): ?>
                                <p class="text-end text-secondary"><strong>Jasa Express:</strong> Rp<?= number_format($order['jasa_express'], 0, ',', '.') ?></p>
                            <?php endif; ?>
                            <p class="text-end text-secondary"><strong>Layanan:</strong> <?= esc($order['jenis_layanan']) ?></p>
                            <p class="text-end text-secondary"><strong>Total Berat:</strong> <?= esc($order['total_berat']) ?> kg</p>
                            <p class="text-end text-secondary mb-1"><strong>Total Harga:</strong>
                                <span class="text-info fw-bold fs-6">Rp<?= number_format($order['total_harga'], 0, ',', '.') ?></span>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div id="pesananProses" class="mt-2 shadow-sm container d-none p-3 bg-white">
            <h5>Pesanan Saya</h5>
            <hr>
            <?php if (empty($ordersProses)): ?>
                <div class="alert alert-info small text-center">Belum ada pesanan.</div>
            <?php else: ?>
                <p class="text-start small">
                    <a class="btn btn-sm btn-primary rounded-0" href="/test-download">📄 Cetak Invoice</a>
                </p>

                <?php foreach ($ordersProses as $index => $order): ?>
                    <div class="border p-2 mb-3 bg-white rounded-0">
                        <h6 class="mb-2 fw-bold fs-6">
                            <span class="<?php
                                            switch ($order['status']) {
                                                case 'Menunggu konfirmasi':
                                                    echo 'text-warning';
                                                    break;
                                                case 'Menunggu penjemputan':
                                                    echo 'text-warning';
                                                    break;
                                                case 'Sedang dicuci':
                                                    echo 'text-primary';
                                                    break;
                                                case 'Siap diantar':
                                                    echo 'text-success';
                                                    break;
                                                case 'Dalam pengantaran':
                                                    echo 'text-success';
                                                    break;
                                                case 'Selesai':
                                                    echo 'text-primary';
                                                    break;
                                                case 'Dibatalkan':
                                                    echo 'text-danger';
                                                    break;
                                                default:
                                                    echo 'text-secondary';
                                            }
                                            ?>">
                                <?= esc($order['status']) ?> | <?= esc($order['no_resi']) ?> | Created: <?= $order['created_at'] ?>
                            </span>
                        </h6>

                        <p class="text-start small">Thank you. Your order has been received.</p>
                        <hr class="my-1">
                        <div class="d-flex flex-wrap small">
                            <div class="text-secondary mx-1">Order: <?= esc($order['no_resi']) ?></div>
                            <div class="vr mx-1"></div>
                            <div class="text-secondary mx-1">Pickup: <?= esc($order['tanggal']) ?> - <?= esc($order['waktu']) ?></div>
                            <div class="vr mx-1"></div>
                            <div class="text-secondary mx-1">Total: Rp<?= number_format($order['total_harga'], 0, ',', '.') ?></div>
                            <div class="vr mx-1"></div>
                            <div class="text-secondary mx-1">Pembayaran: <?= esc($order['metode_pembayaran']) ?></div>
                        </div>

                        <hr class="my-1">
                        <div class="container px-0 small">
                            <h6 class="text-start text-info mb-1"><i class="bi bi-geo-alt"></i> Alamat Pickup & Pengiriman</h6>
                            <p class="text-start mb-0"><?= esc($order['nama']) ?><?= ' (+62) ' . substr($noHp['no_telp'], 1) ?></p>
                            <p class="text-start"><?= esc($order['alamat']) ?></p>
                        </div>

                        <hr class="my-1">
                        <p class="text-start small"><strong>Catatan:</strong> <?= esc($order['catatan']) ?></p>

                        <hr class="my-1">
                        <div class="table-responsive small">
                            <h6 class="mb-1">Order Details:</h6>
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Nama Pakaian</th>
                                        <th>Jumlah</th>
                                        <th>Berat</th>
                                        <th>Total Berat</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($orderItem as $item): ?>
                                        <?php if ($item['order_id'] == $order['id']): ?>
                                            <tr>
                                                <td><?= esc(str_replace('_', ' ', $item['nama_pakaian'])) ?></td>
                                                <td><?= esc($item['jumlah']) ?></td>
                                                <td><?= esc($item['berat_satuan']) ?> kg</td>
                                                <td><?= esc($item['total_berat']) ?> kg</td>
                                                <td>Rp<?= number_format($item['subtotal'], 0, ',', '.') ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                            <?php if (!empty($order['jasa_express']) && $order['jasa_express'] != 0): ?>
                                <p class="text-end text-secondary"><strong>Jasa Express:</strong> Rp<?= number_format($order['jasa_express'], 0, ',', '.') ?></p>
                            <?php endif; ?>
                            <p class="text-end text-secondary"><strong>Layanan:</strong> <?= esc($order['jenis_layanan']) ?></p>
                            <p class="text-end text-secondary"><strong>Total Berat:</strong> <?= esc($order['total_berat']) ?> kg</p>
                            <p class="text-end text-secondary mb-1"><strong>Total Harga:</strong>
                                <span class="text-info fw-bold fs-6">Rp<?= number_format($order['total_harga'], 0, ',', '.') ?></span>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div id="unpaid" class="mt-2 shadow-sm container d-none p-3 bg-white">
            <h5>Pesanan Saya</h5>
            <hr>
            <?php if (empty($ordersUnpaid)): ?>
                <div class="alert alert-info small text-center">Belum ada pesanan.</div>
            <?php else: ?>
                <p class="text-start small">
                    <a class="btn btn-sm btn-primary rounded-0" href="/test-download">📄 Cetak Invoice</a>
                </p>

                <?php foreach ($ordersUnpaid as $index => $order): ?>
                    <div class="border p-2 mb-3 bg-white rounded-0">
                        <h6 class="mb-2 fw-bold fs-6">
                            <span class="<?php
                                            switch ($order['status']) {
                                                case 'Menunggu konfirmasi':
                                                    echo 'text-warning';
                                                    break;
                                                case 'Menunggu penjemputan':
                                                    echo 'text-warning';
                                                    break;
                                                case 'Sedang dicuci':
                                                    echo 'text-primary';
                                                    break;
                                                case 'Siap diantar':
                                                    echo 'text-success';
                                                    break;
                                                case 'Dalam pengantaran':
                                                    echo 'text-success';
                                                    break;
                                                case 'Selesai':
                                                    echo 'text-primary';
                                                    break;
                                                case 'Dibatalkan':
                                                    echo 'text-danger';
                                                    break;
                                                default:
                                                    echo 'text-secondary';
                                            }
                                            ?>">
                                <?= esc($order['status']) ?> | <?= esc($order['no_resi']) ?> | Created: <?= $order['created_at'] ?>
                            </span>
                        </h6>

                        <p class="text-start small">Thank you. Your order has been received.</p>
                        <hr class="my-1">
                        <div class="d-flex flex-wrap small">
                            <div class="text-secondary mx-1">Order: <?= esc($order['no_resi']) ?></div>
                            <div class="vr mx-1"></div>
                            <div class="text-secondary mx-1">Pickup: <?= esc($order['tanggal']) ?> - <?= esc($order['waktu']) ?></div>
                            <div class="vr mx-1"></div>
                            <div class="text-secondary mx-1">Total: Rp<?= number_format($order['total_harga'], 0, ',', '.') ?></div>
                            <div class="vr mx-1"></div>
                            <div class="text-secondary mx-1">Pembayaran: <?= esc($order['metode_pembayaran']) ?></div>
                        </div>

                        <hr class="my-1">
                        <div class="container px-0 small">
                            <h6 class="text-start text-info mb-1"><i class="bi bi-geo-alt"></i> Alamat Pickup & Pengiriman</h6>
                            <p class="text-start mb-0"><?= esc($order['nama']) ?><?= ' (+62) ' . substr($noHp['no_telp'], 1) ?></p>
                            <p class="text-start"><?= esc($order['alamat']) ?></p>
                        </div>

                        <hr class="my-1">
                        <p class="text-start small"><strong>Catatan:</strong> <?= esc($order['catatan']) ?></p>

                        <hr class="my-1">
                        <div class="table-responsive small">
                            <h6 class="mb-1">Order Details:</h6>
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Nama Pakaian</th>
                                        <th>Jumlah</th>
                                        <th>Berat</th>
                                        <th>Total Berat</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($orderItem as $item): ?>
                                        <?php if ($item['order_id'] == $order['id']): ?>
                                            <tr>
                                                <td><?= esc(str_replace('_', ' ', $item['nama_pakaian'])) ?></td>
                                                <td><?= esc($item['jumlah']) ?></td>
                                                <td><?= esc($item['berat_satuan']) ?> kg</td>
                                                <td><?= esc($item['total_berat']) ?> kg</td>
                                                <td>Rp<?= number_format($item['subtotal'], 0, ',', '.') ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                            <?php if (!empty($order['jasa_express']) && $order['jasa_express'] != 0): ?>
                                <p class="text-end text-secondary"><strong>Jasa Express:</strong> Rp<?= number_format($order['jasa_express'], 0, ',', '.') ?></p>
                            <?php endif; ?>
                            <p class="text-end text-secondary"><strong>Layanan:</strong> <?= esc($order['jenis_layanan']) ?></p>
                            <p class="text-end text-secondary"><strong>Total Berat:</strong> <?= esc($order['total_berat']) ?> kg</p>
                            <p class="text-end text-secondary mb-1"><strong>Total Harga:</strong>
                                <span class="text-info fw-bold fs-6">Rp<?= number_format($order['total_harga'], 0, ',', '.') ?></span>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div id="pesananKirim" class="mt-2 shadow-sm container d-none p-3 bg-white">
            <h5>Pesanan Saya</h5>
            <hr>
            <?php if (empty($ordersKirim)): ?>
                <div class="alert alert-info small text-center">Belum ada pesanan.</div>
            <?php else: ?>
                <p class="text-start small">
                    <a class="btn btn-sm btn-primary rounded-0" href="/test-download">📄 Cetak Invoice</a>
                </p>

                <?php foreach ($ordersKirim as $index => $order): ?>
                    <div class="border p-2 mb-3 bg-white rounded-0">
                        <h6 class="mb-2 fw-bold fs-6">
                            <span class="<?php
                                            switch ($order['status']) {
                                                case 'Menunggu konfirmasi':
                                                    echo 'text-warning';
                                                    break;
                                                case 'Menunggu penjemputan':
                                                    echo 'text-warning';
                                                    break;
                                                case 'Sedang dicuci':
                                                    echo 'text-primary';
                                                    break;
                                                case 'Siap diantar':
                                                    echo 'text-success';
                                                    break;
                                                case 'Dalam pengantaran':
                                                    echo 'text-success';
                                                    break;
                                                case 'Selesai':
                                                    echo 'text-primary';
                                                    break;
                                                case 'Dibatalkan':
                                                    echo 'text-danger';
                                                    break;
                                                default:
                                                    echo 'text-secondary';
                                            }
                                            ?>">
                                <?= esc($order['status']) ?> | <?= esc($order['no_resi']) ?> | Created: <?= $order['created_at'] ?>
                            </span>
                        </h6>

                        <p class="text-start small">Thank you. Your order has been received.</p>
                        <hr class="my-1">
                        <div class="d-flex flex-wrap small">
                            <div class="text-secondary mx-1">Order: <?= esc($order['no_resi']) ?></div>
                            <div class="vr mx-1"></div>
                            <div class="text-secondary mx-1">Pickup: <?= esc($order['tanggal']) ?> - <?= esc($order['waktu']) ?></div>
                            <div class="vr mx-1"></div>
                            <div class="text-secondary mx-1">Total: Rp<?= number_format($order['total_harga'], 0, ',', '.') ?></div>
                            <div class="vr mx-1"></div>
                            <div class="text-secondary mx-1">Pembayaran: <?= esc($order['metode_pembayaran']) ?></div>
                        </div>

                        <hr class="my-1">
                        <div class="container px-0 small">
                            <h6 class="text-start text-info mb-1"><i class="bi bi-geo-alt"></i> Alamat Pickup & Pengiriman</h6>
                            <p class="text-start mb-0"><?= esc($order['nama']) ?><?= ' (+62) ' . substr($noHp['no_telp'], 1) ?></p>
                            <p class="text-start"><?= esc($order['alamat']) ?></p>
                        </div>

                        <hr class="my-1">
                        <p class="text-start small"><strong>Catatan:</strong> <?= esc($order['catatan']) ?></p>

                        <hr class="my-1">
                        <div class="table-responsive small">
                            <h6 class="mb-1">Order Details:</h6>
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Nama Pakaian</th>
                                        <th>Jumlah</th>
                                        <th>Berat</th>
                                        <th>Total Berat</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($orderItem as $item): ?>
                                        <?php if ($item['order_id'] == $order['id']): ?>
                                            <tr>
                                                <td><?= esc(str_replace('_', ' ', $item['nama_pakaian'])) ?></td>
                                                <td><?= esc($item['jumlah']) ?></td>
                                                <td><?= esc($item['berat_satuan']) ?> kg</td>
                                                <td><?= esc($item['total_berat']) ?> kg</td>
                                                <td>Rp<?= number_format($item['subtotal'], 0, ',', '.') ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                            <?php if (!empty($order['jasa_express']) && $order['jasa_express'] != 0): ?>
                                <p class="text-end text-secondary"><strong>Jasa Express:</strong> Rp<?= number_format($order['jasa_express'], 0, ',', '.') ?></p>
                            <?php endif; ?>
                            <p class="text-end text-secondary"><strong>Layanan:</strong> <?= esc($order['jenis_layanan']) ?></p>
                            <p class="text-end text-secondary"><strong>Total Berat:</strong> <?= esc($order['total_berat']) ?> kg</p>
                            <p class="text-end text-secondary mb-1"><strong>Total Harga:</strong>
                                <span class="text-info fw-bold fs-6">Rp<?= number_format($order['total_harga'], 0, ',', '.') ?></span>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div id="pesananSelesai" class="mt-2 shadow-sm container d-none p-3 bg-white">
            <h5>Pesanan Saya</h5>
            <hr>
            <?php if (empty($ordersSelesai)): ?>
                <div class="alert alert-info small text-center">Belum ada pesanan.</div>
            <?php else: ?>
                <p class="text-start small">
                    <a class="btn btn-sm btn-primary rounded-0" href="/test-download">📄 Cetak Invoice</a>
                </p>

                <?php foreach ($ordersSelesai as $index => $order): ?>
                    <div class="border p-2 mb-3 bg-white rounded-0">
                        <h6 class="mb-2 fw-bold fs-6">
                            <span class="<?php
                                            switch ($order['status']) {
                                                case 'Menunggu konfirmasi':
                                                    echo 'text-warning';
                                                    break;
                                                case 'Menunggu penjemputan':
                                                    echo 'text-warning';
                                                    break;
                                                case 'Sedang dicuci':
                                                    echo 'text-primary';
                                                    break;
                                                case 'Siap diantar':
                                                    echo 'text-success';
                                                    break;
                                                case 'Dalam pengantaran':
                                                    echo 'text-success';
                                                    break;
                                                case 'Selesai':
                                                    echo 'text-primary';
                                                    break;
                                                case 'Dibatalkan':
                                                    echo 'text-danger';
                                                    break;
                                                default:
                                                    echo 'text-secondary';
                                            }
                                            ?>">
                                <?= esc($order['status']) ?> | <?= esc($order['no_resi']) ?> | Created: <?= $order['created_at'] ?>
                            </span>
                        </h6>

                        <p class="text-start small">Thank you. Your order has been received.</p>
                        <hr class="my-1">
                        <div class="d-flex flex-wrap small">
                            <div class="text-secondary mx-1">Order: <?= esc($order['no_resi']) ?></div>
                            <div class="vr mx-1"></div>
                            <div class="text-secondary mx-1">Pickup: <?= esc($order['tanggal']) ?> - <?= esc($order['waktu']) ?></div>
                            <div class="vr mx-1"></div>
                            <div class="text-secondary mx-1">Total: Rp<?= number_format($order['total_harga'], 0, ',', '.') ?></div>
                            <div class="vr mx-1"></div>
                            <div class="text-secondary mx-1">Pembayaran: <?= esc($order['metode_pembayaran']) ?></div>
                        </div>

                        <hr class="my-1">
                        <div class="container px-0 small">
                            <h6 class="text-start text-info mb-1"><i class="bi bi-geo-alt"></i> Alamat Pickup & Pengiriman</h6>
                            <p class="text-start mb-0"><?= esc($order['nama']) ?><?= ' (+62) ' . substr($noHp['no_telp'], 1) ?></p>
                            <p class="text-start"><?= esc($order['alamat']) ?></p>
                        </div>

                        <hr class="my-1">
                        <p class="text-start small"><strong>Catatan:</strong> <?= esc($order['catatan']) ?></p>

                        <hr class="my-1">
                        <div class="table-responsive small">
                            <h6 class="mb-1">Order Details:</h6>
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Nama Pakaian</th>
                                        <th>Jumlah</th>
                                        <th>Berat</th>
                                        <th>Total Berat</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($orderItem as $item): ?>
                                        <?php if ($item['order_id'] == $order['id']): ?>
                                            <tr>
                                                <td><?= esc(str_replace('_', ' ', $item['nama_pakaian'])) ?></td>
                                                <td><?= esc($item['jumlah']) ?></td>
                                                <td><?= esc($item['berat_satuan']) ?> kg</td>
                                                <td><?= esc($item['total_berat']) ?> kg</td>
                                                <td>Rp<?= number_format($item['subtotal'], 0, ',', '.') ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                            <?php if (!empty($order['jasa_express']) && $order['jasa_express'] != 0): ?>
                                <p class="text-end text-secondary"><strong>Jasa Express:</strong> Rp<?= number_format($order['jasa_express'], 0, ',', '.') ?></p>
                            <?php endif; ?>
                            <p class="text-end text-secondary"><strong>Layanan:</strong> <?= esc($order['jenis_layanan']) ?></p>
                            <p class="text-end text-secondary"><strong>Total Berat:</strong> <?= esc($order['total_berat']) ?> kg</p>
                            <p class="text-end text-secondary mb-1"><strong>Total Harga:</strong>
                                <span class="text-info fw-bold fs-6">Rp<?= number_format($order['total_harga'], 0, ',', '.') ?></span>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div id="pesananBatal" class="mt-2 shadow-sm container d-none p-3 bg-white">
            <h5>Pesanan Saya</h5>
            <hr>
            <?php if (empty($ordersBatal)): ?>
                <div class="alert alert-info small text-center">Belum ada pesanan.</div>
            <?php else: ?>
                <p class="text-start small">
                    <a class="btn btn-sm btn-primary rounded-0" href="/test-download">📄 Cetak Invoice</a>
                </p>

                <?php foreach ($ordersBatal as $index => $order): ?>
                    <div class="border p-2 mb-3 bg-white rounded-0">
                        <h6 class="mb-2 fw-bold fs-6">
                            <span class="<?php
                                            switch ($order['status']) {
                                                case 'Menunggu konfirmasi':
                                                    echo 'text-warning';
                                                    break;
                                                case 'Menunggu penjemputan':
                                                    echo 'text-warning';
                                                    break;
                                                case 'Sedang dicuci':
                                                    echo 'text-primary';
                                                    break;
                                                case 'Siap diantar':
                                                    echo 'text-success';
                                                    break;
                                                case 'Dalam pengantaran':
                                                    echo 'text-success';
                                                    break;
                                                case 'Selesai':
                                                    echo 'text-primary';
                                                    break;
                                                case 'Dibatalkan':
                                                    echo 'text-danger';
                                                    break;
                                                default:
                                                    echo 'text-secondary';
                                            }
                                            ?>">
                                <?= esc($order['status']) ?> | <?= esc($order['no_resi']) ?> | Created: <?= $order['created_at'] ?>
                            </span>
                        </h6>

                        <p class="text-start small">Thank you. Your order has been received.</p>
                        <hr class="my-1">
                        <div class="d-flex flex-wrap small">
                            <div class="text-secondary mx-1">Order: <?= esc($order['no_resi']) ?></div>
                            <div class="vr mx-1"></div>
                            <div class="text-secondary mx-1">Pickup: <?= esc($order['tanggal']) ?> - <?= esc($order['waktu']) ?></div>
                            <div class="vr mx-1"></div>
                            <div class="text-secondary mx-1">Total: Rp<?= number_format($order['total_harga'], 0, ',', '.') ?></div>
                            <div class="vr mx-1"></div>
                            <div class="text-secondary mx-1">Pembayaran: <?= esc($order['metode_pembayaran']) ?></div>
                        </div>

                        <hr class="my-1">
                        <div class="container px-0 small">
                            <h6 class="text-start text-info mb-1"><i class="bi bi-geo-alt"></i> Alamat Pickup & Pengiriman</h6>
                            <p class="text-start mb-0"><?= esc($order['nama']) ?><?= ' (+62) ' . substr($noHp['no_telp'], 1) ?></p>
                            <p class="text-start"><?= esc($order['alamat']) ?></p>
                        </div>

                        <hr class="my-1">
                        <p class="text-start small"><strong>Catatan:</strong> <?= esc($order['catatan']) ?></p>

                        <hr class="my-1">
                        <div class="table-responsive small">
                            <h6 class="mb-1">Order Details:</h6>
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Nama Pakaian</th>
                                        <th>Jumlah</th>
                                        <th>Berat</th>
                                        <th>Total Berat</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($orderItem as $item): ?>
                                        <?php if ($item['order_id'] == $order['id']): ?>
                                            <tr>
                                                <td><?= esc(str_replace('_', ' ', $item['nama_pakaian'])) ?></td>
                                                <td><?= esc($item['jumlah']) ?></td>
                                                <td><?= esc($item['berat_satuan']) ?> kg</td>
                                                <td><?= esc($item['total_berat']) ?> kg</td>
                                                <td>Rp<?= number_format($item['subtotal'], 0, ',', '.') ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                            <?php if (!empty($order['jasa_express']) && $order['jasa_express'] != 0): ?>
                                <p class="text-end text-secondary"><strong>Jasa Express:</strong> Rp<?= number_format($order['jasa_express'], 0, ',', '.') ?></p>
                            <?php endif; ?>
                            <p class="text-end text-secondary"><strong>Layanan:</strong> <?= esc($order['jenis_layanan']) ?></p>
                            <p class="text-end text-secondary"><strong>Total Berat:</strong> <?= esc($order['total_berat']) ?> kg</p>
                            <p class="text-end text-secondary mb-1"><strong>Total Harga:</strong>
                                <span class="text-info fw-bold fs-6">Rp<?= number_format($order['total_harga'], 0, ',', '.') ?></span>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>


    </div>

    <div id="ubahPass" class="container bg-white d-none pt-3 ms-lg-3">
        <h5>Ubah Password</h5>
        <p style="font-size: small;">Untuk keamanan akun Anda, mohon untuk tidak menyebarkan password Anda ke orang lain.</p>
        <hr>
        <div class="container">
            <form id="formUbahPassword" action="<?= base_url('changePass') ?>" method="post">
                <div id="newPasswordSuccess" class="valid-feedback d-block neonGreen" style="display: none;"></div>
                <label for="new_password" class="mt-3 text-muted" style="font-size: small;">Password Baru</label>
                <input type="password" name="password" class="form-control rounded-0" id="new_password">
                <div id="newPasswordError" class="invalid-feedback d-block text-danger" style="display: none;"></div>

                <label for="confirm_password" class="mt-3 text-muted" style="font-size: small;">Konfirmasi Password</label>
                <input type="password" name="confirm_password" class="form-control rounded-0" id="confirm_password">
                <div id="confirmPasswordError" class="invalid-feedback d-block text-danger" style="display: none;"></div>

                <button type="submit" class="btn btn-info text-white mt-3 mb-3 rounded-0 fw-bold w-100 w-lg-auto">Simpan</button>
            </form>
        </div>
    </div>
</div>

<script>
    const profil = document.getElementById('profilSaya');
    const pesanan = document.getElementById('pesananSaya');
    const password = document.getElementById('ubahPass');
    const navPesanan = document.getElementById('navPesanan');
    const navProfil = document.getElementById('navProfil');
    const navAkunSaya = document.getElementById('navAkunSaya');
    const navPass = document.getElementById('navPass');
    const redirectSource = "<?= session()->getFlashdata('redirect_source') ?>";
    const redirectSource2 = "<?= session()->getFlashdata('success') ?>";
    const navSemua = document.getElementById('navSemua');
    const navProses = document.getElementById('navProses');
    const navKirim = document.getElementById('navKirim');
    const navUnpaid = document.getElementById('navUnpaid');
    const navBatal = document.getElementById('navBatal');
    const navSelesai = document.getElementById('navSelesai');

    const semuaPesanan = document.getElementById('semuaPesanan');
    const pesananProses = document.getElementById('pesananProses');
    const pesananKirim = document.getElementById('pesananKirim');
    const unpaid = document.getElementById('unpaid');
    const pesananBatal = document.getElementById('pesananBatal');
    const pesananSelesai = document.getElementById('pesananSelesai');

    const dropdownAkunSaya = document.getElementById('dropdownAkunSaya');

    navProses.addEventListener('click', function() {
        navSemua.classList.remove('active-nav')
        navProses.classList.add('active-nav')
        navUnpaid.classList.remove('active-nav')
        navKirim.classList.remove('active-nav')
        navBatal.classList.remove('active-nav')
        navSelesai.classList.remove('active-nav')

        semuaPesanan.classList.add('d-none')
        unpaid.classList.add('d-none')
        pesananKirim.classList.add('d-none')
        pesananBatal.classList.add('d-none')
        pesananSelesai.classList.add('d-none')
        pesananProses.classList.remove('d-none')
    })

    navSemua.addEventListener('click', function() {
        navSemua.classList.add('active-nav')
        navProses.classList.remove('active-nav')
        navUnpaid.classList.remove('active-nav')
        navKirim.classList.remove('active-nav')
        navBatal.classList.remove('active-nav')
        navSelesai.classList.remove('active-nav')

        unpaid.classList.add('d-none')
        pesananKirim.classList.add('d-none')
        pesananBatal.classList.add('d-none')
        pesananSelesai.classList.add('d-none')
        pesananProses.classList.add('d-none')
        semuaPesanan.classList.remove('d-none')
    })

    navUnpaid.addEventListener('click', function() {
        navUnpaid.classList.add('active-nav')
        navProses.classList.remove('active-nav')
        navSemua.classList.remove('active-nav')
        navKirim.classList.remove('active-nav')
        navBatal.classList.remove('active-nav')
        navSelesai.classList.remove('active-nav')

        semuaPesanan.classList.add('d-none')
        pesananKirim.classList.add('d-none')
        pesananBatal.classList.add('d-none')
        pesananSelesai.classList.add('d-none')
        pesananProses.classList.add('d-none')
        unpaid.classList.remove('d-none')
    })

    navKirim.addEventListener('click', function() {
        navUnpaid.classList.remove('active-nav')
        navProses.classList.remove('active-nav')
        navSemua.classList.remove('active-nav')
        navKirim.classList.add('active-nav')
        navBatal.classList.remove('active-nav')
        navSelesai.classList.remove('active-nav')

        semuaPesanan.classList.add('d-none')
        unpaid.classList.add('d-none')
        pesananProses.classList.add('d-none')
        pesananBatal.classList.add('d-none')
        pesananSelesai.classList.add('d-none')
        pesananKirim.classList.remove('d-none')
    })

    navBatal.addEventListener('click', function() {
        navBatal.classList.add('active-nav')
        navUnpaid.classList.remove('active-nav')
        navProses.classList.remove('active-nav')
        navSemua.classList.remove('active-nav')
        navKirim.classList.remove('active-nav')
        navSelesai.classList.remove('active-nav')

        semuaPesanan.classList.add('d-none')
        unpaid.classList.add('d-none')
        pesananKirim.classList.add('d-none')
        pesananProses.classList.add('d-none')
        pesananSelesai.classList.add('d-none')
        pesananBatal.classList.remove('d-none')
    })

    navSelesai.addEventListener('click', function() {
        navSelesai.classList.add('active-nav')
        navUnpaid.classList.remove('active-nav')
        navProses.classList.remove('active-nav')
        navSemua.classList.remove('active-nav')
        navKirim.classList.remove('active-nav')
        navBatal.classList.remove('active-nav')

        semuaPesanan.classList.add('d-none')
        unpaid.classList.add('d-none')
        pesananKirim.classList.add('d-none')
        pesananProses.classList.add('d-none')
        pesananBatal.classList.add('d-none')
        pesananSelesai.classList.remove('d-none')
    })


    navPesanan.addEventListener('click', function() {
        navProfil.classList.remove('text-info')
        navPass.classList.remove('text-info')
        pesanan.classList.remove('d-none')
        profil.classList.add('d-none')
        navPesanan.classList.add('text-info')
        password.classList.add('d-none')
    })

    function hideDropdown() {
        dropdownAkunSaya.classList.remove('show');
        setTimeout(() => {
            dropdownAkunSaya.classList.add('d-none');
        }, 300);
    }

    navPesanan.addEventListener('click', function() {
        hideDropdown();
    });


    navProfil.addEventListener('click', function() {
        profil.classList.remove('d-none')
        navPesanan.classList.remove('text-info')
        navPass.classList.remove('text-info')
        pesanan.classList.add('d-none')
        navProfil.classList.add('text-info')
        password.classList.add('d-none')
    })

    navAkunSaya.addEventListener('click', function() {
        profil.classList.remove('d-none')
        navPass.classList.remove('text-info')
        navPesanan.classList.remove('text-info')
        navProfil.classList.add('text-info')
        pesanan.classList.add('d-none')
        password.classList.add('d-none')
        dropdownAkunSaya.classList.remove('d-none')

        dropdownAkunSaya.classList.add('fade-in');
        setTimeout(() => {
            dropdownAkunSaya.classList.add('show');
        }, 10);
    })

    if (redirectSource === 'verifikasiSukses' || redirectSource2 == 'Password berhasil diubah.') {
        navPass.classList.add('text-info')
        navProfil.classList.remove('text-info')
        profil.classList.add('d-none')
        password.classList.remove('d-none')
    }

    if (redirectSource2 == 'Password berhasil diubah.') {
        const successPass = document.getElementById('newPasswordSuccess')
        successPass.textContent = 'Password berhasil diubah.';
        successPass.style.display = 'block';
    }

    document.getElementById('formUbahPassword').addEventListener('submit', function(e) {
        const password = document.getElementById('new_password');
        const confirmPassword = document.getElementById('confirm_password');
        const errorPass = document.getElementById('newPasswordError');
        const errorConfirm = document.getElementById('confirmPasswordError');

        let valid = true;

        // Reset error state
        password.classList.remove('is-invalid');
        confirmPassword.classList.remove('is-invalid');
        errorPass.style.display = 'none';
        errorConfirm.style.display = 'none';

        // Validasi password kosong
        if (password.value.trim() === '') {
            password.classList.add('is-invalid');
            errorPass.textContent = 'Password tidak boleh kosong.';
            errorPass.style.display = 'block';
            valid = false;
        }

        // Validasi konfirmasi kosong
        if (confirmPassword.value.trim() === '') {
            confirmPassword.classList.add('is-invalid');
            errorConfirm.textContent = 'Konfirmasi Password tidak boleh kosong.';
            errorConfirm.style.display = 'block';
            valid = false;
        }

        // Validasi cocok
        if (password.value && confirmPassword.value && password.value !== confirmPassword.value) {
            confirmPassword.classList.add('is-invalid');
            errorConfirm.textContent = 'Password dan konfirmasi tidak cocok.';
            errorConfirm.style.display = 'block';
            valid = false;
        }

        if (!valid) {
            e.preventDefault(); // Stop submit
        }
    });
</script>

<?= $this->endSection(); ?>