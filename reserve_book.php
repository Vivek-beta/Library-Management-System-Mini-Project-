<!DOCTYPE html>
<html>
<head>
    <title>Book Reservation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('image/book.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
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

        // Check if the book ID is set in the URL parameter
        if (isset($_GET['id'])) {
            $bookId = $_GET['id'];

            // Check if the book is available to reserve
            $sqlCheckAvailability = "SELECT * FROM books WHERE id = '$bookId' AND quantity > 0";
            $resultCheckAvailability = $conn->query($sqlCheckAvailability);
            if ($resultCheckAvailability->num_rows > 0) {
                // Get the book details
                $sqlGetBookDetails = "SELECT title, author FROM books WHERE id = '$bookId'";
                $resultGetBookDetails = $conn->query($sqlGetBookDetails);
                if ($resultGetBookDetails->num_rows > 0) {
                    $row = $resultGetBookDetails->fetch_assoc();
                    $title = $row['title'];
                    $author = $row['author'];

                    // Insert the reservation details into the bookreserve table
                    $currentDate = date('Y-m-d');
                    $sqlInsert = "INSERT INTO bookreserve (title, author, reserved_date) VALUES ('$title', '$author', '$currentDate')";
                    if ($conn->query($sqlInsert) === TRUE) {
                        // Increment the quantity in the books table
                        $sqlUpdate = "UPDATE books SET quantity = quantity - 1 WHERE id = '$bookId'";
                        if ($conn->query($sqlUpdate) === TRUE) {
                            echo '<div class="alert alert-success">Book reserved successfully.</div>';
                        } else {
                            echo '<div class="alert alert-danger">Error updating book quantity: ' . $conn->error . '</div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger">Error reserving book: ' . $conn->error . '</div>';
                    }
                } else {
                    echo '<div class="alert alert-danger">Error retrieving book details: ' . $conn->error . '</div>';
                }
            } else {
                echo '<div class="alert alert-info">Book not available to reserve.</div>';
            }
        } else {
            echo '<div class="alert alert-danger">Invalid book ID.</div>';
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
    <div class="text-center">
        <a href="browse.php" class="btn btn-primary mt-2">Browse Books</a>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
