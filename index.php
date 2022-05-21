<?php
session_start();
include_once("koneksi.php");
if (isset($_SESSION['ses_username']) == "") {
  echo "<meta http-equiv='refresh' content='0;url=sign-in.php'>";
} else {
  $data_username = $_SESSION["ses_username"];
  $data_nama = $_SESSION["ses_nama"];
  $data_id = $_SESSION["ses_idPetugas"];
  $data_idUser = $_SESSION["ses_idUser"];
  $data_level = $_SESSION["ses_level"];
}
// session_destroy();

// if(isset($_POST["logout"])){

// }
error_reporting();
error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!-- Primary Meta Tags -->
  <title>Dashboard - Penjadwalan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="title" content="Volt - Free Bootstrap 5 Dashboard">
  <meta name="author" content="Themesberg">
  <meta name="description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
  <meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, themesberg, themesberg dashboard, themesberg admin dashboard" />
  <link rel="canonical" href="https://themesberg.com/product/admin-dashboard/volt-premium-bootstrap-5-dashboard">

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://demo.themesberg.com/volt-pro">
  <meta property="og:title" content="Volt - Free Bootstrap 5 Dashboard">
  <meta property="og:description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
  <meta property="og:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">

  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="https://demo.themesberg.com/volt-pro">
  <meta property="twitter:title" content="Volt - Free Bootstrap 5 Dashboard">
  <meta property="twitter:description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
  <meta property="twitter:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
  <link rel="manifest" href="assets/img/favicon/site.webmanifest">
  <link rel="mask-icon" href="assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">

  <!-- Sweet Alert -->
  <link type="text/css" href="vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

  <!-- Notyf -->
  <link type="text/css" href="vendor/notyf/notyf.min.css" rel="stylesheet">

  <!-- Volt CSS -->
  <link type="text/css" href="css/volt.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" /> -->


  <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css">
  <!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script> -->

</head>

<body>

  <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->


  <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
    <a class="navbar-brand me-lg-5" href="index.html">
      <img class="navbar-brand-dark" src="assets/img/brand/light.svg" alt="Volt logo" /> <img class="navbar-brand-light" src="assets/img/brand/dark.svg" alt="Volt logo" />
    </a>
    <div class="d-flex align-items-center">
      <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>

  <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
    <div class="sidebar-inner px-4 pt-3">
      <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
        <div class="d-flex align-items-center">
          <div class="avatar-lg me-4">
            <img src="assets/img/team/profile-picture-3.jpg" class="card-img-top rounded-circle border-white" alt="Bonnie Green">
          </div>
          <div class="d-block">
            <h2 class="h5 mb-3"><?= $data_nama ?></h2>
            <a href="sign-in.php" class="btn btn-secondary btn-sm d-inline-flex align-items-center">
              <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
              </svg>
              Sign Out
            </a>
          </div>
        </div>
        <div class="collapse-close d-md-none">
          <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation">
            <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
          </a>
        </div>
      </div>
      <!-- Sidebar -->
      <?php
      switch ($data_level) {
        case '0':
      ?>
          <ul class="nav flex-column pt-3 pt-md-0">
            <li class="nav-item">
              <a href="index.html" class="nav-link d-flex align-items-center">
                <span class="sidebar-icon">
                  <img src="assets/img/brand/light.svg" height="20" width="20" alt="Volt Logo">
                </span>
                <span class="mt-1 ms-1 sidebar-text">Penjadwalan</span>
              </a>
            </li>
            <li class="nav-item  active ">
              <a href="?v=dashboard" class="nav-link">
                <span class="sidebar-icon">
                  <i class="fas fa-home-lg-alt"></i>
                </span>
                <span class="sidebar-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="?v=rute" class="nav-link d-flex justify-content-between">
                <span>
                  <span class="sidebar-icon">
                    <i class="fas fa-road"></i>
                  </span>
                  <span class="sidebar-text">Rute</span>
                </span>

              </a>
            </li>
            <li class="nav-item ">
              <a href="?v=wilayah" class="nav-link">
                <span class="sidebar-icon">
                  <i class="fas fa-location"></i>
                </span>
                <span class="sidebar-text">Wilayah</span>
              </a>
            </li>
            <li class="nav-item ">
              <a href="?v=petugas" class="nav-link">
                <span class="sidebar-icon">
                  <i class="fas fa-user-check"></i>
                </span>
                <span class="sidebar-text">Data Petugas</span>
              </a>
            </li>
            <li class="nav-item ">
              <a href="?v=kelompok" class="nav-link">
                <span class="sidebar-icon">
                  <i class="fas fa-users"></i>
                </span>
                <span class="sidebar-text">Data Kelompok</span>
              </a>
            </li>
            <li class="nav-item ">
              <a href="?v=jadwal" class="nav-link">
                <span class="sidebar-icon">
                  <i class="fas fa-calendar-day"></i>
                </span>
                <span class="sidebar-text">Data Jadwal</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="?v=tugas" class="nav-link d-flex justify-content-between">
                <span>
                  <span class="sidebar-icon">
                    <i class="fas fa-clipboard"></i>
                  </span>
                  <span class="sidebar-text">Data Tugas</span>
                </span>

              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link d-flex justify-content-between">
                <span>
                  <span class="sidebar-icon">
                    <i class="fas fa-file-alt"></i>
                  </span>
                  <span class="sidebar-text">Laporan</span>
                </span>

              </a>
            </li>

            <li class="nav-item ">
              <a href="?v=pelaporan" class="nav-link">
                <span class="sidebar-icon">
                  <i class="fas fa-location"></i>
                </span>
                <span class="sidebar-text">Pelaporan</span>
              </a>
            </li>

            <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>

            <li class="nav-item">
              <a href="?v=user" class="nav-link d-flex justify-content-between">
                <span>
                  <span class="sidebar-icon">
                    <i class="fas fa-user"></i>
                  </span>
                  <span class="sidebar-text">Data User</span>
                </span>

              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="btn btn-secondary d-flex align-items-center justify-content-center btn-upgrade-pro">
                <span class="sidebar-icon d-inline-flex align-items-center justify-content-center">
                </span>
                <span><b>Support By IT Admin</b></span>
              </a>
            </li>
          </ul>
        <?php
          break;
        case '1':
        ?>
          <ul class="nav flex-column pt-3 pt-md-0">
            <li class="nav-item">
              <a href="index.html" class="nav-link d-flex align-items-center">
                <span class="sidebar-icon">
                  <img src="assets/img/brand/light.svg" height="20" width="20" alt="Volt Logo">
                </span>
                <span class="mt-1 ms-1 sidebar-text">Penjadwalan</span>
              </a>
            </li>
            <li class="nav-item  active ">
              <a href="?v=dashboard" class="nav-link">
                <span class="sidebar-icon">
                  <i class="fas fa-home-lg-alt"></i>
                </span>
                <span class="sidebar-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="?v=rute" class="nav-link d-flex justify-content-between">
                <span>
                  <span class="sidebar-icon">
                    <i class="fas fa-road"></i>
                  </span>
                  <span class="sidebar-text">Tugas</span>
                </span>

              </a>
            </li>
            <li class="nav-item ">
              <a href="?v=pelaporan" class="nav-link">
                <span class="sidebar-icon">
                  <i class="fas fa-location"></i>
                </span>
                <span class="sidebar-text">Pelaporan</span>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link d-flex justify-content-between">
                <span>
                  <span class="sidebar-icon">
                    <i class="fas fa-file-alt"></i>
                  </span>
                  <span class="sidebar-text">Laporan</span>
                </span>

              </a>
            </li>

            <li class="nav-item">
              <a href="pages/upgrade-to-pro.html" class="btn btn-secondary d-flex align-items-center justify-content-center btn-upgrade-pro">
                <span class="sidebar-icon d-inline-flex align-items-center justify-content-center">
                </span>
                <span><b>Support By IT</b></span>
              </a>
            </li>
          </ul>
      <?php
          break;
      }
      ?>


    </div>
  </nav>

  <main class="content">

    <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
      <div class="container-fluid px-0">
        <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
          <div class="d-flex align-items-center">

            <!-- / Search form -->
          </div>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center">
            <li class="nav-item dropdown">
              <a class="nav-link text-dark notification-bell unread dropdown-toggle" data-unread-notifications="true" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                <svg class="icon icon-sm text-gray-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
                </svg>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center mt-2 py-0">
                <div class="list-group list-group-flush">
                  <a href="#" class="text-center text-primary fw-bold border-bottom border-light py-3">Notifications</a>
                  <a href="#" class="list-group-item list-group-item-action border-bottom">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="assets/img/team/profile-picture-1.jpg" class="avatar-md rounded">
                      </div>
                      <div class="col ps-0 ms-2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="h6 mb-0 text-small">Jose Leos</h4>
                          </div>
                          <div class="text-end">
                            <small class="text-danger">a few moments ago</small>
                          </div>
                        </div>
                        <p class="font-small mt-1 mb-0">Added you to an event "Project stand-up" tomorrow at 12:30 AM.</p>
                      </div>
                    </div>
                  </a>

                  <a href="#" class="dropdown-item text-center fw-bold rounded-bottom py-3">
                    <svg class="icon icon-xxs text-gray-400 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                      <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                    </svg>
                    View all
                  </a>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown ms-lg-3">
              <a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="media d-flex align-items-center">
                  <img class="avatar rounded-circle" alt="Image placeholder" src="assets/img/team/profile-picture-3.jpg">
                  <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                    <span class="mb-0 font-small fw-bold text-gray-900"><?= $data_nama ?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1">
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
                  </svg>
                  My Profile
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
                  </svg>
                  Settings
                </a>

                <div role="separator" class="dropdown-divider my-1"></div>
                <a class="dropdown-item d-flex align-items-center" href="logout.php">
                  <svg class="dropdown-icon text-danger me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                  </svg>
                  <!-- <input type="submit" name="logout" value="Logout" class="btn btn-default"> -->
                  Logout
                </a>
                <!-- <input type="submit" name="logout" value="Logout" class="btn btn-default"> -->
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <div class="content-wrapper">
      <div class="container-fluid">
        <?php
        if (isset($_GET['v'])) {
          $hal = $_GET['v'];

          switch ($hal) {
            case 'dashboard':
              include "pages/dashboard.php";
              break;
            case 'rute':
              include "pages/rute/index.php";
              break;

            case 'rute_aksi':
              include "pages/rute/aksi.php";
              break;

            case 'wilayah':
              include "pages/wilayah/index.php";
              break;

            case 'wilayah_aksi':
              include "pages/wilayah/aksi.php";
              break;

            case 'jadwal':
              include "pages/jadwal/index.php";
              break;

            case 'jadwal_aksi':
              include "pages/jadwal/aksi.php";
              break;

            case 'kelompok':
              include "pages/kelompok/index.php";
              break;

            case 'kelompok_aksi':
              include "pages/kelompok/aksi.php";
              break;

            case 'petugas':
              include "pages/petugas/index.php";
              break;

            case 'petugas_aksi':
              include "pages/petugas/aksi.php";
              break;

            case 'tugas':
              include "pages/tugas/index.php";
              break;

            case 'tugas_aksi':
              include "pages/tugas/aksi.php";
              break;

            case 'pelaporan':
              include "pages/pelaporan/index.php";
              break;

            case 'pelaporan_aksi':
              include "pages/pelaporan/aksi.php";
              break;

            case 'user':
              include "pages/user/index.php";
              break;

            case 'user_aksi':
              include "pages/user/aksi.php";
              break;

            case 'report_jadwal':
              include "pages/v_report/jadwal.php";
              break;

            case 'report_tugas':
              include "pages/v_report/tugas.php";
              break;

            case 'report_rute':
              include "pages/v_report/rute.php";
              break;

            case 'logout':
              include "logout.php";
              break;

              // case 'report_transaksi' :
              //   include "pages/v_report/coba.php";
              //   break;

            default:
              echo "<center><h3 style='font-family: Poppins'> Maaf Laman yang anda tuju tidak tersedia !</h3></center>";
              break;
          }
        } else {
          include "pages/dashboard.php";
        }
        ?>
      </div>
    </div>

  </main>

  <!-- Core -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script src="vendor/@popperjs/core/dist/umd/popper.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap5.min.js"></script>
  <script src="js/main.js"></script>
  <script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- Vendor JS -->
  <script src="vendor/onscreen/dist/on-screen.umd.min.js"></script>

  <!-- Slider -->
  <script src="vendor/nouislider/distribute/nouislider.min.js"></script>

  <!-- Smooth scroll -->
  <script src="vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

  <!-- Charts -->
  <script src="vendor/chartist/dist/chartist.min.js"></script>
  <script src="vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>

  <!-- Datepicker -->
  <script src="vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

  <!-- Sweet Alerts 2 -->
  <script src="vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>

  <!-- Moment JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

  <!-- Vanilla JS Datepicker -->
  <script src="vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

  <!-- Notyf -->
  <script src="vendor/notyf/notyf.min.js"></script>

  <!-- Simplebar -->
  <script src="vendor/simplebar/dist/simplebar.min.js"></script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  <!-- Volt JS -->
  <script src="assets/js/volt.js"></script>


</body>

</html>