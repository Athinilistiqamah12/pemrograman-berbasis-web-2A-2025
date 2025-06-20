<?php
session_start();
include 'config.php';
if (!isset($_SESSION['username'])) {
  header("Location: index.php");
exit;
}
$success = "";
$error = "";

if (isset($_POST["tambah"])) {
  $nip = $_POST["NIP"];
  $nama = $_POST["Nama"];
  $umur = $_POST["Umur"];
  $jenis_kelamin = $_POST["Jenis_kelamin"];
  $departemen = $_POST["Departemen"];
  $jabatan = $_POST["Jabatan"];
  $kota_asal = $_POST["Kota_asal"];
  $tanggal_absensi = $_POST["Tanggal_absensi"];
  $jam_masuk = $_POST["Jam_masuk"];
  $jam_pulang = $_POST["Jam_pulang"];

  $query = "INSERT INTO karyawan_absensi 
(NIP, Nama, Umur, Jenis_kelamin, Departemen, Jabatan, Kota_asal, Tanggal_absensi, Jam_masuk, Jam_pulang) 
VALUES ('$nip', '$nama', '$umur', '$jenis_kelamin', '$departemen', '$jabatan', '$kota_asal', '$tanggal_absensi', '$jam_masuk', '$jam_pulang')";

  if (mysqli_query($conn, $query)) {
    header("Location: data_karyawan.php");
    exit();
  } else {
    $error = "Gagal menambahkan data!";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Karyawan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-sky-100 min-h-screen flex items-center justify-center">

  <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-2xl">
    <h2 class="text-2xl font-bold mb-6 text-teal-400 text-center">Tambah Karyawan Baru</h2>

    <?php if ($error): ?>
      <div class="bg-red-100 text-red-700 p-2 mb-4 rounded text-center font-semibold"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <input type="text" name="NIP" placeholder="NIP" class="input" required />
      <input type="text" name="Nama" placeholder="Nama" class="input" required />
      <input type="number" name="Umur" placeholder="Umur" class="input" required />
      <select name="Jenis_kelamin" class="input" required>
        <option value="">Pilih Jenis Kelamin</option>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
      </select>
      <input type="text" name="Departemen" placeholder="Departemen" class="input" required />
      <input type="text" name="Jabatan" placeholder="Jabatan" class="input" required />
      <input type="text" name="Kota_asal" placeholder="Kota Asal" class="input" required />
      <input type="date" name="Tanggal_absensi" class="input" required />
      <input type="time" name="Jam_masuk" class="input" required />
      <input type="time" name="Jam_pulang" class="input" required />

      <div class="col-span-2 flex justify-between mt-4">
        <a href="data_karyawan.php" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Batal</a>
        <button type="submit" name="tambah" class="bg-emerald-600 text-white px-6 py-2 rounded hover:bg-teal-400">Simpan</button>
      </div>
    </form>
  </div>

  <style>
    .input {
      padding: 0.5rem 1rem;
      border-radius: 0.5rem;
      border: 1px solid #ccc;
      width: 100%;
      outline: none;
    }
    .input:focus {
      border-color: #3b82f6;
      box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.3);
    }
  </style>

</body>
</html>