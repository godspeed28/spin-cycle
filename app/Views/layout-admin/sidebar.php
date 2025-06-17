  <div class="wrapper">
      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
          <div class="sidebar-logo">
              <!-- Logo Header -->
              <div class="logo-header" data-background-color="white">
                  <a href="index.html" class="logo">
                      <svg width="50" height="50" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" fill="none">
                          <!-- Background Circle -->
                          <circle cx="100" cy="100" r="90" stroke="#3498db" stroke-width="10" fill="white" />

                          <!-- Spinning Drum Effect -->
                          <circle cx="100" cy="100" r="50" stroke="#3498db" stroke-width="8" fill="none" stroke-dasharray="30 10"
                              transform="rotate(-15,100,100)" />

                          <!-- Water Bubbles -->
                          <circle cx="70" cy="50" r="10" fill="#3498db" />
                          <circle cx="130" cy="40" r="7" fill="#3498db" />
                          <circle cx="150" cy="70" r="5" fill="#3498db" />

                          <style>
                              .cycle-text {
                                  color: #000;
                              }

                              @media (max-width: 767.98px) {
                                  .cycle-text {
                                      color: #fff !important;
                                  }
                              }
                          </style>

                      </svg> &nbsp; <span class="text-info fw-bold">Spin</span>&nbsp;<span class="cycle-text fw-bold">Cycle</span>
                  </a>
                  <div class="nav-toggle">
                      <button class="btn btn-toggle toggle-sidebar">
                          <i class="gg-menu-right"></i>
                      </button>
                      <button class="btn btn-toggle sidenav-toggler">
                          <i class="gg-menu-left"></i>
                      </button>
                  </div>
                  <button class="topbar-toggler more">
                      <i class="gg-more-vertical-alt"></i>
                  </button>
              </div>
              <!-- End Logo Header -->
          </div>
          <div class="sidebar-wrapper scrollbar scrollbar-inner">
              <div class="sidebar-content">
                  <ul class="nav nav-secondary">
                      <li class="nav-item <?= (uri_string() == 'dashboard') ? 'active' : '' ?>">
                          <a href="<?= base_url('dashboard') ?>" class="collapsed">
                              <i class="fas fa-home"></i>
                              <p>Dashboard</p>
                          </a>
                      </li>
                      <li class="nav-item <?= (uri_string() == 'users') ? 'active' : '' ?>">
                          <a href="<?= base_url('users') ?>">
                              <i class="fas fa-user"></i>
                              <p>Users</p>
                          </a>
                      </li>
                      <li class="nav-item <?= (uri_string() == 'services') ? 'active' : '' ?>">
                          <a href="<?= base_url('services') ?>">
                              <i class="fas fa-pump-soap"></i>
                              <p>Services</p>
                          </a>
                      </li>
                      <li class="nav-item <?= (uri_string() == 'clothes') ? 'active' : '' ?>">
                          <a href="<?= base_url('clothes') ?>">
                              <i class="fas fa-tshirt"></i>
                              <p>Clothes</p>
                          </a>
                      </li>
                      <li class="nav-item <?= (uri_string() == 'order') ? 'active' : '' ?>">
                          <a href="<?= base_url('order') ?>">
                              <i class="fas fa-shopping-cart"></i>
                              <p>Order</p>
                          </a>
                      </li>
                      <li class="nav-item <?= (uri_string() == 'report') ? 'active' : '' ?>">
                          <a href="<?= base_url('report') ?>">
                              <i class="fas fa-money-check-alt"></i>
                              <p>Report</p>
                          </a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
      <!-- End Sidebar -->

      <div class="main-panel">
          <div class="main-header">
              <div class="main-header-logo">
                  <!-- Logo Header -->
                  <div class="logo-header" data-background-color="dark">
                      <a href="index.html" class="logo">
                          <img
                              src="assets/img/kaiadmin/logo_light.svg"
                              alt="navbar brand"
                              class="navbar-brand"
                              height="20" />
                      </a>
                      <div class="nav-toggle">
                          <button class="btn btn-toggle toggle-sidebar">
                              <i class="gg-menu-right"></i>
                          </button>
                          <button class="btn btn-toggle sidenav-toggler">
                              <i class="gg-menu-left"></i>
                          </button>
                      </div>
                      <button class="topbar-toggler more">
                          <i class="gg-more-vertical-alt"></i>
                      </button>
                  </div>
                  <!-- End Logo Header -->
              </div>
              <!-- Navbar Header -->
              <nav
                  class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                  <div class="container-fluid">
                      <nav
                          class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <button type="submit" class="btn btn-search pe-1">
                                      <i class="fa fa-search search-icon"></i>
                                  </button>
                              </div>
                              <input
                                  type="text"
                                  placeholder="Search ..."
                                  class="form-control" />
                          </div>
                      </nav>

                      <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                          <li
                              class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                              <a
                                  class="nav-link dropdown-toggle"
                                  data-bs-toggle="dropdown"
                                  href="#"
                                  role="button"
                                  aria-expanded="false"
                                  aria-haspopup="true">
                                  <i class="fa fa-search"></i>
                              </a>
                              <ul class="dropdown-menu dropdown-search animated fadeIn">
                                  <form class="navbar-left navbar-form nav-search">
                                      <div class="input-group">
                                          <input
                                              type="text"
                                              placeholder="Search ..."
                                              class="form-control" />
                                      </div>
                                  </form>
                              </ul>
                          </li>
                          <li class="nav-item topbar-user dropdown hidden-caret">
                              <a
                                  class="dropdown-toggle profile-pic"
                                  data-bs-toggle="dropdown"
                                  href="#"
                                  aria-expanded="false">
                                  <div class="avatar-sm">
                                      <img
                                          src="/img/albert.jpg"
                                          alt="..."
                                          class="avatar-img rounded-circle" />
                                  </div>
                                  <span class="profile-username">
                                      <span class="op-7">Hi,</span>
                                      <span class="fw-bold"><?= session()->get('username'); ?></span>
                                  </span>
                              </a>
                              <ul class="dropdown-menu dropdown-user animated fadeIn">
                                  <div class="dropdown-user-scroll scrollbar-outer">
                                      <li>
                                          <div class="user-box">
                                              <div class="avatar-lg">
                                                  <img
                                                      src="/img/albert.jpg"
                                                      alt="image profile"
                                                      class="avatar-img rounded" />
                                              </div>
                                              <div class="u-text">
                                                  <h4><?= session()->get('username'); ?></h4>
                                                  <p class="text-muted"><?= session()->get('email'); ?></p>
                                                  <button
                                                      type="button" data-bs-toggle="modal" data-bs-target="#profileModal"
                                                      class="btn btn-xs btn-secondary btn-sm">View Profile</button>
                                              </div>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="dropdown-divider"></div>
                                          <a class="dropdown-item" href="<?= base_url('profil/detail') ?>">Account Setting</a>
                                          <div class="dropdown-divider"></div>
                                          <a class="dropdown-item" href="<?= base_url('/logout') ?>">Logout</a>
                                      </li>
                                  </div>
                              </ul>
                          </li>
                      </ul>
                  </div>
              </nav>
              <!-- End Navbar -->
          </div>

          <!-- Modal -->
          <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">

                      <div class="modal-header">
                          <h5 class="modal-title" id="profileModalLabel">Profil</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>

                      <div class="modal-body">
                          <?php if (session()->has('username')): ?>
                              <div class="d-flex align-items-center">
                                  <!-- Foto Profil -->
                                  <div class="me-3 text-center">
                                      <img src="/img/albert.jpg" alt="Foto Profil Pengguna" class="rounded-circle mb-3" width="100" height="100">
                                  </div>

                                  <!-- Data Profil -->
                                  <div class="ps-3 border-start">
                                      <p><strong>Username:</strong> <?= session()->get('username') ?></p>
                                      <hr>
                                      <p><strong>No. Telepon:</strong> <?= session()->get('no_telp') ?></p>
                                      <hr>
                                      <p><strong>Email:</strong> <?= session()->get('email') ?></p>
                                  </div>
                              </div>
                          <?php else: ?>
                              <p class="text-danger">Data pengguna tidak tersedia. Silakan login terlebih dahulu.</p>
                          <?php endif; ?>
                      </div>

                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                      </div>

                  </div>
              </div>
          </div>