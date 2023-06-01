<!DOCTYPE html>
<html>
<head>
    <title>Edit Books</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('image/book.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Edit Books</h1>
        <?php
        // Database connection code
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "lms";

        // Create a new connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Update book details if form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bookId = $_POST['bookId'];
            $title = $_POST['title'];
            $author = $_POST['author'];
            $quantity = $_POST['quantity'];

            $sql = "UPDATE books SET title = '$title', author = '$author', quantity = '$quantity' WHERE id = '$bookId'";

            if ($conn->query($sql) === TRUE) {
                echo '<div class="alert alert-success">Book details updated successfully.</div>';
            } else {
                echo '<div class="alert alert-danger">Error updating book details: ' . $conn->error . '</div>';
            }
        }

        // Fetch book details for editing
        $bookId = isset($_GET['id']) ? $_GET['id'] : null;

        if ($bookId !== null) {
            $sql = "SELECT * FROM books WHERE id = '$bookId'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                ?>
                <form method="post">
                    <input type="hidden" name="bookId" value="<?php echo $row['id']; ?>">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" value="<?php echo $row['title']; ?>" required class="form-control">
                        <button type="submit" name="updateTitle" class="btn btn-primary mt-2">Update Title</button>
                    </div>
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" id="author" name="author" value="<?php echo $row['author']; ?>" required class="form-control">
                        <button type="submit" name="updateAuthor" class="btn btn-primary mt-2">Update Author</button>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" id="quantity" name="quantity" value="<?php echo $row['quantity']; ?>" required class="form-control">
                        <button type="submit" name="updateQuantity" class="btn btn-primary mt-2">Update Quantity</button>
                    </div>
                </form>
                <?php
            } else {
                echo '<div class="alert alert-info">Book not found.</div>';
            }
        } else {
            echo '<div class="alert alert-danger">Invalid book ID.</div>';
        }

        // Close the database connection
        $conn->close();
        ?>
        <div class="text-center">
            <a href="view_books.php" class="btn btn-primary mt-2">Return to View Page</a>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
