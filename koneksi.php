<?php

class database
{
    private $host = "localhost:3306"; // Pastikan port sesuai
    private $user = "root";
    private $password = "";
    private $database = "sekolah";
    public $koneksi;

    function __construct()
    {
        // Koneksi langsung ke database
        $this->koneksi = mysqli_connect(
            $this->host,
            $this->user,
            $this->password,
            $this->database
        );

        if (!$this->koneksi) {
            die("Koneksi ke database gagal: " . mysqli_connect_error());
        }
    }

    function tampil_data_show_siswa()
    {
        $data = mysqli_query($this->koneksi, "SELECT * FROM siswa ORDER BY kodejurusan ASC");
        $hasil = [];
        while ($row = mysqli_fetch_array($data)) {
            $hasil[] = $row;
        }
        return $hasil;
    }


    function tampil_data_show_agama()
    {
        $data = mysqli_query($this->koneksi, "SELECT * FROM agama");
        $hasil = [];
        while ($row = mysqli_fetch_array($data)) {
            $hasil[] = $row;
        }
        return $hasil;
    }

    function tambah_siswa($nisn, $nama, $jeniskelamin, $kodejurusan, $kelas, $alamat, $agama, $nohp)
    {
        $query = "INSERT INTO siswa (nisn, nama, jeniskelamin, kodejurusan, kelas, alamat, agama, nohp) 
                  VALUES ('$nisn', '$nama', '$jeniskelamin', '$kodejurusan', '$kelas', '$alamat', '$agama', '$nohp')";

        $result = mysqli_query($this->koneksi, $query);
        if (!$result) {
            die("Query gagal: " . mysqli_error($this->koneksi));
        }
    }
    function tampil_data_show_jurusan()
    {
        $data = mysqli_query($this->koneksi, "SELECT * FROM jurusan");
        $hasil = [];
        while ($row = mysqli_fetch_array($data)) {
            $hasil[] = $row;
        }
        return $hasil;
    }


    function tambah_jurusan($kodejurusan, $namajurusan)
    {
        $query = "INSERT INTO jurusan (kodejurusan, namajurusan) VALUES ('$kodejurusan', '$namajurusan')";
        $result = mysqli_query($this->koneksi, $query);

        if (!$result) {
            die("Gagal menyimpan data: " . mysqli_error($this->koneksi));
        }
    }
    function tambah_agama($id_agama, $nama_agama)
    {
        $query = "INSERT INTO agama (id_agama, nama_agama) VALUES ('$id_agama', '$nama_agama')";
        $result = mysqli_query($this->koneksi, $query);

        if (!$result) {
            die("Gagal menyimpan data agama: " . mysqli_error($this->koneksi));
        }
    }






}

?>