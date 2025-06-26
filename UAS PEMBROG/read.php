include __DIR__ . '/config.php';

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Daftar Buku</h2>
    <a href="create.php" class="btn btn-success mb-3">Tambah Buku</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th><th>Judul</th><th>Penulis</th><th>Penerbit</th><th>Tahun</th><th>Genre</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody><?php
        if (!isset($conn)) {
            die("Koneksi database tidak tersedia.");
        }
        
        $result = $conn->query("SELECT * FROM books");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['title']}</td>
                <td>{$row['author']}</td>
                <td>{$row['publisher']}</td>
                <td>{$row['year_published']}</td>
                <td>{$row['genre']}</td>
                <td>
                    <a href='update.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                    <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin hapus?\")'>Hapus</a>
                </td>
            </tr>";
        }
        ?>
        </tbody>
    </table>
</body>
</html>
