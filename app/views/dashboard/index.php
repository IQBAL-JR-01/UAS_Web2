<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Data Artikel</title>
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
        <div class="d-flex align-items-center px-2 mb-4">
            <div class="fs-2 text-secondary me-3"><i class="bi bi-person-circle"></i></div>
            <div>
                <h6 class="mb-0">Admin</h6>
                <small class="text-muted">Administrator</small>
            </div>
        </div>
        <nav class="nav flex-column gap-1">
            <a href="index.php?page=home" class="sidebar-link active"><i class="bi bi-house-door me-2"></i> Dashboard</a>
            <a href="index.php?page=tambah" class="sidebar-link"><i class="bi bi-plus-circle me-2"></i> Tambah Artikel</a>
            <a href="index.php?page=logout" class="sidebar-link mt-4 text-danger"><i class="bi bi-box-arrow-left me-2"></i> Logout</a>
        </nav>
    </div>

    <div class="main-content">
        <h2 class="mb-4">DATA ARTIKEL</h2>
        <hr>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="index.php?page=tambah" class="btn btn-success"><i class="bi bi-plus"></i> Tambah Artikel</a>
            <form action="index.php?page=home" method="POST" class="d-flex style='max-width: 400px;'">
                <input type="text" name="keyword" class="form-control me-2" placeholder="Cari judul, penulis, kategori..." value="<?= isset($_POST['keyword']) ? htmlspecialchars($_POST['keyword']) : ''; ?>">
                <button type="submit" class="btn btn-primary px-4">Cari</button>
            </form>
        </div>

        <table class="table table-bordered table-striped align-middle">
            <thead class="table-primary text-center">
                <tr>
                    <th style="width: 5%;">No</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Kategori</th>
                    <th style="width: 15%;">Tanggal</th>
                    <th style="width: 15%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($all_artikel)): ?>
                    <tr><td colspan="6" class="text-center text-muted py-3">Tidak ada data artikel tersedia.</td></tr>
                <?php else: $no = 1; foreach ($all_artikel as $art): ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td><?= htmlspecialchars($art['judul']); ?></td>
                        <td><?= htmlspecialchars($art['penulis']); ?></td>
                        <td class="text-center"><span class="badge bg-secondary"><?= htmlspecialchars($art['kategori']); ?></span></td>
                        <td class="text-center"><?= date('Y-m-d', strtotime($art['tanggal'])); ?></td>
                        <td class="text-center">
                            <a href="index.php?page=edit&id=<?= $art['id']; ?>" class="btn btn-warning btn-sm px-2"><i class="bi bi-pencil-square"></i> Edit</a>
                            <a href="#" class="btn btn-danger btn-sm px-2" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $art['id']; ?>"><i class="bi bi-trash"></i> Hapus</a>
                        </td>
                    </tr>

                    <div class="modal fade" id="deleteModal<?= $art['id']; ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" style="max-width: 380px;">
                            <div class="modal-content border-0 shadow">
                                <div class="modal-header border-0 pe-3 pt-3">
                                    <button type="text" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center pb-4">
                                    <div class="text-warning display-3 mb-3"><i class="bi bi-exclamation-triangle-fill"></i></div>
                                    <h5 class="modal-title mb-2">Konfirmasi Hapus</h5>
                                    <p class="text-muted small">Apakah Anda yakin ingin menghapus artikel ini?</p>
                                    <div class="d-flex justify-content-center gap-2 mt-4">
                                        <button type="button" class="btn btn-light px-4 border" data-bs-dismiss="modal">Batal</button>
                                        <a href="index.php?page=hapus&id=<?= $art['id']; ?>" class="btn btn-danger px-4">Ya, Hapus!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; endif; ?>
            </tbody>
        </table>
        <small class="text-muted">Total Data: <?= count($all_artikel); ?> artikel</small>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>