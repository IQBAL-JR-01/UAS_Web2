<?php
class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;
    public $conn;

    public function __construct() {
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db_name);
        
        if (!$this->conn) {
            die("Koneksi Database Gagal: " . mysqli_connect_error());
        }
    }
}
?>