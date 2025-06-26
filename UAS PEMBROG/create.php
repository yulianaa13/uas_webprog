include __DIR__ . '/config.php'; // ✅ Ini aman karena mencari di folder yang sama

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Tambah Buku</h2>
    <form method="POST" class="mb-3">
        <input type="text" name="title" class="form-control mb-2" placeholder="Judul" required>
        <input type="text" name="author" class="form-control mb-2" placeholder="Penulis" required>
        <input type="text" name="publisher" class="form-control mb-2" placeholder="Penerbit" required>
        <input type="number" name="year_published" class="form-control mb-2" placeholder="Tahun Terbit" required>
        <input type="text" name="genre" class="form-control mb-2" placeholder="Genre" required>
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </form>
    <a href="read.php" class="btn btn-secondary">Kembali</a>

<?php
if (isset($_POST['submit'])) {
    if (!isset($conn)) {
        die("Koneksi tidak tersedia.");
    }
    
    $stmt = $conn->prepare("INSERT INTO books (title, author, publisher, year_published, genre) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssds", $_POST['title'], $_POST['author'], $_POST['publisher'], $_POST['year_published'], $_POST['genre']);
    $stmt->execute();
    echo "<div class='alert alert-success mt-3'>Buku berhasil ditambahkan!</div>";
}
?>
</body>
</html>
