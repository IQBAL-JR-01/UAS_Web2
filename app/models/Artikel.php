<?php
class Artikel {
    private $db;

    public function __construct($db_connection) {
        $this->db = $db_connection;
    }

    public function validasi($data) {
        if (empty($data['judul']) || empty($data['penulis']) || empty($data['kategori']) || empty($data['tanggal']) || empty($data['isi_artikel'])) {
            return "Semua field wajib diisi!";
        }
        if (strlen($data['judul']) < 5) {
            return "Judul minimal harus 5 karakter!";
        }
        if (is_numeric($data['penulis'])) {
            return "Penulis tidak boleh berupa angka!";
        }
        return "VALID";
    }

    public function tampil($keyword = null, $limit = 5, $offset = 0) {
        if ($keyword) {
            $query = "SELECT * FROM artikel WHERE 
                      judul LIKE '%$keyword%' OR 
                      penulis LIKE '%$keyword%' OR 
                      kategori LIKE '%$keyword%' 
                      ORDER BY id DESC LIMIT $limit OFFSET $offset";
        } else {
            $query = "SELECT * FROM artikel ORDER BY id DESC LIMIT $limit OFFSET $offset";
        }
        $result = mysqli_query($this->db, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function hitungTotal($keyword = null) {
        if ($keyword) {
            $query = "SELECT COUNT(*) as total FROM artikel WHERE judul LIKE '%$keyword%' OR penulis LIKE '%$keyword%' OR kategori LIKE '%$keyword%'";
        } else {
            $query = "SELECT COUNT(*) as total FROM artikel";
        }
        $result = mysqli_query($this->db, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }

    public function ambilMasingMasing($id) {
        $query = "SELECT * FROM artikel WHERE id = $id";
        $result = mysqli_query($this->db, $query);
        return mysqli_fetch_assoc($result);
    }

    public function tambah($data) {
        $validasiStatus = $this->validasi($data);
        if ($validasiStatus !== "VALID") {
            return $validasiStatus;
        }

        $judul = mysqli_real_escape_string($this->db, $data['judul']);
        $penulis = mysqli_real_escape_string($this->db, $data['penulis']);
        $kategori = mysqli_real_escape_string($this->db, $data['kategori']);
        $tanggal = mysqli_real_escape_string($this->db, $data['tanggal']);
        $isi = mysqli_real_escape_string($this->db, $data['isi_artikel']);

        $query = "INSERT INTO artikel (judul, penulis, kategori, tanggal, isi_artikel) 
                  VALUES ('$judul', '$penulis', '$kategori', '$tanggal', '$isi')";
        
        if (mysqli_query($this->db, $query)) {
            return "SUKSES";
        }
        return "Gagal menambah data.";
    }

    public function edit($data) {
        $validasiStatus = $this->validasi($data);
        if ($validasiStatus !== "VALID") {
            return $validasiStatus;
        }

        $id = intval($data['id']);
        $judul = mysqli_real_escape_string($this->db, $data['judul']);
        $penulis = mysqli_real_escape_string($this->db, $data['penulis']);
        $kategori = mysqli_real_escape_string($this->db, $data['kategori']);
        $tanggal = mysqli_real_escape_string($this->db, $data['tanggal']);
        $isi = mysqli_real_escape_string($this->db, $data['isi_artikel']);

        $query = "UPDATE artikel SET 
                    judul = '$judul', 
                    penulis = '$penulis', 
                    kategori = '$kategori', 
                    tanggal = '$tanggal', 
                    isi_artikel = '$isi'
                  WHERE id = $id";

        if (mysqli_query($this->db, $query)) {
            return "SUKSES";
        }
        return "Gagal memperbarui data.";
    }

    public function hapus($id) {
        $id = intval($id);
        $query = "DELETE FROM artikel WHERE id = $id";
        return mysqli_query($this->db, $query);
    }
}
?>