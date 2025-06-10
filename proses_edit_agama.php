<?php
include "koneksi.php";
$db = new database();

if (isset($_POST['update'])) {
    $id_agama = $_POST['id_agama'];
    $nama_agama = $_POST['nama_agama'];

    // Validasi sederhana (optional tapi disarankan)
    if (empty($id_agama) || empty($nama_agama)) {
        exit();
    }

    // Gunakan prepared statement
    $stmt = mysqli_prepare($db->koneksi, "UPDATE agama SET nama_agama = ? WHERE id_agama = ?");
    mysqli_stmt_bind_param($stmt, "ss", $nama_agama, $id_agama);
    mysqli_stmt_execute($stmt);

    header("Location: dataagama.php");
    exit();
}
?>
