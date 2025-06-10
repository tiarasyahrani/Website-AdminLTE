<?php
include "koneksi.php";
$db = new database();

if (isset($_POST['update'])) {
    $idsiswa = $_POST['idsiswa'];
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $kodejurusan = $_POST['kodejurusan'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $agama = $_POST['agama'];
    $nohp = $_POST['nohp'];

    $query = "UPDATE siswa SET 
        nisn = '$nisn',
        nama = '$nama',
        jeniskelamin = '$jeniskelamin',
        kodejurusan = '$kodejurusan',
        kelas = '$kelas',
        alamat = '$alamat',
        agama = '$agama',
        nohp = '$nohp'
        WHERE idsiswa = '$idsiswa'";

    mysqli_query($db->koneksi, $query);
    header("Location: datasiswa.php");
    exit();
}
?>
