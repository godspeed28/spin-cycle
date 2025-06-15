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
                          <a href="dashboard"
                              class="collapsed">
                              <i class="fas fa-home"></i>
                              <p>Dashboard</p>
                          </a>
                      </li>
                      <li class="nav-item <?= (uri_string() == 'users') ? 'active' : '' ?>">
                          <a href="users">
                              <i class="fas fa-user"></i>
                              <p>Users</p>
                              <!-- <span class="caret"></span> -->
                          </a>
                      </li>
                      <li class="nav-item <?= (uri_string() == 'services') ? 'active' : '' ?>">
                          <a href="services">
                              <i class="fas fa-pump-soap"></i>
                              <p>Services</p>
                              <!-- <span class="caret"></span> -->
                          </a>
                      </li>
                      <li class="nav-item <?= (uri_string() == 'clothes') ? 'active' : '' ?>">
                          <a href="clothes">
                              <i class="fas fa-tshirt"></i>
                              <p>Clothes</p>
                              <!-- <span class="badge badge-success">4</span> -->
                          </a>
                      </li>
                      <li class="nav-item <?= (uri_string() == 'order') ? 'active' : '' ?>">
                          <a href="order">
                              <i class="fas fa-shopping-cart"></i>
                              <p>Order</p>
                              <!-- <span class="badge badge-secondary">1</span> -->
                          </a>
                      </li>
                      <li class="nav-item <?= (uri_string() == 'report') ? 'active' : '' ?>">
                          <a href="report">
                              <i class="fas fa-money-check-alt"></i>
                              <p>Report</p>
                              <!-- <span class="caret"></span> -->
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
                          <li class="nav-item topbar-icon dropdown hidden-caret">
                              <a
                                  class="nav-link dropdown-toggle"
                                  href="#"
                                  id="notifDropdown"
                                  role="button"
                                  data-bs-toggle="dropdown"
                                  aria-haspopup="true"
                                  aria-expanded="false">
                                  <i class="fa fa-bell"></i>
                                  <span class="notification">4</span>
                              </a>
                              <ul
                                  class="dropdown-menu notif-box animated fadeIn"
                                  aria-labelledby="notifDropdown">
                                  <li>
                                      <div class="dropdown-title">
                                          You have 4 new notification
                                      </div>
                                  </li>
                                  <li>
                                      <div class="notif-scroll scrollbar-outer">
                                          <div class="notif-center">
                                              <a href="#">
                                                  <div class="notif-icon notif-primary">
                                                      <i class="fa fa-user-plus"></i>
                                                  </div>
                                                  <div class="notif-content">
                                                      <span class="block"> New user registered </span>
                                                      <span class="time">5 minutes ago</span>
                                                  </div>
                                              </a>
                                              <a href="#">
                                                  <div class="notif-icon notif-success">
                                                      <i class="fa fa-comment"></i>
                                                  </div>
                                                  <div class="notif-content">
                                                      <span class="block">
                                                          Rahmad commented on Admin
                                                      </span>
                                                      <span class="time">12 minutes ago</span>
                                                  </div>
                                              </a>
                                              <a href="#">
                                                  <div class="notif-img">
                                                      <img
                                                          src="assets/img/profile2.jpg"
                                                          alt="Img Profile" />
                                                  </div>
                                                  <div class="notif-content">
                                                      <span class="block">
                                                          Reza send messages to you
                                                      </span>
                                                      <span class="time">12 minutes ago</span>
                                                  </div>
                                              </a>
                                              <a href="#">
                                                  <div class="notif-icon notif-danger">
                                                      <i class="fa fa-heart"></i>
                                                  </div>
                                                  <div class="notif-content">
                                                      <span class="block"> Farrah liked Admin </span>
                                                      <span class="time">17 minutes ago</span>
                                                  </div>
                                              </a>
                                          </div>
                                      </div>
                                  </li>
                                  <li>
                                      <a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i>
                                      </a>
                                  </li>
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
                                          src="assets/img/profile.jpg"
                                          alt="..."
                                          class="avatar-img rounded-circle" />
                                  </div>
                                  <span class="profile-username">
                                      <span class="op-7">Hi,</span>
                                      <span class="fw-bold">Albert</span>
                                  </span>
                              </a>
                              <ul class="dropdown-menu dropdown-user animated fadeIn">
                                  <div class="dropdown-user-scroll scrollbar-outer">
                                      <li>
                                          <div class="user-box">
                                              <div class="avatar-lg">
                                                  <img
                                                      src="assets/img/profile.jpg"
                                                      alt="image profile"
                                                      class="avatar-img rounded" />
                                              </div>
                                              <div class="u-text">
                                                  <h4>Hizrian</h4>
                                                  <p class="text-muted">hello@example.com</p>
                                                  <a
                                                      href="profile.html"
                                                      class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                                              </div>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="dropdown-divider"></div>
                                          <a class="dropdown-item" href="#">Account Setting</a>
                                          <div class="dropdown-divider"></div>
                                          <a class="dropdown-item" href="#">Logout</a>
                                      </li>
                                  </div>
                              </ul>
                          </li>
                      </ul>
                  </div>
              </nav>
              <!-- End Navbar -->
          </div>