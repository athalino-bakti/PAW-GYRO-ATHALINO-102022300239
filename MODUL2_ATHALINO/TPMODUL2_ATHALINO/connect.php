<?php
// ==================1==================
// Definisikan variabel2 yang akan digunakan untuk melakukan koneksi ke database
$host = "localhost";
$user = "root"; 
$password = ""; 
$dbname = "db_perpustakaan";
$port = '3308';

// ==================2==================
// Definisikan $conn untuk melakukan koneksi ke database
$conn = mysqli_connect($host, $user, $password, $dbname, $port); 

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>