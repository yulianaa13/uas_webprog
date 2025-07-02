
<?php
include __DIR__ . '/konfig.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun_terbit'];
    $kategori = $_POST['kategori'];
    mysqli_query($conn, "INSERT INTO buku (id, title, author, publisher, genre)
                         VALUES ('$judul', '$penulis', '$penerbit', '$tahun', '$kategori')");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Tambah Buku</title></head>
<body class="container">
<h2>Tambah Buku</h2>
<form method="POST">
    <input name="judul" placeholder="id" required class="form-control mb-2">
    <input name="penulis" placeholder="title" required class="form-control mb-2">
    <input name="penerbit" placeholder="author" required class="form-control mb-2">
    <input type="number" name="publisher" placeholder="Tahun Terbit" required class="form-control mb-2">
    <input name="kategori" placeholder="genre" required class="form-control mb-2">
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
</body>
</html>
