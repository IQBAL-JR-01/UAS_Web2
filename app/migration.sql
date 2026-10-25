-- Tabel untuk Login Admin
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Insert data admin default (password bisa pakai MD5 atau password_hash php)
INSERT INTO users (username, password) VALUES ('admin', 'admin123');

-- Tabel untuk Artikel
CREATE TABLE articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    penulis VARCHAR(100) NOT NULL,
    kategori VARCHAR(100) NOT NULL,
    tanggal DATE NOT NULL,
    isi_artikel TEXT NOT NULL
);