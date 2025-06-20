<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Timeline Pengalaman Kuliah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #d0f0c0;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background: rgb(243, 239, 239);
            padding: 20px;
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .timeline-item {
            margin-bottom: 30px;
        }

        .timeline-item h3 {
            color:rgb(130, 108, 65);
            margin-bottom: 5px;
        }

        .timeline-item p {
            text-align: justify;
            line-height: 1.6;
        }

        .buttons {
            text-align: center;
            margin-top: 30px;
        }

        .buttons a {
            text-decoration: none;
            background-color:rgb(125, 116, 87);
            color: white;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
        }

        .buttons a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Timeline Pengalaman Kuliah</h1>

        <div class="timeline">
            <?php
            function tampilkanTimeline($data) {
                foreach ($data as $judul => $isi) {
                    echo "<div class='timeline-item'>";
                    echo "<h3>$judul</h3>";
                    echo "<p>$isi</p>";
                    echo "</div>";
                }
            }

           
            $pengalaman = [
                "Kesan Pertama Kuliah" => "Awal masuk kuliah saya merasa antusias sekaligus gugup bertemu banyak teman baru. Saya sempat takut tidak mampu bertahan, namun ternyata kuliah tidak seburuk yang saya bayangkan.",
                "Mata Kuliah yang Menarik" => "Saya sangat tertarik dengan mata kuliah Pemrograman Web karena saya belajar membangun situs web menggunakan HTML dan CSS.",
                "Tantangan yang Dihadapi" => "Tantangan besar adalah menyesuaikan metode belajar dari SMK ke kuliah, serta membagi waktu antara tugas dan organisasi.",
                "Pencapaian Selama Kuliah" => "Saat ini belum memiliki pencapaian besar, namun saya akan terus berusaha agar dapat membanggakan orang tua.",
                "Pengalaman Organisasi dan Lomba" => "Saya aktif mengikuti organisasi teknologi dan menghadiri seminar untuk menambah wawasan.",
                "Bekerja Sambil Kuliah" => "Belum bekerja karena fokus saya saat ini adalah belajar sesuai arahan orang tua."
            ];

            
            tampilkanTimeline($pengalaman);
            ?>
        </div>

        <div class="buttons">
            <a href="halaman1.php">Kembali ke Profil</a>
            <a href="halaman3.php">Menuju Blog</a>
        </div>
    </div>
</body>
</html>
