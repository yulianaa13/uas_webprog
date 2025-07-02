include __DIR__ . '/config.php';

<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container py-4">
    <h1>Daftar Buku</h1>
    <a href="tambah.php" class="btn btn-primary mb-3">Tambah Buku</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th><th>Penulis</th><th>Penerbit</th><th>Tahun</th><th>Kategori</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM buku");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>{$row['judul']}</td>
                <td>{$row['penulis']}</td>
                <td>{$row['penerbit']}</td>
                <td>{$row['tahun_terbit']}</td>
                <td>{$row['kategori']}</td>
                <td>
                    <a href='edit.php?id={$row['id_buku']}' class='btn btn-warning btn-sm'>Edit</a>
                    <a href='hapus.php?id={$row['id_buku']}' onclick='return confirm(\"Hapus data ini?\")' class='btn btn-danger btn-sm'>Hapus</a>
                </td>
            </tr>";
        }
        ?>
        </tbody>
    </table>
</body>
</html>

