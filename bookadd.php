<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('image/book.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group input[type="number"] {
            width: 100%;
            padding: 5px;
            font-size: 16px;
        }

        .form-group input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background-color: #45a049;
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
            background-color: #008CBA;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        .back-button button:hover {
            background-color: #0073a8;
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
    <div class="container">
        <h1 class="text-center">Add Book</h1>
        <?php
        if (isset($_GET['message'])) {
            $message = $_GET['message'];
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
