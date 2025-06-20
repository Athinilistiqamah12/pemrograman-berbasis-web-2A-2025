<!doctype html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Karyawan</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  </head>
  <body class="bg-sky-100 min-h-screen">
    <div class="max-w-5xl mx-auto px-4 py-10">
      <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Absensi Karyawan</h1>
      <div class="bg-white shadow-md rounded overflow-hidden">
        <table class="min-w-full table-auto">
          <thead class="bg-teal-600 text-white uppercase text-sm leading-normal">
            <tr>
              <th class="py-3 px-6 text-center align-middle">Nama</th>
              <th class="py-3 px-6 text-center align-middle">Tanggal Absensi</th>
              <th class="py-3 px-6 text-center align-middle">Jam Masuk</th>
              <th class="py-3 px-6 text-center align-middle">Jam Pulang</th>
              <th class="py-3 px-6 text-center align-middle">Aksi</th>
            </tr>
          </thead>
          <tbody class="text-gray-700 text-sm font-light">
            <?php
            session_start();
            include 'config.php';
            if (!isset($_SESSION['username'])) {
                header("Location: index.php");
            exit;
            }
            $sql = mysqli_query($conn, "SELECT * FROM karyawan_absensi");
            while ($data = mysqli_fetch_assoc($sql)) {
            ?>
            <tr class="border-b hover:bg-blue-100">
              <td class="py-3 px-6 text-center"><?= $data['nama']?></td>
              <td class="py-3 px-6 text-center"><?= $data['tanggal_absensi']?></td>
              <td class="py-3 px-6 text-center"><?= $data['jam_masuk']?></td>
              <td class="py-3 px-6 text-center"><?= $data['jam_pulang']?></td>
              <td class="py-3 px-6 text-center">
                <a href="hapus.php?nip=<?= $data['nip'] ?>
                "onclick="return confirm('Yakin ingin menghapus seluruh absensi karyawan ini?')"
                class="btn-hapus text-red-500 hover:underline">Hapus Absensi</a>

              </td>
            </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
      <div class="flex justify-start mt-4">
        <a href="data_karyawan.php" class="bg-emerald-600 hover:bg-teal-4s00 text-white px-4 py-2 rounded-xl shadow">
            Kembali
        </a>
    </div>
    </div>
  </body>
</html>