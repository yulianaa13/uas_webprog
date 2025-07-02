<?php include 'config.php';
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM books WHERE id=$id")->fetch_assoc();

if (isset($_POST['update'])) {
    $stmt = $conn->prepare("UPDATE books SET title=?, author=?, publisher=?, year_published=?, genre=? WHERE id=?");
    $stmt->bind_param("sssdsi", $_POST['title'], $_POST['author'], $_POST['publisher'], $_POST['year_published'], $_POST['genre'], $id);
    $stmt->execute();
    header("Location: read.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Edit Buku</h2>
    <form method="POST">
        <input type="text" name="title" class="form-control mb-2" value="<?= $data['title'] ?>" required>
        <input type="text" name="author" class="form-control mb-2" value="<?= $data['author'] ?>" required>
        <input type="text" name="publisher" class="form-control mb-2" value="<?= $data['publisher'] ?>" required>
        <input type="number" name="year_published" class="form-control mb-2" value="<?= $data['year_published'] ?>" required>
        <input type="text" name="genre" class="form-control mb-2" value="<?= $data['genre'] ?>" required>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="read.php" class="btn btn-secondary">Batal</a>
    </form>
</body>
</html>
