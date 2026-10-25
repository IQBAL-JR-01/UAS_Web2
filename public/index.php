<?php
session_start();
require_once '../app/init.php';

$database = new Database();
$artikelModel = new Artikel($database->conn);

$page = isset($_GET['page']) ? $_GET['page'] : 'login';
$error_message = '';
$success_message = '';

// Proteksi Halaman: Jika belum login, wajib diarahkan ke halaman login
if (!isset($_SESSION['admin_logged']) && $page !== 'login' && $page !== 'proses_login') {
    header("Location: index.php?page=login");
    exit;
}

// Handler Aksi Routing Sederhana
switch ($page) {
    case 'proses_login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Sesuai ketentuan akun di soal
            if ($username === 'admin' && $password === '12345') {
                $_SESSION['admin_logged'] = true;
                header("Location: index.php?page=home");
                exit;
            } else {
                header("Location: index.php?page=login&status=error");
                exit;
            }
        }
        break;

    case 'logout':
        unset($_SESSION['admin_logged']);
        session_destroy();
        header("Location: index.php?page=login&status=logout");
        exit;

    case 'proses_tambah':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $hasil = $artikelModel->tambah($_POST);
            if ($hasil === "SUKSES") {
                header("Location: index.php?page=home");
                exit;
            } else {
                $_SESSION['flash_error'] = $hasil;
                header("Location: index.php?page=tambah");
                exit;
            }
        }
        break;

    case 'proses_edit':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $hasil = $artikelModel->edit($_POST);
            if ($hasil === "SUKSES") {
                header("Location: index.php?page=home");
                exit;
            } else {
                $_SESSION['flash_error'] = $hasil;
                header("Location: index.php?page=edit&id=" . $_POST['id']);
                exit;
            }
        }
        break;

    case 'hapus':
        if (isset($_GET['id'])) {
            $artikelModel->hapus($_GET['id']);
        }
        header("Location: index.php?page=home");
        exit;

    // Bagian Rendering View Halaman
    case 'login':
        require_once '../app/views/auth/login.php';
        break;

    case 'home':
        $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : (isset($_GET['keyword']) ? $_GET['keyword'] : null);
        
        // Setup Pagination
        $limit = 5; // Jumlah data per halaman
        $halamanAktif = isset($_GET['hal']) ? (int)$_GET['hal'] : 1;
        $offset = ($halamanAktif - 1) * $limit;
        
        $total_data = $artikelModel->hitungTotal($keyword);
        $total_halaman = ceil($total_data / $limit);
        
        $all_artikel = $artikelModel->tampil($keyword, $limit, $offset);
        require_once '../app/views/dashboard/index.php';
        break;

    case 'tambah':
        require_once '../app/views/dashboard/tambah.php';
        break;

    case 'edit':
        if (isset($_GET['id'])) {
            $data_artikel = $artikelModel->ambilMasingMasing($_GET['id']);
            require_once '../app/views/dashboard/edit.php';
        } else {
            header("Location: index.php?page=home");
        }
        break;

    default:
        header("Location: index.php?page=login");
        exit;
}
?>