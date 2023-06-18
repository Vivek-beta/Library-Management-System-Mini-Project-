<!DOCTYPE html>
<html>
<head>
    <title>View Books</title>
    <style>
        #video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            object-fit: cover;
        }
        

        .search {
            margin-bottom: 20px;
        }

        .books-container {
            background-color: transparent;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            border: 1px solid white; /* Add border */
        }

        .books-table {
            width: 100%;
            border-collapse: collapse;
        }

        .books-table th {
            padding: 10px;
            text-align: left;
            color: white;
            border-bottom: 1px solid white;
            background-color: transparent;
            border-top: none;
        }

        .books-table td {
            padding: 10px;
            text-align: left;
            color: white;
            background-color: transparent;
            font-weight: bold; /* Add bold font weight */
        }

        .books-table tr {
            background-color: rgba(0,0,0, 0.5); /* Change opacity background to rgba */
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<video id="video-background" autoplay muted loop>
    <source src="video/bookview.mp4" type="video/mp4">
</video>
<div class="container">
    <h1 class="text-center" style="color: white; margin-top: 10px;">View Books</h1>
    <div class="search">
        <form method="get">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search Books" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-success">Search</button>
                </div>
            </div>
        </form>
    </div>
    <div class="books-container">
        <?php
        // Database connection code
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "lmsnew";

        // Create a new connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Search query
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $search = strtolower($search); // Convert search input to lowercase
        $sql = "SELECT * FROM books WHERE LOWER(title) LIKE '%$search%' OR LOWER(author) LIKE '%$search%'";

        // Execute the query
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display the books in a table
            echo '<table class="books-table">';
            echo '<tr><th>Title</th><th>Author</th><th>Quantity</th><th>Actions</th></tr>';

            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['title'] . '</td>';
                echo '<td>' . $row['author'] . '</td>';
                echo '<td>' . $row['quantity'] . '</td>';
                echo '<td>';
                echo '<a href="edit_books.php?id=' . $row['id'] . '" class="btn btn-dark">Update</a>';
                echo ' <a href="delete_book.php?id=' . $row['id'] . '" class="btn btn-danger" onclick="return confirmDelete()">Delete</a>';
                echo '</td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo '<div class="alert alert-info">No books found.</div>';
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
</div>
<div class="text-center">
    <a href="admin.php" class="btn btn-dark mt-2">Return to Admin Page</a>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function confirmDelete() {
        return confirm("Do you wish to delete this book?");
    }
</script>
</body>
</html>
