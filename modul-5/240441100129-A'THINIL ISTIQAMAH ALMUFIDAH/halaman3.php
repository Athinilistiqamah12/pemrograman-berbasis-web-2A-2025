 <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Blog Reflektif</title>
    <style>
        body {
            background-color: #d0f0c0;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background: rgb(243, 239, 239);
            padding: 20px;
            border-radius: 10px;
        }

        .navbar {
            background-color:rgb(123, 113, 81);
            overflow: hidden;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 14px 20px;
            display: inline-block;
        }

        .navbar a:hover {
            background-color: #6c757d;
        }

        h1, h2 {
            text-align: center;
        }

        p {
            text-align: justify;
            line-height: 1.6;
        }

        img {
            max-width: 100%;
            border-radius: 8px;
            margin: 10px 0;
        }

        .nav-link {
            display: inline-block;
            margin: 5px;
            padding: 10px;
            background-color: rgb(125, 116, 87);
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .nav-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <center>
            <a href="halaman1.php">Halaman</a>
            <a href="halaman2.php">Pengalaman</a>
            <a href="halaman3.php">Blog</a>
        </center>
    </div>
    <div class="container">
        <h1>Blog Reflektif</h1>

        <?php
        $artikel = [
            [
                "judul" => "Belajar IT untuk Masa Depan",
                "tanggal" => "2024-11-20",
                "refleksi" => "Belajar terus menerus saat di kelas. Saya mulai menyadari pentingnya belajar mandiri dari berbagai sumber seperti artikel dan video tutorial.",
                "gambar" =>"https://imgur.com/7uck2qY.jpg",
                "kutipan" => [
                    "Semakin banyak belajar, semakin sadar kita akan ketidaktahuan."
                ],
                "sumber" => "https://perpusteknik.com/metode-pembelajaran-berbasis-it/"
            ],
            [
                "judul" => "Mengembangkan Soft Skill",
                "tanggal" => "2025-01-10",
                "refleksi" => "Keterampilan seperti komunikasi dan manajemen waktu sangat saya butuhkan selama kuliah. Ini tidak diajarkan secara formal, tapi sangat penting.",
                "gambar" => "https://imgur.com/aW5p3To.jpg",
                "kutipan" => [
                    "Soft skill membentuk bagaimana kita diterima, bukan hanya seberapa pintar kita."
                ],
                "sumber" => "https://binuscareer.com/article/317/pentingnya-softskills-untuk-kesuksesan-berkarir/"
            ],
            [
                "judul" => "Kesuksesan Tanpa Jatuh",
                "tanggal" => "2025-03-05",
                "refleksi" => "Tidak semua hal berjalan mulus. Namun dari kegagalan, saya belajar menjadi lebih kuat dan percaya diri dalam menghadapi tantangan.",
                "gambar" => "https://imgur.com/Z6e56Wd.jpg",
                "kutipan" => [
                    "Kegagalan adalah kesempatan untuk memulai kembali dengan lebih cerdas."
                ],
                "sumber" => "https://www.belajarberkarir.com/tips-dan-trik/tips-sukses-berkarir-lengkap-dengan-best-practice/"
            ]
        ];

        
        function tampilkanArtikel($data) {
            $kutipanAcak = $data["kutipan"][rand(0, count($data["kutipan"]) - 1)];

            echo "<h2>{$data['judul']}</h2>";
            echo "<p><em>Tanggal Posting: {$data['tanggal']}</em></p>";
            echo "<p>{$data['refleksi']}</p>";
            echo "<img src='{$data['gambar']}' alt='Gambar artikel'>";
            echo "<blockquote>\"$kutipanAcak\"</blockquote>";

            if (!empty($data["sumber"])) {
                echo "<p>Sumber referensi: <a href='{$data["sumber"]}' target='_blank'>{$data["sumber"]}</a></p>";
            }
        }

        // Ambil ID dari URL
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        // Tampilkan artikel berdasarkan ID
        if ($id >= 0 && $id < count($artikel)) {
            tampilkanArtikel($artikel[$id]);
        } else {
            echo "<p>Artikel tidak ditemukan.</p>";
        }

        echo "<hr><h3>Daftar Artikel</h3>";
        foreach ($artikel as $index => $a) {
            echo "<a class='nav-link' href='?id=$index'>{$a['judul']}</a>";
        }
        ?>
    </div>
</body>
</html>
