<?php
session_start();
include 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

$sql = mysqli_query($conn, "SELECT * FROM karyawan_absensi");
?>
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Karyawan</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  </head>
  <body class="bg-sky-100 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 py-10">
      <h1 class="text-3xl font-bold text-center text-gray-800 mb-8"> Data Karyawan</h1>

      <div class="flex justify-end mb-4">
        <a href="tambah.php" class="bg-emerald-600 hover:bg-teal-400 text-white px-4 py-2 rounded shadow">
          + Tambah Karyawan
        </a>
      </div>

      <div class="bg-white shadow-md rounded overflow-hidden">
        <table class="min-w-full table-auto">
          <thead class="bg-teal-600 text-white uppercase text-sm leading-normal">
            <tr>
              <th class="py-3 px-6 text-center">Nip</th>
              <th class="py-3 px-6 text-center">Nama</th>
              <th class="py-3 px-6 text-center">Umur</th>
              <th class="py-3 px-6 text-center">Jenis Kelamin</th>
              <th class="py-3 px-6 text-center">Departemen</th>
              <th class="py-3 px-6 text-center">Jabatan</th>
              <th class="py-3 px-6 text-center">Kota Asal</th>
              <th class="py-3 px-6 text-center">Aksi</th>
            </tr>
          </thead>
          <tbody class="text-gray-700 text-sm font-light">
            <?php while ($data = mysqli_fetch_assoc($sql)) { ?>
              <tr class="border-b hover:bg-gray-100">
                <td class="py-3 px-6 text-center"><?= $data['nip'] ?></td>
                <td class="py-3 px-6 text-center"><?= $data['nama'] ?></td>
                <td class="py-3 px-6 text-center"><?= $data['umur'] ?></td>
                <td class="py-3 px-6 text-center"><?= $data['jenis_kelamin'] ?></td>
                <td class="py-3 px-6 text-center"><?= $data['departemen'] ?></td>
                <td class="py-3 px-6 text-center"><?= $data['jabatan'] ?></td>
                <td class="py-3 px-6 text-center"><?= $data['kota_asal'] ?></td>
                <td class="py-3 px-6 text-center">
                  <div class="flex item-center justify-center space-x-2">
                    <a href="edit.php?nip=<?= $data['nip'] ?>" class="text-blue-500 hover:underline">Edit</a>
                    <a href="hapus.php?nip=<?= $data['nip'] ?>" class="text-red-500 hover:underline" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                  </div>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

      <div class="flex justify-start mt-4">
        <a href="absensi.php" class="bg-emerald-600 hover:bg-teal-400 text-white px-4 py-2 rounded shadow">
          Absensi Karyawan
        </a>
      </div>

      <div class="flex justify-end mt-4">
        <a href="logout.php" class="text-white bg-emerald-600 hover:bg-teal-400 px-4 py-2 rounded text-sm">
          Logout
        </a>
      </div>
    </div>
  </body>
</html>