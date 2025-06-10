<?php
include "koneksi.php";
$db = new database();

if (isset($_POST['update'])) {
    $kodejurusan = $_POST['kodejurusan'];
    $namajurusan = $_POST['namajurusan'];

    // Validasi sederhana (optional tapi disarankan)
    if (empty($kodejurusan) || empty($namajurusan)) {
        exit();
    }

    // Gunakan prepared statement
    $stmt = mysqli_prepare($db->koneksi, "UPDATE jurusan SET namajurusan = ? WHERE kodejurusan = ?");
    mysqli_stmt_bind_param($stmt, "ss", $namajurusan, $kodejurusan);
    mysqli_stmt_execute($stmt);

    header("Location: datajurusan.php");
    exit();
}
?>
