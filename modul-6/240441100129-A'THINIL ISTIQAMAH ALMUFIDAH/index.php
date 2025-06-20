<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $user['username'];
        header("Location: data_karyawan.php");
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-sky-100 flex items-center justify-center min-h-screen">

  <div class="bg-teal-600 rounded-xl shadow-lg p-10 w-full max-w-md">
    <h1 class="text-center font-bold text-3xl text-white mb-6">Login</h1>

    <?php if (!empty($error)): ?>
      <div class="bg-red-100 text-red-700 p-2 mb-4 rounded text-center font-semibold">
        <?= $error ?>
      </div>
    <?php endif; ?>

    <form action="" method="POST" class="space-y-5">
      <div>
        <label class="text-white font-semibold block mb-1">Username</label>
        <input type="text" name="username" placeholder="Masukkan username"
          class="w-full px-4 py-2 rounded-xl bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-300 transition" />
      </div>

      <div>
        <label class="text-white font-semibold block mb-1">Password</label>
        <input type="password" name="password" placeholder="Masukkan password"
          class="w-full px-4 py-2 rounded-xl bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-300 transition" />
      </div>

      <div class="text-center">
        <button type="submit" class="bg-white text-blue-600 font-bold px-6 py-2 rounded-xl hover:bg-blue-200 transition">
          Masuk
        </button>
      </div>
    </form>

    <p class="text-white text-center mt-4">
      Belum punya akun?
      <a href="register.php" class="underline hover:text-blue-200 font-semibold">Registrasi dulu</a>
    </p>
  </div>
</body>
</html>