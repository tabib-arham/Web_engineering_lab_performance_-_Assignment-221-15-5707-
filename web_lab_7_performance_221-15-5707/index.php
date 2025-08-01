<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Submission Form</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f2f5f9;
            margin: 0;
            padding: 0;
        }

        .form-container {
            width: 450px;
            margin: 50px auto;
            padding: 30px;
            background: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #444;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            margin-top: 20px;
            padding: 10px 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

    </style>
</head>
<body>
<?php include 'connection.php'; 
if (isset($_POST['submit'])) {
    $author = $_POST['author'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $sql = "INSERT INTO books (author, title, description) VALUES ('$author', '$title', '$description')";
    $result= mysqli_query($connection, $sql);
    if ($result) {
        echo "<p style='color: green; text-align: center;'>Book submitted successfully!</p>";
    } else {
        echo "<p style='color: red; text-align: center;'>Error submitting book: " . mysqli_error($connection) . "</p>";
    }
}
?>
<div class="form-container">
    <h2>Submit Your Book</h2>
    <form action="index.php" method="post">
        <label for="author">Author Name:</label>
        <input type="text" id="author" name="author" required>

        <label for="title">Book Title:</label>
        <input type="text" id="title" name="title" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>

        <input type="submit" value="Submit" name="submit">
    </form>
</div>

</body>
</html>
