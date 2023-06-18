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
    if (isset($_GET['message'])) {
        $message = $_GET['message'];
        echo '<div class="message">' . $message . '</div>';
    }
    ?>
    <form method="post" action="add_book.php">
        <div class="form-group">
            <label for="title" style="color: white;">Title</label>
            <input type="text" id="title" name="title" placeholder="Enter title" required class="form-control">
        </div>
        <div class="form-group">
            <label for="author" style="color: white;">Author</label>
            <input type="text" id="author" name="author" placeholder="Enter author" required class="form-control">
        </div>
        <div class="form-group">
            <label for="quantity" style="color: white;">Quantity</label>
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
