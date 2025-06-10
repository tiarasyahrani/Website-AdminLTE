<?php
include "koneksi.php";
$db = new database();
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
    min-width: 600px; /* agar tabel tidak rusak saat di-scroll di layar kecil */
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

    th, td {
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
              <h3 class="mb-0">Data Siswa</h3>
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
    margin-bottom: 15px; /* Tambahkan jarak bawah */
  }

  .dataTables_wrapper .dataTables_length,
  .dataTables_wrapper .dataTables_filter {
    margin: 0;
  }

  .dataTables_filter {
    margin-bottom: 10px; /* Jika ingin tambahan jarak khusus */
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
                  <h3 class="card-title">Tabel Siswa</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table id="tabelSiswa" class="table table-striped">
                    <thead>
                      <tr>
                        <th>NO</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Jurusan</th>
                        <th>Kelas</th>
                        <th>Alamat</th>
                        <th>Agama</th>
                        <th>NO HP</th>
                        <?php if ($_SESSION['role'] === 'admin'): ?>
                          <th>Option</th>
                        <?php endif; ?>
                      </tr>
                    </thead>

                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($db->tampil_data_show_siswa() as $x) {
                        ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $x['nisn']; ?></td>
                          <td><?php echo $x['nama']; ?></td>
                          <td><?php echo ($x['jeniskelamin'] == 'L') ? 'Laki-laki' : 'Perempuan'; ?></td>
                          <td>
                            <?php
                            $jurusan_data = $db->tampil_data_show_jurusan();
                            $jurusan_map = [];

                            if (!empty($jurusan_data)) {
                              foreach ($jurusan_data as $a) {
                                $jurusan_map[$a['kodejurusan']] = $a['namajurusan'];
                              }
                            }

                            echo isset($jurusan_map[$x['kodejurusan']]) ? $jurusan_map[$x['kodejurusan']] : "Tidak Diketahui";
                            ?>
                          </td>
                          <td><?php echo $x['kelas']; ?></td>
                          <td><?php echo $x['alamat']; ?></td>
                          <td>
                            <?php
                            $agama_data = $db->tampil_data_show_agama();
                            $agama_map = [];

                            if (!empty($agama_data)) {
                              foreach ($agama_data as $a) {
                                $agama_map[$a['id_agama']] = $a['nama_agama'];
                              }
                            }

                            echo isset($agama_map[$x['agama']]) ? $agama_map[$x['agama']] : "Tidak Diketahui";
                            ?>
                          </td>
                          <td><?php echo $x['nohp']; ?></td>

                          <?php if ($_SESSION['role'] === 'admin'): ?>
                            <td>
                              <button class="btn btn-primary btn-edit" data-idsiswa="<?= $x['idsiswa'] ?>"
                                data-nisn="<?= $x['nisn'] ?>" data-nama="<?= $x['nama'] ?>"
                                data-jeniskelamin="<?= $x['jeniskelamin'] ?>" data-kodejurusan="<?= $x['kodejurusan'] ?>"
                                data-kelas="<?= $x['kelas'] ?>" data-alamat="<?= $x['alamat'] ?>"
                                data-agama="<?= $x['agama'] ?>" data-nohp="<?= $x['nohp'] ?>">
                                Edit
                              </button>

                              <button class="btn hapus" onclick="tampilkanPopupHapus(
                                  '<?= $x['idsiswa']; ?>',
                                  '<?= $x['nisn']; ?>',
                                  '<?= $x['nama']; ?>',
                                  '<?= $x['jeniskelamin'] == 'L' ? 'Laki-laki' : 'Perempuan'; ?>',
                                  '<?= isset($jurusan_map[$x['kodejurusan']]) ? $jurusan_map[$x['kodejurusan']] : 'Tidak Diketahui'; ?>',
                                  '<?= $x['kelas']; ?>',
                                  '<?= $x['alamat']; ?>',
                                  '<?= isset($agama_map[$x['agama']]) ? $agama_map[$x['agama']] : 'Tidak Diketahui'; ?>',
                                  '<?= $x['nohp']; ?>'
                                )">
                                                            Hapus
                                                          </button>
                                                        </td>
                                                      <?php endif; ?>

                                                      </td>

                                                    </tr>
                                                  <?php } ?>
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
  </Style>
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
    <h3>Edit Data Siswa</h3>
    <form action="proses_edit_siswa.php" method="POST">
      <input type="hidden" name="idsiswa" id="edit-idsiswa">

      <div style="display:flex; gap:20px;">
        <!-- Kolom Kiri -->
        <div style="flex:1;">
          <label>NISN</label>
          <input type="text" name="nisn" id="edit-nisn" readonly style="width:100%;"><br>

          <label>Nama</label>
          <input type="text" name="nama" id="edit-nama" style="width:100%;"><br>

          <label>Jenis Kelamin</label>
          <select name="jeniskelamin" id="edit-jeniskelamin" style="width:100%;">
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
          </select><br>

          <label>Jurusan</label>
          <select name="kodejurusan" id="edit-kodejurusan" style="width:100%;">
                  <option value="">-- Pilih Jurusan --</option>
                  <?php
                  foreach ($db->tampil_data_show_jurusan() as $jurusan) {
                    echo "<option value='{$jurusan['kodejurusan']}'>{$jurusan['namajurusan']}</option>";
                  }
                  ?>
                </select>
        </div>

        <!-- Kolom Kanan -->
        <div style="flex:1;">
          <label>Kelas</label>
          <input type="text" name="kelas" id="edit-kelas" style="width:100%;"><br>

          <label>Alamat</label>
          <input type="text" name="alamat" id="edit-alamat" style="width:100%;"><br>

          <label>Agama</label>
          <select name="agama" id="edit-agama" style="width:100%;">
                  <option value="">-- Pilih Agama --</option>
                  <?php
                  foreach ($db->tampil_data_show_agama() as $agama) {
                    echo "<option value='{$agama['id_agama']}'>{$agama['nama_agama']}</option>";
                  }
                  ?>
                </select>

          <label>No HP</label>
          <input type="text" name="nohp" id="edit-nohp" style="width:100%;"><br>
        </div>
      </div>

      <div style="margin-top:20px; text-align:right;">
        <button type="submit" name="update"
          style="padding:8px 16px; background:#4CAF50; color:white; border:none; border-radius:5px;">Simpan
          Perubahan</button>
        <button type="button" onclick="tutupModal()"
          style="padding:8px 16px; background:#f44336; color:white; border:none; border-radius:5px;">Batal</button>
      </div>
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


  <div id="popupHapus" class="popup" style="display: none;">
    <div class="popup-content">
      <h3 style="background: #dc3545; color: white; padding: 10px;">Konfirmasi Hapus</h3>
      <p>Yakin ingin menghapus data siswa ini?</p>
      <br>
      <p><strong>NISN:</strong> <span id="hapusNISN"></span></p>
      <p><strong>Nama:</strong> <span id="hapusNama"></span></p>
      <p><strong>Jenis Kelamin:</strong> <span id="hapusJK"></span></p>
      <p><strong>Jurusan:</strong> <span id="hapusJurusan"></span></p>
      <p><strong>Kelas:</strong> <span id="hapusKelas"></span></p>
      <p><strong>Alamat:</strong> <span id="hapusAlamat"></span></p>
      <p><strong>Agama:</strong> <span id="hapusAgama"></span></p>
      <p><strong>No HP:</strong> <span id="hapusNoHP"></span></p>

      <div style="text-align: right;">
        <button onclick="tutupPopupHapus()" class="btn" style="background:#6c757d;">Batal</button>
        <a href="#" id="linkHapusKonfirmasi" class="btn" style="background:#dc3545;">Hapus</a>
      </div>
    </div>
  </div>

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

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
    $(document).ready(function () {
      $('#tabelSiswa').DataTable({
        "paging": true,
        "searching": true,
        "info": false,
        "lengthChange": true,
        "pageLength": 6
      });
    });
  </script>

  <script>
    const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
    const Default = {
      scrollbarTheme: 'os-theme-light',
      scrollbarAutoHide: 'leave',
      scrollbarClickScroll: true,
    };
    document.addEventListener('DOMContentLoaded', function () {
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

    logoutBtn.addEventListener('click', function () {
      logoutModal.style.display = 'block';
    });

    cancelLogout.addEventListener('click', function () {
      logoutModal.style.display = 'none'; // ✅ cukup ditutup, tidak logout
    });

    confirmLogout.addEventListener('click', function () {
      window.location.href = "logout.php";
    });

    // Tutup modal jika klik di luar area modal
    window.addEventListener('click', function (event) {
      if (event.target == logoutModal) {
        logoutModal.style.display = 'none';
      }
    });
  </script>
  <script>
    function tampilkanPopupHapus(idsiswa, nisn, nama, jk, jurusan, kelas, alamat, agama, nohp) {
      document.getElementById('hapusNISN').textContent = nisn;
      document.getElementById('hapusNama').textContent = nama;
      document.getElementById('hapusJK').textContent = jk;
      document.getElementById('hapusJurusan').textContent = jurusan;
      document.getElementById('hapusKelas').textContent = kelas;
      document.getElementById('hapusAlamat').textContent = alamat;
      document.getElementById('hapusAgama').textContent = agama;
      document.getElementById('hapusNoHP').textContent = nohp;
        document.getElementById('overlay').style.display = 'block';

      document.getElementById('linkHapusKonfirmasi').href = "hapus.php?idsiswa=" + idsiswa + "&aksi=hapus";

      // Tampilkan popup
      document.getElementById('popupHapus').style.display = 'block';
    }

    function tutupPopupHapus() {
      document.getElementById('popupHapus').style.display = 'none';
      document.getElementById('overlay').style.display = 'none';
    }
  </script>

  <script>
    document.querySelectorAll('.btn-edit').forEach(function (button) {
      button.addEventListener('click', function () {
        document.getElementById('edit-idsiswa').value = this.dataset.idsiswa;
        document.getElementById('edit-nisn').value = this.dataset.nisn;
        document.getElementById('edit-nama').value = this.dataset.nama;
        document.getElementById('edit-jeniskelamin').value = this.dataset.jeniskelamin;
        document.getElementById('edit-kodejurusan').value = this.dataset.kodejurusan;
        document.getElementById('edit-kelas').value = this.dataset.kelas;
        document.getElementById('edit-alamat').value = this.dataset.alamat;
        document.getElementById('edit-agama').value = this.dataset.agama;
        document.getElementById('edit-nohp').value = this.dataset.nohp;

        document.getElementById('editModal').style.display = 'block';
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