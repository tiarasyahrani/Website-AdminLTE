<?php
include "koneksi.php";
$db = new database();

if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
    $kodejurusan = $_GET['kodejurusan'];

    // Jalankan query hapus jurusan
    $query = "DELETE FROM jurusan WHERE kodejurusan = '$kodejurusan'";
    mysqli_query($db->koneksi, $query);

    // Redirect kembali ke halaman data jurusan
    header("Location: datajurusan.php");
    exit();
}
?>
