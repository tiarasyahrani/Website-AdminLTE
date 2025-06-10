<?php
include "koneksi.php";
$db = new database();

if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
    // Ambil id_agama dari URL, amankan dengan mysqli_real_escape_string
    $id_agama = mysqli_real_escape_string($db->koneksi, $_GET['id_agama']);

    // Query hapus data agama
    $query = "DELETE FROM agama WHERE id_agama = '$id_agama'";
    $hapus = mysqli_query($db->koneksi, $query);

    if ($hapus) {
        // Jika berhasil hapus, redirect ke halaman data agama
        header("Location: dataagama.php?status=hapusberhasil");
        exit();
    } else {
        // Jika gagal hapus, redirect dengan pesan error
        header("Location: dataagama.php?status=hapusgagal");
        exit();
    }
} else {
    // Jika aksi hapus tidak sesuai, langsung redirect
    header("Location: dataagama.php");
    exit();
}
?>
