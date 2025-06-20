<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pribadi</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #d0f0c0;
        }

        header {
            background-color:rgb(130, 120, 84);
            padding: 20px 0;
            color: #fefefe;
            text-align: center;
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

        .container {
            width: 80%;
            margin: 20px auto;
            background: rgb(243, 239, 239);
            padding: 20px;
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <header>
        <h1>Profil Mahasiswa</h1>
    </header>

    <div class="navbar">
        <center>
        <a href="halaman1.php">Halaman</a>
        <a href="halaman2.php">Pengalaman</a>
        <a href="halaman3.php">Blog</a>
    </div>

    <div class="container">
        <h2>Profil Pribadi</h2>
        <table>
            <tr><th>Informasi</th><th>Detail</th></tr>
            <tr><td>Nama</td><td>A'thinil Istiqamah Almufidah</td></tr>
            <tr><td>Alamat</td><td>Jl. Veteran No. 145</td></tr>
            <tr><td>Tempat, Tanggal Lahir</td><td>Bangkalan, 12 Mei 2006</td></tr>
            <tr><td>Nomor HP</td><td>082334197255</td></tr>
            <tr><td>Email</td><td>athinilisti@gmail.com</td></tr>
        </table>

        <hr>
        <h2>Formulir Dinamis</h2>

        <form method="post">
            <div class="form-group">
                <label>Bahasa Pemrograman yang Dikuasai:</label>
                <input type="text" name="programming[]" placeholder="Contoh: PHP">
                <input type="text" name="programming[]" placeholder="Contoh: Python">
                <input type="text" name="programming[]" placeholder="Contoh: JavaScript">
            </div>

            <div class="form-group">
                <label>Penjelasan Proyek Pribadi:</label>
                <textarea name="pengalaman" rows="4" cols="50" required></textarea>
            </div>

            <div class="form-group">
                <label>Software yang Sering Digunakan:</label><br>
                <input type="checkbox" name="software[]" value="VS Code"> VS Code<br>
                <input type="checkbox" name="software[]" value="XAMPP"> XAMPP<br>
                <input type="checkbox" name="software[]" value="Git"> Git<br>
                <input type="checkbox" name="software[]" value="Figma"> Figma<br>
            </div>

            <div class="form-group">
                <label>Sistem Operasi yang Digunakan:</label><br>
                <input type="radio" name="os" value="Windows"> Windows<br>
                <input type="radio" name="os" value="Linux"> Linux<br>
                <input type="radio" name="os" value="Mac"> Mac<br>
            </div>

            <div class="form-group">
                <label>Tingkat Penguasaan PHP:</label>
                <select name="tingkat_php" required>
                    <option value="">--Pilih--</option>
                    <option value="Pemula">Pemula</option>
                    <option value="Menengah">Menengah</option>
                    <option value="Mahir">Mahir</option>
                </select>
            </div>

            <input type="submit" name="submit" value="Kirim">
        </form>
        <?php
function hasil_form($programming, $pengalaman, $software, $os, $tingkat_php) {
    $programming = array_filter($programming);

    if (count($programming) > 0 && !empty($pengalaman) && count($software) > 0 && !empty($os) && !empty($tingkat_php)) {
        echo "<h2>Hasil Input:</h2>";
        echo "<table>
                <tr><th>Kategori</th><th>Isi</th></tr>
                <tr><td>Bahasa Pemrograman</td><td>" . implode(", ", $programming) . "</td></tr>
                <tr><td>Pengalaman Proyek</td><td>" . ($pengalaman) . "</td></tr>
                <tr><td>Software</td><td>" . implode(", ", $software) . "</td></tr>
                <tr><td>Sistem Operasi</td><td>" . ($os) . "</td></tr>
                <tr><td>Tingkat PHP</td><td>" .($tingkat_php) . "</td></tr>
              </table>";

        echo "<p><strong>Deskripsi:</strong> Anda menggunakan sistem operasi <b>" . ($os) . "</b> dan terbiasa dengan software seperti <b>" . implode(", ", $software) . "</b>. Anda memiliki pengalaman proyek: <em>" . ($pengalaman) . "</em>.</p>";

        if (count($programming) > 2) {
            echo "<p><strong>Anda cukup berpengalaman dalam pemrograman!</strong></p>";
        }
    } else {
        echo "<p style='color:red;'><strong>Semua field wajib diisi!</strong></p>";
    }
}

if (isset($_POST['submit'])) {
    hasil_form(
        $_POST['programming'] ?? [],
        $_POST['pengalaman'] ?? '',
        $_POST['software'] ?? [],
        $_POST['os'] ?? '',
        $_POST['tingkat_php'] ?? ''
    );
}
?>

    </div>
</body>
</html>

