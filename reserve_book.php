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
        $dbname = "lmsnew";

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
            $sqlCheckAvailability = "SELECT * FROM books WHERE id = ? AND quantity > 0";
            $stmtCheckAvailability = $conn->prepare($sqlCheckAvailability);
            $stmtCheckAvailability->bind_param("i", $bookId);
            $stmtCheckAvailability->execute();
            $resultCheckAvailability = $stmtCheckAvailability->get_result();
            if ($resultCheckAvailability->num_rows > 0) {
                // Get the book details
                $sqlGetBookDetails = "SELECT title, author FROM books WHERE id = ?";
                $stmtGetBookDetails = $conn->prepare($sqlGetBookDetails);
                $stmtGetBookDetails->bind_param("i", $bookId);
                $stmtGetBookDetails->execute();
                $resultGetBookDetails = $stmtGetBookDetails->get_result();
                if ($resultGetBookDetails->num_rows > 0) {
                    $row = $resultGetBookDetails->fetch_assoc();
                    $title = $row['title'];
                    $author = $row['author'];

                    // Get the user's email from the session
                    session_start();
                    $userEmail = $_SESSION['userEmail'];

                    // Insert the reservation details into the bookreserve table
                    $sqlInsert = "INSERT INTO bookreserve (title, author, stu_email) VALUES (?, ?, ?)";
                    $stmtInsert = $conn->prepare($sqlInsert);
                    $stmtInsert->bind_param("sss", $title, $author, $userEmail);
                    if ($stmtInsert->execute()) {
                        // Increment the quantity in the books table
                        $sqlUpdate = "UPDATE books SET quantity = quantity - 1 WHERE id = ?";
                        $stmtUpdate = $conn->prepare($sqlUpdate);
                        $stmtUpdate->bind_param("i", $bookId);
                        if ($stmtUpdate->execute()) {
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
