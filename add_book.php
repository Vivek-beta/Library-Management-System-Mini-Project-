<?php
// Assuming you have a database connection established
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lmsnew";

// Create a new PDO instance
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $title = $_POST['title'];
    $author = $_POST['author'];
    $quantity = $_POST['quantity'];

    // Validate the form data (you can add more validation if needed)
    if (!empty($title) && !empty($author) && !empty($quantity)) {
        // Validate quantity as a positive integer
        if ($quantity > 0) {
            try {
                // Prepare the SQL statement to insert the book into the database
                $stmt = $conn->prepare("INSERT INTO books (title, author, quantity) VALUES (:title, :author, :quantity)");
                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':author', $author);
                $stmt->bindParam(':quantity', $quantity);

                // Execute the statement
                $stmt->execute();

                // Set the success message
                $message = 'Book added successfully.';
            } catch (PDOException $e) {
                // Handle the database error
                $message = 'Error adding the book: ' . $e->getMessage();
            }
        } else {
            $message = 'Quantity must be a positive value.';
        }
    } else {
        // Handle the case when the form data is incomplete
        $message = 'Please enter all the required information.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: transparent;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            color: white;
        }

        .form-group input[type="text"],
        .form-group input[type="number"] {
            width: 100%;
            padding: 5px;
            font-size: 16px;
            background-color: rgba(255,255,255,80%);
            color: black;
            border: 2px solid cyan;
            border-radius: 30px;
        }

        

        .form-group input[type="submit"] {
            background-color: rgba(1, 1, 29, 0.3);
            color: white;
            padding: 10px 20px;
            border: 2px solid cyan;
            cursor: pointer;
            border-radius: 30px;
        }

        .form-group input[type="submit"]:hover {
            background-color: rgba(192, 192, 192,0.3);
            border-color: cyan;
        }

        .message {
            margin-top: 20px;
            padding: 10px;
            background-color: #f2f2f2;
            border: 1px solid #ccc;
        }

        .back-button {
            margin-top: 20px;
        }

        .back-button button {
            background-color: rgba(1, 1, 29, 0.3);
            color: white;
            padding: 10px 20px;
            border: 2px solid cyan;
            cursor: pointer;
            border-radius: 30px;
        }

        .back-button button:hover {
            background-color: rgba(192, 192, 192,0.3);
            border-color: cyan;
        }

        @media only screen and (max-width: 600px) {
            .container {
                max-width: 400px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
<video id="video-background" autoplay muted loop>
    <source src="video/bookadd.mp4" type="video/mp4">
</video>
<div class="container">
    <h1 class="text-center" style="color: white;">Add Book</h1>
    <?php
    // Display the message if it's set
    if (isset($message)) {
        echo '<div class="message">' . $message . '</div>';
    }
    ?>
    <form method="post" action="add_book.php">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" placeholder="Enter title" required class="form-control">
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" id="author" name="author" placeholder="Enter author" required class="form-control">
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" id="quantity" name="quantity" placeholder="Enter quantity" required class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" value="Add Book" class="btn btn-primary">
        </div>
    </form>
    <div class="back-button text-center">
        <button onclick="location.href='admin.php'" class="btn btn-secondary">Back to Admin Page</button>
    </div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


