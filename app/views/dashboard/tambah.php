<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Artikel Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .sidebar { width: 260px; min-height: 100vh; background-color: #212529; color: white; position: fixed; }
        .main-content { margin-left: 260px; padding: 30px; width: calc(100% - 260px); }
        .sidebar-link { color: rgba(255,255,255,0.75); text-decoration: none; padding: 12px 20px; display: block; border-radius: 4px; }
        .sidebar-link:hover, .sidebar-link.active { background-color: #0d6efd; color: white; }
    </style>
</head>
<body>
<div class="d-flex">
    <div class="sidebar p-3">
        <h4 class="text-center py-3 mb-4 border-bottom border-secondary">SISTEM ARTIKEL</h4>
        <nav class="nav flex-column gap-1">
            <a href="index.php?page=home" class="sidebar-link"><i class="bi bi-house-door me-2"></i> Dashboard</a>
            <a href="index.php?page=tambah" class="sidebar-link active"><i class="bi bi-plus-circle me-2"></i> Tambah Artikel</a>
            <a href="index.php?page=logout" class="sidebar-link mt-4 text-danger"><i class="bi bi-box-arrow-left me-2"></i> Logout</a>
        </nav>
    </div>

    <div class="main-content">
        <h2 class="mb-4">TAMBAH ARTIKEL</h2>
        <hr>

        <?php if (isset($_SESSION['flash_error'])): ?>
            <div class="alert alert-danger p-2 small" role="alert">
                * <?= $_SESSION['flash_error']; unset($_SESSION['flash_error']); ?>
            </div>
        <?php endif; ?>

        <div class="card p-4 shadow-sm border-0 bg-light" style="max-width: 700px;">
            <form action="index.php?page=proses_tambah" method="POST">
                <div class="row mb-3 align-items-center">
                    <label class="col-sm-3 col-form-label">Judul</label>
                    <div class="col-sm-9"><input type="text" name="judul" class="form-control" required></div>
                </div>
                
                <div class="row mb-3 align-items-center">
                    <label class="col-sm-3 col-form-label">Penulis</label>
                    <div class="col-sm-9"><input type="text" name="penulis" class="form-control" required></div>
                </div>
                
                <div class="row mb-3 align-items-center">
                    <label class="col-sm-3 col-form-label">Kategori</label>
                    <div class="col-sm-9">
                        <input type="text" name="kategori" class="form-control" placeholder="Contoh: Web, Pemrograman, dll" required>
                    </div>
                </div>
                
                <div class="row mb-3 align-items-center">
                    <label class="col-sm-3 col-form-label">Tanggal</label>
                    <div class="col-sm-9"><input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d'); ?>" required></div>
                </div>
                
                <div class="row mb-4">
                    <label class="col-sm-3 col-form-label">Isi Artikel</label>
                    <div class="col-sm-9"><textarea name="isi_artikel" rows="5" class="form-control" required></textarea></div>
                </div>

                <div class="row">
                    <div class="col-sm-9 offset-sm-3">
                        <button type="submit" class="btn btn-primary px-4 me-2">Simpan</button>
                        <a href="index.php?page=home" class="btn btn-secondary px-4">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>