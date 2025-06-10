<?php 
$role = $_SESSION['role'] ?? 'guest'; 
?>

<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
  <div class="sidebar-brand">
    <a href="./index.php" class="brand-link">
      <span class="brand-text fw-light">SMKN 6 SKA</span>
    </a>
  </div>

  <div class="sidebar-wrapper">
    <nav class="mt-2">
      <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
        
        <li class="nav-item">
          <a href="index.php" class="nav-link">
            <i class="nav-icon bi bi-house-fill"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-clipboard-data"></i>
            <p>Data<i class="nav-arrow bi bi-chevron-right"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="datasiswa.php" class="nav-link">
                <i class="nav-icon bi bi-person-fill"></i>
                <p>Data Siswa</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="datajurusan.php" class="nav-link">
                <i class="nav-icon bi bi-mortarboard"></i>
                <p>Data Jurusan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="dataagama.php" class="nav-link">
                <i class="nav-icon bi bi-book-fill"></i>
                <p>Data Agama</p>
              </a>
            </li>
          </ul>
        </li>

        <?php if ($role === 'admin'): ?>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-plus-circle"></i>
            <p>Tambah Data<i class="nav-arrow bi bi-chevron-right"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="tambah_siswa.php" class="nav-link">
                <i class="nav-icon bi bi-person-fill-add"></i>
                <p>Tambah Siswa</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="tambah_jurusan.php" class="nav-link">
                <i class="nav-icon bi bi-clipboard-plus"></i>
                <p>Tambah Jurusan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="tambah_agama.php" class="nav-link">
                <i class="nav-icon bi bi-journal-plus"></i>
                <p>Tambah Agama</p>
              </a>
            </li>
          </ul>
        </li>
        <?php endif; ?>
        <?php if ($role === 'admin'): ?>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-people"></i>
            <p>Users<i class="nav-arrow bi bi-chevron-right"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="managementUser.php" class="nav-link">
                <i class="nav-icon bi bi-person-check-fill"></i>
                <p>Management User</p>
              </a>
            </li>
                      <li class="nav-item">
              <a href="tambah_user.php" class="nav-link">
                <i class="nav-icon bi bi-person-fill-add"></i>
                <p>Tambah User</p>
              </a>
            </li>
                    <?php endif; ?>
            <li class="nav-item">
              <a href="ProfileUser.php" class="nav-link">
                <i class="nav-icon bi bi-person-circle"></i>
                <p>Profile</p>
              </a>
            </li>
          </ul>

        </li>
          
        <!--end::Sidebar Wrapper-->
      </aside>