<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "booksdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete functionality
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM books WHERE id=$id");
    header("Location: view.php");
    exit();
}

// Update functionality
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $bestseller = isset($_POST['bestseller']) ? 1 : 0;

    $conn->query("UPDATE books SET title='$title', author='$author', genre='$genre', bestseller='$bestseller' WHERE id=$id");
    header("Location: view.php");
    exit();
}

$result = $conn->query("SELECT * FROM books");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center mb-4">📖 Book List</h2>
    <table class="table table-bordered table-hover shadow">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Best Seller</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <form method="POST" action="">
                    <td><?= $row['id'] ?></td>
                    <td><input type="text" name="title" value="<?= $row['title'] ?>" class="form-control"></td>
                    <td><input type="text" name="author" value="<?= $row['author'] ?>" class="form-control"></td>
                    <td>
                        <select name="genre" class="form-select">
                            <option <?= $row['genre'] == 'Fiction' ? 'selected' : '' ?>>Fiction</option>
                            <option <?= $row['genre'] == 'Non-fiction' ? 'selected' : '' ?>>Non-fiction</option>
                            <option <?= $row['genre'] == 'Sci-Fi' ? 'selected' : '' ?>>Sci-Fi</option>
                            <option <?= $row['genre'] == 'Biography' ? 'selected' : '' ?>>Biography</option>
                        </select>
                    </td>
                    <td>
                        <input type="checkbox" name="bestseller" <?= $row['bestseller'] ? 'checked' : '' ?>>
                    </td>
                    <td>
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <button type="submit" name="update" class="btn btn-success btn-sm">Update ✏️</button>
                        <a href="view.php?delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete 🗑️</a>
                    </td>
                </form>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>
