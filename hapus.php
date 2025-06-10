<?php
include "koneksi.php";
$db = new database();

if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
    $idsiswa = $_GET['idsiswa'];

    // Jalankan query untuk menghapus data
    $query = "DELETE FROM siswa WHERE idsiswa = '$idsiswa'";
    mysqli_query($db->koneksi, $query);

    // Redirect kembali ke halaman datasiswa
    header("Location: datasiswa.php");
    exit();
}
?>
