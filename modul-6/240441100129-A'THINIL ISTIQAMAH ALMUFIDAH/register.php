<?php
session_start();
include 'config.php';

$success = "";
$error = "";
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  if (empty($username) || empty($password)) {
    $error = "Harap isi semua form!";
  } else {
    $check = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    if (mysqli_num_rows($check) > 0) {
      $error = "Username sudah digunakan, pilih yang lain.";
    } else {
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
      $insert = mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')");
      if ($insert) {
        $success = "Registrasi berhasil! Silakan login.";
        header("Refresh: 2; url=index.php");
      } else {
        $error = "Terjadi kesalahan saat menyimpan data.";
      }
    }
  }
}
?>

<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registrasi</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-sky-100 flex items-center justify-center min-h-screen">

  <div class="bg-teal-600 rounded-xl shadow-lg p-10 w-full max-w-md">
    <h1 class="text-center font-bold text-3xl text-white mb-6">Registrasi</h1>

    <?php if ($error): ?>
      <div class="bg-red-100 text-red-700 p-2 mb-4 rounded text-center font-semibold">
        <?= $error ?>
      </div>
    <?php elseif ($success): ?>
      <div class="bg-green-100 text-green-700 p-2 mb-4 rounded text-center font-semibold">
        <?= $success ?>
      </div>
    <?php endif; ?>

    <form method="POST" class="space-y-5">
      <div>
        <label class="text-white font-semibold block mb-1">Username</label>
        <input type="text" name="username" id="username" placeholder="Masukkan username"
          class="w-full px-4 py-2 rounded-xl bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-300 transition" />
      </div>

      <div>
        <label class="text-white font-semibold block mb-1">Password</label>
        <input type="password" name="password" id="password" placeholder="Masukkan password"
          class="w-full px-4 py-2 rounded-xl bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-300 transition" />
      </div>

      <div class="text-center">
        <button type="submit" class="bg-white text-blue-600 font-bold px-6 py-2 rounded-xl hover:bg-blue-200 transition">
          Registrasi
        </button>
      </div>
    </form>

    <p class="text-white text-center mt-4">
      Kembali ke halaman Login? 
      <a href="index.php" class="underline hover:text-blue-200 font-semibold">Klik di sini</a>
    </p>
  </div>

</body>
</html>