<?php
include "koneksiLogin.php";
$db = new database();
$dataUsers = $db->tampil_data_users();
?>
<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: LoginUser.php");
    exit();
}

$username = $_SESSION['username'];
$role = $_SESSION['role'];
?>

<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AdminLTE 4 | Simple Tables</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE 4 | Simple Tables" />
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

            #cancelLogout {
                background-color: #8DD8FF;
                color: #000;
                border-radius: 3rem;
                transition: all .50s ease;
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
        <?php include "sidebar.php"; ?>

        <head>
            <style>
                .table-responsive {
                    width: 100%;
                    overflow-x: auto;
                }

                table {
                    width: 100%;
                    border-collapse: collapse;
                    background: #fff;
                    min-width: 600px;
                    /* agar tabel tidak rusak saat di-scroll di layar kecil */
                }

                th,
                td {
                    padding: 10px;
                    border: 1px solid #ddd;
                }

                td {
                    text-align: left;
                    vertical-align: middle;
                }

                td:last-child {
                    text-align: center;
                }

                .text-kiri {
                    text-align: left;
                }

                th {
                    background-color: #233567;
                    color: white;
                }

                tr:nth-child(even) {
                    background-color: #f9f9f9;
                }

                tr:hover {
                    background-color: #f1f1f1;
                }

                .btn {
                    padding: 5px 10px;
                    text-decoration: none;
                    color: white;
                    border-radius: 5px;
                    font-size: 14px;
                    display: inline-block;
                }

                .edit {
                    background-color: #f0ad4e;
                }

                .edit:hover {
                    background-color: #FCB454;
                }

                .hapus {
                    background-color: #AF3E3E;
                }

                .hapus:hover {
                    background-color: #CD5656;
                }

                @media screen and (max-width: 768px) {
                    .btn {
                        font-size: 12px;
                        padding: 4px 8px;
                    }

                    th,
                    td {
                        padding: 8px;
                    }
                }
            </style>
        </head>
        <!--begin::App Main-->
        <main class="app-main">
            <!--begin::App Content Header-->
            <div class="app-content-header">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6 text-kiri">
                            <h3 class="mb-0">Data User</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Simple Tables</li>
                            </ol>
                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Container-->
            </div>

            <style>
                div.dataTables_wrapper {
                    margin: 20px 10px;
                }

                /* Gunakan Flexbox agar horizontal */
                .dataTables_wrapper .dataTables_length,
                .dataTables_wrapper .dataTables_filter {
                    display: flex;
                    align-items: center;
                    margin-bottom: 15px;
                }

                .dataTables_wrapper .top-controls {
                    display: flex;
                    justify-content: flex-start;
                    flex-wrap: wrap;
                    gap: 20px;
                    margin-bottom: 15px;
                    /* Tambahkan jarak bawah */
                }

                .dataTables_wrapper .dataTables_length,
                .dataTables_wrapper .dataTables_filter {
                    margin: 0;
                }

                .dataTables_filter {
                    margin-bottom: 10px;
                    /* Jika ingin tambahan jarak khusus */
                }

                /* Input search agar tidak terlalu besar */
                .dataTables_filter input {
                    width: 150px;
                    margin-bottom: 10px;
                }
            </style>
            <!--end::App Content Header-->
            <!--begin::App Content-->
            <div class="app-content">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h3 class="card-title">Tabel Data User</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table id="tabelUser" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>Username</th>
                                                    <th>Password</th>
                                                    <th>Role</th>

                                                    <?php if ($_SESSION['role'] === 'admin'): ?>
                                                        <th>Option</th>
                                                    <?php endif; ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($dataUsers as $user):
                                                ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $user['username']; ?></td>
                                                        <td><?= $user['password']; ?></td>
                                                        <td><?= $user['role']; ?></td>
                                                        <td>
                                                            <button class="btn btn-primary btn-edit"
                                                                data-id="<?= $user['id'] ?>"
                                                                data-username="<?= $user['username'] ?>"
                                                                data-password="<?= $user['password'] ?>"
                                                                data-role="<?= $user['role'] ?>">
                                                                Edit
                                                            </button>

                                                            <button class="btn hapus" onclick="tampilkanPopupHapusUser(
                                                            '<?= $user['id']; ?>',
                                                            '<?= $user['username']; ?>',
                                                            '<?= $user['password']; ?>',
                                                            '<?= $user['role']; ?>'
                                                            )">
                                                                Hapus
                                                            </button>

                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- /.card-body -->
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <!-- /.card -->

                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::App Content-->
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
    <style>
        #editModal {
            background-color: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            width: 500px;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
            display: none;
            font-family: 'Segoe UI', sans-serif;
        }

        /* Form Elements */
        #editModal form label {
            display: block;
            margin-top: 12px;
            font-weight: bold;
            color: #333;
        }

        #editModal form input[type="text"],
        #editModal form select {
            width: 100%;
            padding: 8px 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 14px;
        }

        /* Buttons */
        #editModal form button {
            margin-top: 15px;
            padding: 10px 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
        }

        #editModal form button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            margin-right: 10px;
        }

        #editModal form button[type="button"] {
            background-color: #ccc;
            color: #000;
        }

        #editModal h3 {
            margin-top: 0;
            margin-bottom: 10px;
            color: #007bff;
        }
    </style>
    <style>
        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* transparan */
            z-index: 999;
            /* lebih tinggi dari konten biasa */
        }

        #editModal,
        #hapusModal {
            z-index: 1000;
            /* modal harus di atas overlay */
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>

    <div id="overlay" style="display: none;"></div>

    <div id="editModal"
        style="display:none; position:fixed; top:10%; left:50%; transform:translateX(-50%); background:white; padding:20px; border:1px solid #ccc; z-index:999; border-radius:8px; width:80%; max-width:700px;">
        <h3>Edit Data User</h3>
        <form action="proses_edit_user.php" method="POST">
            <!-- ID User (hidden) -->
            <input type="hidden" id="edit-id" name="id">

            <!-- Username -->
            <label for="edit-username">Username:</label>
            <input type="text" id="edit-username" name="username" required>

            <!-- Password -->
            <label for="edit-password">Password:</label>
            <input type="text" id="edit-password" name="password" required>

            <!-- Role -->
            <label for="edit-role">Role:</label>
            <select id="edit-role" name="role" required>
                <option value="admin">Admin</option>
                <option value="siswa">Siswa</option>
            </select>

            <!-- Tombol -->
            <button type="submit" name="update"
                style="padding:8px 16px; background:#4CAF50; color:white; border:none; border-radius:5px;">Simpan
                Perubahan</button>
            <button type="button" onclick="tutupModal()"
                style="padding:8px 16px; background:#f44336; color:white; border:none; border-radius:5px;">Batal</button>
        </form>
    </div>

    <style>
        .popup {
            position: fixed;
            top: 20%;
            left: 50%;
            transform: translate(-50%, -10%);
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            padding: 20px;
            width: 400px;
            z-index: 9999;
        }

        .popup-content p {
            margin: 5px 0;
        }
    </style>
    <div id="popupHapusUser" class="popup" style="display: none;">
        <div class="popup-content">
            <h3 style="background: #dc3545; color: white; padding: 10px;">Konfirmasi Hapus Jurusan</h3>
            <p>Yakin ingin menghapus data jurusan ini?</p>
            <br>
            <p><strong>Username:</strong> <span id="hapusUsername"></span></p>
            <p><strong>Password:</strong> <span id="hapusPassword"></span></p>
            <p><strong>Role:</strong> <span id="hapusRole"></span></p>



            <div style="text-align: right;">
                <button onclick="tutupPopupHapusUser()" class="btn" style="background:#6c757d;">Batal</button>
                <a href="#" id="linkHapusKonfirmasiUser" class="btn" style="background:#dc3545;">Hapus</a>
            </div>
        </div>
    </div>


    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tabelUser').DataTable(); // pastikan ID sesuai dengan tabel kamu
        });
    </script>
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
        function tampilkanPopupHapusUser(id, username, password, role) {
            document.getElementById('hapusUsername').textContent = username;
            document.getElementById('hapusPassword').textContent = password;
            document.getElementById('hapusRole').textContent = role;

            // Kirim ID user lewat URL
            document.getElementById('linkHapusKonfirmasiUser').href = "hapusUser.php?id=" + id + "&aksi=hapus";

            document.getElementById('overlay').style.display = 'block';
            document.getElementById('popupHapusUser').style.display = 'block';
        }

        function tutupPopupHapusUser() {
            document.getElementById('popupHapusUser').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }
    </script>
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
            logoutModal.style.display = 'none';
        });

        confirmLogout.addEventListener('click', function() {
            window.location.href = "logout.php";
        });

        window.addEventListener('click', function(event) {
            if (event.target == logoutModal) {
                logoutModal.style.display = 'none';
            }
        });
    </script>
    <script>
        document.querySelectorAll('.btn-edit').forEach(function(button) {
            button.addEventListener('click', function() {
                document.getElementById('edit-id').value = this.dataset.id; // ← WAJIB ditambahkan

                document.getElementById('edit-username').value = this.dataset.username;
                document.getElementById('edit-password').value = this.dataset.password;
                document.getElementById('edit-role').value = this.dataset.role;
                document.getElementById('overlay').style.display = 'block';

                document.getElementById('editModal').style.display = 'block';
            });

        });

        function tutupModal() {
            document.getElementById('editModal').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }
    </script>



    <!--end::OverlayScrollbars Configure-->
    <!--end::Script-->
</body>
<!--end::Body-->

</html>