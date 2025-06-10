<?php
session_start();
include "KoneksiLogin.php"; // huruf besar kecil penting!

$db = new database();
$conn = $db->getConnection(); // tambahkan ini

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);

    $_SESSION['username'] = $user['username'];
    $_SESSION['role']     = $user['role'];

    if ($user['role'] == 'admin') {
        header("Location: index.php");
        exit;
    } else if ($user['role'] == 'siswa') {
        header("Location: index.php"); // Ganti jika ada halaman siswa
        exit;
    }

} else {
    echo "<script>
        alert('Login gagal! Username/NISN atau password salah.');
        window.location.href = 'LoginUser.php';
    </script>";
}
?>
