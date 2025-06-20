<?php
include 'config.php';

if (isset($_GET['id'])) {
    // Hapus absensi berdasarkan ID
    $id = intval($_GET['id']);
    mysqli_query($conn, "DELETE FROM karyawan_absensi WHERE id = $id");
    header("Location: absensi.php");
    exit();
}

if (isset($_GET['nip'])) {
    // Hapus semua absensi berdasarkan NIP
    $nip = mysqli_real_escape_string($conn, $_GET['nip']);
    $cek = mysqli_query($conn, "SELECT * FROM karyawan_absensi WHERE NIP = '$nip'");

    if (mysqli_num_rows($cek) > 0) {
        $hapus = mysqli_query($conn, "DELETE FROM karyawan_absensi WHERE NIP = '$nip'");
        if ($hapus) {
            echo "<script>alert('Data absensi berhasil dihapus!'); window.location='data_karyawan.php';</script>";
        } else {
            echo "<script>alert('Gagal menghapus data absensi.'); window.location='data_karyawan.php';</script>";
        }
    } else {
        echo "<script>alert('Data absensi tidak ditemukan.'); window.location='data_karyawan.php';</script>";
    }
} else {
    header("Location: data_karyawan.php");
    exit();
}
?>
