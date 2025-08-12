<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "booksdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $bestseller = isset($_POST['bestseller']) ? 1 : 0;

    $sql = "INSERT INTO books (title, author, genre, bestseller) VALUES ('$title', '$author', '$genre', '$bestseller')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success text-center'>Book Added Successfully!</div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card p-4 shadow">
        <h2 class="text-center mb-4">📚 Add a New Book</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Author</label>
                <input type="text" name="author" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Genre</label>
                <select name="genre" class="form-select" required>
                    <option value="Fiction">Fiction</option>
                    <option value="Non-fiction">Non-fiction</option>
                    <option value="Sci-Fi">Sci-Fi</option>
                    <option value="Biography">Biography</option>
                </select>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="bestseller" class="form-check-input">
                <label class="form-check-label">Best Seller?</label>
            </div>

            <button type="submit" class="btn btn-primary w-100">Submit 📤</button>
        </form>
    </div>
</div>

</body>
</html>
