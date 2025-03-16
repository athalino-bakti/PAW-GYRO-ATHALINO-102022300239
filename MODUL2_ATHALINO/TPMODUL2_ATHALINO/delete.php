<?php
include 'connect.php';

// ==================1==================
// If statement untuk mengambil GET request dari URL kemudian simpan variabel id
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // ==================2==================
    // Definisikan $query untuk menghapus data menggunakan $id
    $query = "DELETE FROM tb_buku WHERE id = '$id'";


    // ==================3==================
    // Eksekusi query
    $result = mysqli_query($conn, $query);

    // Cek apakah query berhasil dieksekusi
    if ($result && mysqli_affected_rows($conn) > 0) {
        echo "<script>alert('Data berhasil dihapus'); window.location='katalog_buku.php';</script>";
        exit();
    } else {
        echo "<script>alert('Data gagal dihapus atau tidak ditemukan'); window.location='katalog_buku.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location='katalog_buku.php';</script>";
    exit();
}
?>
