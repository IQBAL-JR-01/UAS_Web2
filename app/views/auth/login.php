<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin - Sistem Manajemen Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f6f9; display: flex; align-items: center; min-height: 100vh; }
        .login-card { max-width: 400px; width: 100%; margin: auto; border: none; border-radius: 8px; }
        .card-header-blue { background-color: #0d6efd; color: white; border-top-left-radius: 8px; border-top-right-radius: 8px; }
        .icon-circle { width: 70px; height: 70px; background-color: #0d6efd; color: white; display: flex; align-items: center; justify-content: center; font-size: 32px; border-radius: 50%; margin: 0 auto 15px auto; border: 4px solid white; box-shadow: 0px 4px 6px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
<div class="container">
    <?php if (isset($_GET['status']) && $_GET['status'] === 'logout'): ?>
        <div class="card p-4 shadow-sm mx-auto mb-4 text-center" style="max-width: 500px; background-color: #e2f0d9; border-color: #c5e1a5;">
            <div class="text-success fs-1 mb-2"><i class="bi bi-check-circle-fill"></i></div>
            <p class="mb-3">Anda telah berhasil logout.<br><small class="text-muted">Silakan login kembali.</small></p>
            <a href="index.php?page=login" class="btn btn-primary px-4 btn-sm mx-auto">Login Kembali</a>
        </div>
    <?php else: ?>
        <div class="card login-card shadow-sm">
            <div class="card-header-blue text-center pt-4 pb-3">
                <div class="icon-circle"><i class="bi bi-lock-fill"></i></div>
                <h4 class="mb-0">LOGIN ADMIN</h4>
                <small>Sistem Manajemen Artikel</small>
            </div>
            <div class="card-body p-4">
                <?php if (isset($_GET['status']) && $_GET['status'] === 'error'): ?>
                    <div class="text-danger small mb-3 text-center">* Username atau Password salah!</div>
                <?php endif; ?>
                <form action="index.php?page=proses_login" method="POST">
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-light"><i class="bi bi-person"></i></span>
                        <input type="text" name="username" class="form-control" placeholder="admin" required>
                    </div>
                    <div class="input-group mb-4">
                        <span class="input-group-text bg-light"><i class="bi bi-key"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="******" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">LOGIN</button>
                </form>
            </div>
        </div>
    <?php endif; ?>
</div>
</body>
</html>