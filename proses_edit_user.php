<?php
include "KoneksiLogin.php";
$db = new database();
$conn = $db->getConnection();

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if (empty($id) || empty($username) || empty($password) || empty($role)) {
        exit("Data tidak boleh kosong.");
    }

    $stmt = mysqli_prepare($conn, "UPDATE users SET username = ?, password = ?, role = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "sssi", $username, $password, $role, $id);
    mysqli_stmt_execute($stmt);

    header("Location: managementUser.php");
    exit();
}
?>
