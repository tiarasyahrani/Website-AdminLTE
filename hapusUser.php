<?php
include "KoneksiLogin.php";
$db = new database();
$conn = $db->getConnection();

if (isset($_GET['id']) && $_GET['aksi'] == 'hapus') {
    $id = intval($_GET['id']);
    $query = "DELETE FROM users WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: managementUser.php");
    } else {
        echo "Gagal menghapus user.";
    }
}
?>
