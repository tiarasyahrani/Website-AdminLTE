<?php
class database {
    private $conn;

    public function __construct() {
        $host = "localhost";
        $port = "3306"; // sesuaikan jika pakai port
        $user = "root";
        $pass = "";
        $db   = "login_siswa";

        $this->conn = new mysqli($host, $user, $pass, $db, $port);

        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    public function tampil_data_users() {
        $query = $this->conn->query("SELECT * FROM users");
        $data = [];
        while ($row = $query->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
        public function getConnection() {
        return $this->conn;
    }

   function tambah_user($username, $password, $role)
{
    $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
    $result = mysqli_query($this->conn, $query);

    if (!$result) {
        die("Gagal menyimpan data user: " . mysqli_error($this->conn));
    }
}


}
?>
