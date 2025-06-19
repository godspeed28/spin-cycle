<?= $this->extend('layout-admin/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
  <div class="page-inner">
    <div
      class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
      <div>
        <h3 class="fw-bold mb-3"><?= $title ?></h3>
        <h6 class="op-7 mb-2">Pantau pesanan dan pelanggan Anda</h6>
      </div>
      <div class="ms-md-auto py-2 py-md-0">
        <a href="<?= base_url('order') ?>" class="btn btn-label-info btn-round me-2">Manage Order</a>
        <a href="<?= base_url('users') ?>" class="btn btn-primary btn-round">Add Customer</a>
      </div>
    </div>
    <div class="row row-card-no-pd">
      <div class="col-12 col-sm-6 col-md-6 col-xl-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div>
                <h6><b>Todays Income</b></h6>
                <p class="text-muted">All Customs Value</p>
              </div>
              <h5 class="text-info fw-bold"><?= getPendapatanHariIni() ?></h5>
            </div>
            <div class="progress progress-sm">
              <div
                class="progress-bar bg-info"
                role="progressbar"
                style="width:<?= getPersenPendapatanHariIni() ?>%"
                aria-valuenow="<?= getPersenPendapatanHariIni() ?>"
                aria-valuemin="0"
                aria-valuemax="100"></div>
            </div>
            <div class="d-flex justify-content-between mt-2">
              <p class="text-muted mb-0">Change</p>
              <p class="text-muted mb-0"><?= getPersenPendapatanHariIni() ?>%</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-6 col-xl-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div>
                <h6><b>Total Revenue</b></h6>
                <p class="text-muted">All Customs Value</p>
              </div>
              <h5 class="text-success fw-bold"><?= getPendapatan() ?></h5>
            </div>
            <div class="progress progress-sm">
              <div
                class="progress-bar bg-success"
                role="progressbar"
                style="width: <?= getPersenPendapatan() ?>%;"
                aria-valuenow="<?= getPersenPendapatan() ?>"
                aria-valuemin="0"
                aria-valuemax="100"></div>
            </div>
            <div class="d-flex justify-content-between mt-2">
              <p class="text-muted mb-0">Change</p>
              <p class="text-muted mb-0"><?= getPersenPendapatan() ?>%</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-6 col-xl-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div>
                <h6><b>New Orders</b></h6>
                <p class="text-muted">Fresh Order Amount</p>
              </div>
              <h4 class="text-danger fw-bold"><?= getFreshOrdersHariIni() ?></h4>
            </div>
            <div class="progress progress-sm">
              <div
                class="progress-bar bg-danger"
                role="progressbar"
                style="width: <?= getPersenFreshOrdersHariIni() ?>%;"
                aria-valuenow="<?= getPersenFreshOrdersHariIni() ?>"
                aria-valuemin="0"
                aria-valuemax="100">
              </div>
            </div>

            <div class="d-flex justify-content-between mt-2">
              <p class="text-muted mb-0">Change</p>
              <p class="text-muted mb-0"><?= getPersenFreshOrdersHariIni() ?>%</p>
            </div>
          </div>

        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-6 col-xl-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div>
                <h6><b>New Users</b></h6>
                <p class="text-muted">Joined New User</p>
              </div>
              <h4 class="text-secondary fw-bold"><?= getNewUsersToday() ?></h4>
            </div>

            <div class="progress progress-sm">
              <div
                class="progress-bar bg-secondary"
                role="progressbar"
                style="width: <?= getPersenNewUsersToday() ?>%;"
                aria-valuenow="<?= getPersenNewUsersToday() ?>"
                aria-valuemin="0"
                aria-valuemax="100">
              </div>
            </div>

            <div class="d-flex justify-content-between mt-2">
              <p class="text-muted mb-0">Change</p>
              <p class="text-muted mb-0"><?= getPersenNewUsersToday() ?>%</p>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <div class="card card-round">
          <div class="card-header">
            <div class="card-head-row">
              <div class="card-title">Order Statistics</div>
              <div class="card-tools">
                <a
                  onclick="downloadPDF('statisticsChart')"
                  class="btn btn-label-success btn-round btn-sm me-2">
                  <span class="btn-label">
                    <i class="fa fa-pencil"></i>
                  </span>
                  Export PDF
                </a>
                <a onclick="printChart('statisticsChart')" class="btn btn-label-info btn-round btn-sm">
                  <span class="btn-label">
                    <i class="fa fa-print"></i>
                  </span>
                  Print
                </a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="chart-container" style="min-height: 375px">
              <canvas id="statisticsChart"></canvas>
            </div>
            <div id="myChartLegend"></div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-primary card-round">
          <div class="card-header">
            <div class="card-head-row">
              <div class="card-title">Daily Sales</div>
              <div class="card-tools">
                <a onclick="downloadDailySalesChartPDF()"
                  class="btn btn-sm btn-label-light"
                  type="button">
                  <span class="btn-label">
                    <i class="fa fa-pencil"></i>
                  </span>
                  Export PDF
                </a>
              </div>
            </div>
            <div class="card-category">
              <?= $tglStartFormatted . ' - ' . $tglEndFormatted; ?>
            </div>
          </div>
          <div class="card-body pb-0">
            <div class="mb-4 mt-2">
              <h1><?= ubahRp($pendapatanPerMinggu) ?></h1>
            </div>
            <div class="pull-in">
              <canvas id="dailySalesChart"></canvas>
            </div>
          </div>
        </div>
        <div class="card card-round">
          <div class="card-body pb-0">
            <div class="h1 fw-bold float-end text-primary"><?php if (getPersenOnlineUsers() != 0) : ?>+<?= getPersenOnlineUsers() ?>%<?php endif; ?></div>
            <h2 class="mb-2"><?= getOnlineUsers() ?></h2>
            <p class="text-muted">Users online</p>
            <div class="pull-in sparkline-fix">
              <div id="lineChart"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="card card-round">
          <div class="card-body">
            <div class="card-head-row card-tools-still-right">
              <div class="card-title">New Customers</div>
            </div>
            <hr class="text-secondary">
            <div class="card-list py-4">
              <?php if (empty($users)) :  ?>
                <p class="text-muted text-center">Tidak ada customer baru</p>
              <?php endif;  ?>
              <?php $i = 0 ?>
              <?php foreach ($users as $user) : ?>
                <?php $i++ ?>
                <?php if ($i <= 6) : ?>
                  <div class="item-list">
                    <div class="avatar">
                      <img
                        src="assets/img/jm_denis.jpg"
                        alt="..."
                        class="avatar-img rounded-circle" />
                    </div>
                    <div class="info-user ms-3">
                      <div class="username"><?= $user['username'] ?></div>
                      <div class="status"><?= $user['email'] ?></div>
                    </div>
                  </div>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card card-round">
          <div class="card-header">
            <div class="card-head-row card-tools-still-right">
              <div class="card-title">Transaction History</div>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center mb-0">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Payment Number</th>
                    <th scope="col" class="text-end">Date & Time</th>
                    <th scope="col" class="text-end">Amount</th>
                    <th scope="col" class="text-end">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 0 ?>
                  <?php foreach ($orders as $order) : ?>
                    <?php $i++ ?>
                    <?php if ($i <= 7) : ?>
                      <tr>
                        <th scope="row">
                          <button
                            class="btn btn-icon btn-round btn-success btn-sm me-2">
                            <i class="fa fa-check"></i>
                          </button>
                          <?= $order['no_resi'] ?>
                        </th>
                        <td class="text-end"><?= $order['created_at'] ?></td>
                        <td class="text-end"><?= ubahRp($order['total_harga']) ?></td>
                        <td class="text-end">
                          <span class="badge badge-success"><?= $order['paid'] ? 'Sudah Bayar' : 'Belum Bayar' ?></span>
                        </td>
                      </tr>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <?php if (empty($orders)) :  ?>
                <p class="mt-2 text-muted text-center">Belum ada transaksi hari ini</p>
              <?php endif;  ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="/assets/js/core/jquery-3.7.1.min.js"></script>
<script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

<script>
  function updateSparkline() {
    $.ajax({
      url: '/chart/user', // Ganti dengan route kamu
      method: 'GET',
      success: function(data) {
        $("#lineChart").sparkline(data, {
          label: 'hai',
          type: "line",
          height: "70",
          width: "100%",
          lineWidth: "2",
          lineColor: "#177dff",
          fillColor: "rgba(23, 125, 255, 0.14)",
        });
      },
      error: function() {
        console.log("Gagal mengambil data online users");
      }
    });
  }

  // Jalankan saat pertama kali
  updateSparkline();

  // Update otomatis setiap 1 menit (opsional)
  setInterval(updateSparkline, 60000);

  $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
    type: "line",
    height: "70",
    width: "100%",
    lineWidth: "2",
    lineColor: "#f3545d",
    fillColor: "rgba(243, 84, 93, .14)",
  });

  $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
    type: "line",
    height: "70",
    width: "100%",
    lineWidth: "2",
    lineColor: "#ffa534",
    fillColor: "rgba(255, 165, 52, .14)",
  });

  async function downloadPDF(canvasId) {
    const canvas = document.getElementById(canvasId);
    if (!canvas) {
      alert('Canvas tidak ditemukan.');
      return;
    }

    const image = await html2canvas(canvas);

    const imgData = image.toDataURL('image/png');
    const pdf = new jspdf.jsPDF();
    const imgProps = pdf.getImageProperties(imgData);
    const pdfWidth = pdf.internal.pageSize.getWidth();
    const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

    pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
    pdf.save('chart.pdf');
  }

  function downloadDailySalesChartPDF() {
    const canvas = document.getElementById('dailySalesChart');

    if (!canvas) {
      alert('Canvas tidak ditemukan!');
      return;
    }

    const imgData = canvas.toDataURL('image/png');
    const pdf = new jspdf.jsPDF();
    const pdfWidth = pdf.internal.pageSize.getWidth();
    const pdfHeight = (canvas.height * pdfWidth) / canvas.width;

    pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
    pdf.save('daily-sales.pdf');
  }



  function printChart(canvasId) {
    const canvas = document.getElementById(canvasId);
    if (!canvas) {
      alert('Canvas tidak ditemukan.');
      return;
    }

    const dataUrl = canvas.toDataURL(); // ambil gambar dari canvas

    // Buat window baru untuk print
    const windowContent = `
  <!DOCTYPE html>
  <html>
  <head>
    <title>Print Chart</title>
    <style>
      body { text-align: center; margin: 0; padding: 0; }
      img { max-width: 100%; height: auto; margin-top: 20px; }
    </style>
  </head>
  <body>
    <img src="${dataUrl}" />
    <script>
      window.onload = function() {
        window.print();
        window.onafterprint = function () {
          window.close();
        };
      };
    <\/script>
  </body>
  </html>
  `;

    const printWindow = window.open('', '_blank');
    if (!printWindow) {
      alert("Popup diblokir! Harap izinkan popup untuk mencetak grafik.");
      return;
    }
    printWindow.document.open();
    printWindow.document.write(windowContent);
    printWindow.document.close();
  }
</script>

<?= $this->endSection(); ?>