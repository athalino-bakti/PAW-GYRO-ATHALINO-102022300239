<?php
include 'connect.php';

// (1.) Cek Apakah ada data yang dikirim
$search = isset($_GET['search']) ? $_GET['search'] : '';

    // (2.) Validasi Input jika search input kurang dari 3 karakter
    // Hint : Gunakan strlen()
if ($search)  {
    var_dump('jkjkj');
    if (strlen($search) < 3) {
        echo "<script>alert('Input minimal 3 karakter');</script>";
        // header("location: katalog_buku.php");
    }
    // (3.) Validasi Input jika search input tidak alphanumeric
    // Hint : Gunakan preg_match()
    elseif (preg_match('/[^a-zA-Z0-9]/', $search)) {
        echo "<script>alert('Input hanya boleh huruf dan angka');</script>";
        // header("location: katalog_buku.php");
    }
}
// (4.) Buat query untuk menampilkan data (Hint : gunakan query SELECT)
$query = "SELECT * FROM tb_buku WHERE judul LIKE '%$search%' OR judul LIKE '%$search%' OR tahun_terbit LIKE '%$search%'";

// (5.) Jalankan query (Hint : gunakan mysqli_query())
$data= mysqli_query($conn, $query);

// (6.) Tampung hasil query ke dalam array (Hint : gunakan mysqli_fetch_assoc())
$bukus = [];
while ($buku = mysqli_fetch_assoc($data)) {
    $bukus[] = $buku;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container mt-5">
        <h1>Katalog Buku</h1>
        <!-- (7.) Tambahkan Method  GET -->
        <form action="katalog_buku.php" class="form-inline" method="GET">
            <!-- (8.)Tambahkan Value $search -->
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search" value="<?= $search ?>">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Penulis</th>
                  <th>Tahun</th>
                  <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($bukus) == 0) : ?>
                    <tr>
                        <th colspan="5" class="text-center">TIDAK ADA DATA DALAM KATALOG</th>
                    </tr>
                <?php endif;?>
                <?php foreach ($bukus as $buku) : ?>
                    <tr>
                        <td><?= $buku['id']?></td>
                        <td><?= $buku['judul']?></td>
                        <td><?= $buku['penulis']?></td>
                        <td><?= $buku['tahun_terbit']?></td>
                        <td>
                            <a href="edit_buku.php?id=<?=$buku['id']?>" class="btn btn-primary">Edit</a>
                            <a href="delete.php?id=<?=$buku['id']?>" class="btn btn-danger" >Delete</a>
                        </td>
                    </tr>
                <?php endforeach?>
            </tbody>
        </table>
    </div>
</body>
</html>
