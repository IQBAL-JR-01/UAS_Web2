# UAS_Web2

Proyek ini adalah aplikasi berbasis web yang dikembangkan menggunakan PHP *native* dengan menerapkan pola arsitektur MVC (Model-View-Controller). Aplikasi ini dibuat untuk memenuhi tugas Ujian Akhir Semester (UAS) mata kuliah Pemrograman Web.

## Fitur Utama
* **Sistem Autentikasi**: Halaman `login.php` untuk akses masuk pengguna.
* **Dashboard**: Halaman utama yang menampilkan ringkasan data setelah pengguna berhasil login.
* **Struktur MVC**: Pemisahan yang rapi antara antarmuka (*View*), logika bisnis (*Controller*), dan pengelolaan basis data (*Model*).

## Persyaratan Sistem
* Lingkungan pengembangan lokal seperti XAMPP atau Laragon.
* PHP versi 7.x atau 8.x.
* MySQL / MariaDB.
* Web browser modern.

## Cara Instalasi
1. Pindahkan folder proyek `UAS_Web2` ke dalam direktori *document root* web server lokal Anda (`htdocs` untuk XAMPP atau `www` untuk Laragon).
2. Nyalakan modul Apache dan MySQL melalui panel kontrol XAMPP/Laragon.
3. Buka phpMyAdmin di `http://localhost/phpmyadmin`.
4. Buat *database* baru (misalnya: `db_uas_web2`) dan impor file `.sql` yang menyertai proyek ini (jika ada).
5. Buka konfigurasi koneksi *database* (biasanya terletak di dalam `app/config/` atau root direktori) dan sesuaikan detail *host*, *username*, *password*, serta nama *database*.
6. Buka web browser dan akses proyek melalui: `http://localhost/UAS_Web2`

## Struktur Direktori Utama
* `app/controllers/` - Mengatur alur logika antara pengguna, *Model*, dan *View*.
* `app/models/` - Menangani query dan operasi *database*.
* `app/views/` - Berisi file antarmuka (HTML/PHP) yang akan dirender ke pengguna.

## Pengembang
* **T Muhammad Iqbal Nazwan** - Sistem Informasi
