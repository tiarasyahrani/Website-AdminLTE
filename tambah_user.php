<?php
session_start(); // cukup sekali saja di bagian paling atas

include "koneksiLogin.php";
$db = new database();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: LoginUser.php");
    exit();
}

$username = $_SESSION['username'];
if (!isset($_SESSION['role'])) {
    // Jika belum login atau role belum diset, redirect ke login atau tampilkan error
    header("Location: LoginUser.php");
    exit();
}

$role = $_SESSION['role'];

// Cek apakah user adalah admin
if ($_SESSION['role'] !== 'admin') {
    echo "Akses ditolak!";
    exit;
}
if (isset($_POST['simpan'])) {
    $db->tambah_user(
        $_POST['username'],
        $_POST['password'],
        $_POST['role']

    );

    header("Location: managementUser.php");
    exit();
}
?>





<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AdminLTE 4 | General Form Elements</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE 4 | General Form Elements" />
    <meta name="author" content="ColorlibHQ" />
    <meta name="description"
        content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS." />
    <meta name="keywords"
        content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard" />
    <!--end::Primary Meta Tags-->
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
        integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg=" crossorigin="anonymous" />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI=" crossorigin="anonymous" />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="dist/css/adminlte.css" />
    <!--end::Required Plugin(AdminLTE)-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        <!--begin::Header-->
        <nav class="app-header navbar navbar-expand bg-body">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Start Navbar Links-->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="bi bi-list"></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Home</a></li>
                    <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Contact</a></li>
                </ul>
                <!--end::Start Navbar Links-->
                <!--begin::End Navbar Links-->
                <ul class="navbar-nav ms-auto">

                    <!--end::Notifications Dropdown Menu-->
                    <!--begin::Fullscreen Toggle-->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                            <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                            <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                        </a>
                    </li>
                    <!--end::Fullscreen Toggle-->
                    <!--begin::User Menu Dropdown-->
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="profilesmk6.jpg" class="user-image rounded-circle shadow" alt="User Image" />
                            <span class="d-none d-md-inline"><?php echo htmlspecialchars($username); ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <!--begin::User Image-->
                            <li class="user-header text-bg-primary">
                                <img src="profilesmk6.jpg" class="rounded-circle shadow" alt="User Image" />
                                <p>
                                    <?php echo htmlspecialchars($username); ?> - <?php echo ucfirst($role); ?>
                                    <small>Member since <?php echo date("M. Y"); ?></small>
                                </p>

                            </li>
                            <!--end::User Image-->
                            <!--begin::Menu Body-->

                            <!--end::Menu Body-->
                            <!--begin::Menu Footer-->
                            <li class="user-footer">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                                <a href="#" id="logoutBtn" class="btn btn-default btn-flat float-end">Sign out</a>
                            </li>
                            <!--end::Menu Footer-->
                        </ul>
                    </li>


                    <!--end::User Menu Dropdown-->
                </ul>
                <!--end::End Navbar Links-->
            </div>
            <!--end::Container-->
        </nav>
        <style>
            .modal {
                display: none;
                position: fixed;
                z-index: 999;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.4);
            }

            .modal-content p {
                color: var(--other-color);
                padding: 20px;
            }

            .modal-content {
                background-color: #fff;
                margin: 15% auto;
                padding: 20px;
                border-radius: 8px;
                width: 80%;
                max-width: 400px;
                text-align: center;
            }

            .modal-buttons button {
                padding: 10px 20px;
                margin: 0 10px;
                border: none;
                cursor: pointer;
            }

            #confirmLogout {
                background-color: #8DD8FF;
                color: #000;
                border-radius: 3rem;
                transition: all .50s ease;
            }

      #confirmLogout {
        background-color: #8A2D3B;
        color: #000;
        border-radius: 3rem;
        transition: all .50s ease;
      }

      #confirmLogout:hover {
        background: #F8EEDF;
        color: #8A2D3B;
        box-shadow: #8A2D3B 0px 1px 25px;
      }

            #cancelLogout:hover {
                background: #205781;
                color: #AFDDFF;
                box-shadow: #0C0950 0px 1px 25px;
            }
        </style>
        <div id="logoutModal" class="modal" style="display:none;">
            <div class="modal-content">
                <?php if (isset($_SESSION['username'])): ?>
                    <p>Apakah Anda yakin ingin keluar?</p>
                    <p>Keluar dari <strong>Website Data Siswa</strong> sebagai
                        <strong><?= htmlspecialchars($_SESSION['username']) ?></strong>?
                    </p>
                <?php else: ?>
                    <p>Anda belum login.</p>
                <?php endif; ?>
                <div class="modal-buttons">
                    <button id="confirmLogout">Keluar</button>
                    <button id="cancelLogout">Batalkan</button>
                </div>
            </div>
        </div>
        <!--end::Header-->
        <?php include "Sidebar.php"; ?>

        <head>
            <style>
                .container {
                    max-width: 800px;
                    margin: 30px auto;
                    padding: 30px;
                    background: #fff;
                    border-radius: 12px;
                    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
                }

                h2 {
                    text-align: center;
                    margin-bottom: 25px;
                    color: #233567;
                }

                label {
                    display: block;
                    margin-bottom: 6px;
                    font-weight: 600;
                    color: #333;
                }

                /* Input group styling */
                .input-group {
                    display: flex;
                    align-items: center;
                    border: 1px solid #ccc;
                    border-radius: 6px;
                    padding: 8px 12px;
                    margin-bottom: 16px;
                    transition: border-color 0.3s;
                }

                /* Icon inside input group */
                .input-group i {
                    color: #666;
                    margin-right: 10px;
                    font-size: 18px;
                    width: 24px;
                    text-align: center;
                }

                /* Select styling */
                select {
                    flex: 1;
                    border: none;
                    outline: none;
                    font-size: 16px;
                    background: transparent;
                    cursor: pointer;
                    color: #333;
                }

                /* Select focus */
                select:focus {
                    outline: none;
                }

                .input-group input,
                .input-group select {
                    border: none;
                    background: transparent;
                    outline: none;
                    font-size: 16px;
                    flex: 1;
                    padding: 8px 0;
                }


                .input-group:hover,
                .input-group:focus-within {
                    border-color: #007bff;
                    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
                }

                .card-footer {
                    margin-top: 25px;
                    text-align: right;
                }

                .btn {
                    padding: 10px 20px;
                    font-size: 16px;
                    border: none;
                    border-radius: 6px;
                    cursor: pointer;
                    transition: background-color 0.3s ease;
                }

                .btn-primary {
                    background-color: #3b82f6;
                    color: white;
                }

                .btn-primary:hover {
                    background-color: #2563eb;
                }

                .btn-secondary {
                    background-color: #e5e7eb;
                    color: #111827;
                    margin-left: 10px;
                }

                .btn-secondary:hover {
                    background-color: #d1d5db;
                }

                @media (max-width: 576px) {


                    .card-footer {
                        text-align: center;
                    }

                    .btn {
                        width: 100%;
                        margin-bottom: 10px;
                    }

                    .btn-secondary {
                        margin-left: 0;
                    }
                }
            </style>
        </head>
        <!--begin::App Main-->
        <main class="app-main">
            <div class="container">
                <h2><i class="fas fa-user-plus"></i> Tambah User</h2>
                <form action="tambah_user.php" method="POST">

                    <label for="username">Username:</label>
                    <div class="input-group">
                        <i class="fas fa-user"></i>
                        <input type="text" id="username" name="username" required>
                    </div>

                    <label for="password">Password:</label>
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" required>
                    </div>

                    <label for="role">Role:</label>
                    <div class="input-group">
                        <i class="fas fa-user-tag"></i>
                        <select id="role" name="role" required>
                            <option value="" disabled selected>Pilih Role</option>
                            <option value="admin">Admin</option>
                            <option value="siswa">Siswa</option>
                        </select>
                    </div>

                    <div class="card-footer">
                        <button class="btn btn-primary" id="simpan" name="simpan" type="submit">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <a href="datauser.php" class="btn btn-secondary">
                            <i class="fas fa-times-circle"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </main>

        <!--end::App Main-->
        <!--begin::Footer-->
        <footer class="app-footer">
            <!--begin::To the end-->
            <div class="float-end d-none d-sm-inline">Anything you want</div>
            <!--end::To the end-->
            <!--begin::Copyright-->
            <strong>
                Copyright &copy; 2014-2024&nbsp;
                <a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>.
            </strong>
            All rights reserved.
            <!--end::Copyright-->
        </footer>
        <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
        integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ=" crossorigin="anonymous"></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="dist/js/adminlte.js"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
        const Default = {
            scrollbarTheme: 'os-theme-light',
            scrollbarAutoHide: 'leave',
            scrollbarClickScroll: true,
        };
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
    </script>
    <script>
        const logoutBtn = document.getElementById('logoutBtn');
        const logoutModal = document.getElementById('logoutModal');
        const cancelLogout = document.getElementById('cancelLogout');
        const confirmLogout = document.getElementById('confirmLogout');

        logoutBtn.addEventListener('click', function() {
            logoutModal.style.display = 'block';
        });

        cancelLogout.addEventListener('click', function() {
            logoutModal.style.display = 'none'; // ✅ cukup ditutup, tidak logout
        });

        confirmLogout.addEventListener('click', function() {
            window.location.href = "logout.php"; // ✅ langsung arahkan ke logout.php
        });

        // Tutup modal jika klik di luar area modal
        window.addEventListener('click', function(event) {
            if (event.target == logoutModal) {
                logoutModal.style.display = 'none';
            }
        });
    </script>
    <!--end::OverlayScrollbars Configure-->
    <!--end::Script-->
</body>
<!--end::Body-->

</html>