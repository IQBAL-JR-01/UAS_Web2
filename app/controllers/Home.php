<?php

class Home {
    // Halaman Polos (Default)
    public function index()
    {
        // CSS Internal untuk mengatur tata letak tombol agar responsive
        echo "
        <style>
            .container {
                display: flex;
                flex-wrap: wrap; /* Membuat tombol turun ke bawah jika layar sempit */
                gap: 15px;      /* Memberi jarak antar tombol */
                margin-top: 20px;
            }
            .btn {
                padding: 12px 20px;
                background-color: blue;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                text-align: center;
                flex: 1;          /* Membuat tombol melebar mengisi ruang */
                min-width: 200px; /* Batas minimum lebar tombol sebelum dia pindah ke bawah */
                transition: 0.3s;
            }
            .btn:hover {
                background-color: darkblue;
            }
        </style>
        ";

        echo "<h1>Selamat Datang! Halaman Home berhasil dimuat.</h1>";
        
        // Membungkus tombol dalam div container
        echo "<div class='container'>";
            echo "<a href='http://localhost/blogapp/public/home/berita' class='btn'>Klik untuk ke Tampilan Kosong TGD News</a>";
            echo "<a href='https://trigunadharma.ac.id/category/berita-kampus' class='btn'>Klik untuk ke TGD News Resmi</a>";
        echo "</div>";
    }

    // Halaman Baru (TGD News)
    public function berita()
    {
        require_once '../app/views/index.php';
    }
}
?>