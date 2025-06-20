<?php
include 'config.php';
if (!isset($_GET['nip'])) {
  header('Location:data_karyawan.php');
  exit();
}

$nip = $_GET['nip'];
$result = mysqli_query($conn, "SELECT * FROM karyawan_absensi WHERE NIP = '$nip'");
$data = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = $_POST["Nama"];
  $umur = $_POST["Umur"];
  $jenis_kelamin = $_POST["Jenis_kelamin"];
  $departemen = $_POST["Departemen"];
  $jabatan = $_POST["Jabatan"];
  $kota_asal = $_POST["Kota_asal"];
  $tanggal_absensi = $_POST["Tanggal_absensi"];
  $jam_masuk = $_POST["Jam_masuk"];
  $jam_pulang = $_POST["Jam_pulang"];

  mysqli_query($conn, "UPDATE karyawan_absensi SET 
    Nama = '$nama',
    Umur = $umur,
    Jenis_kelamin = '$jenis_kelamin',
    Departemen = '$departemen',
    Jabatan = '$jabatan',
    Kota_asal = '$kota_asal',
    Tanggal_absensi = '$tanggal_absensi',
    Jam_masuk = '$jam_masuk',
    Jam_pulang = '$jam_pulang'
    WHERE NIP = '$nip'");

  header('Location: data_karyawan.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Karyawan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-sky-100 min-h-screen flex items-center justify-center">
  <form method="POST" class="bg-white p-8 rounded-lg shadow-md w-full max-w-2xl space-y-5">
    <h2 class="text-2xl font-bold text-center text-teal-500">Edit Data Karyawan</h2>

    <div class="grid grid-cols-2 gap-4">
      <div>
        <label>Nama</label>
        <input type="text" name="Nama" value="<?= $data['nama'] ?>" class="w-full p-2 border rounded" required>
      </div>
      <div>
        <label>Umur</label>
        <input type="number" name="Umur" value="<?= $data['umur'] ?>" class="w-full p-2 border rounded" required>
      </div>
      <div>
        <label>Jenis Kelamin</label>
        <select name="Jenis_kelamin" class="w-full p-2 border rounded" required>
          <option value="Laki-laki" <?= $data['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
          <option value="Perempuan" <?= $data['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
        </select>
      </div>
      <div>
        <label>Departemen</label>
        <input type="text" name="Departemen" value="<?= $data['departemen'] ?>" class="w-full p-2 border rounded" required>
      </div>
      <div>
        <label>Jabatan</label>
        <input type="text" name="Jabatan" value="<?= $data['jabatan'] ?>" class="w-full p-2 border rounded" required>
      </div>
      <div>
        <label>Kota Asal</label>
        <input type="text" name="Kota_asal" value="<?= $data['kota_asal'] ?>" class="w-full p-2 border rounded" required>
      </div>
      <div>
        <label>Tanggal Absensi</label>
        <input type="date" name="Tanggal_absensi" value="<?= $data['tanggal_absensi'] ?>" class="w-full p-2 border rounded" required>
      </div>
      <div>
        <label>Jam Masuk</label>
        <input type="time" name="Jam_masuk" value="<?= $data['jam_masuk'] ?>" class="w-full p-2 border rounded" required>
      </div>
      <div>
        <label>Jam Pulang</label>
        <input type="time" name="Jam_pulang" value="<?= $data['jam_pulang'] ?>" class="w-full p-2 border rounded" required>
      </div>
    </div>

    <div class="col-span-2 flex justify-between mt-4">
        <a href="data_karyawan.php" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Batal</a>
        <button type="submit" name="tambah" class="bg-emerald-600 text-white px-6 py-2 rounded hover:bg-teal-400">Simpan</button>
      </div>
  </form>
</body>
</html>