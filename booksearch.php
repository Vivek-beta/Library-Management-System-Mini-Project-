<!DOCTYPE html>
<html>
<head>
    <title>Book Database</title>
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

        .book-list {
            list-style: none;
            padding: 0;
        }

        .book-list li {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 10px;
        }

        .book-list li .title {
            font-weight: bold;
            font-size: 20px;
        }

        .book-list li .author {
            font-style: italic;
            color: #666;
        }

        @media only screen and (max-width: 600px) {
            .container {
                max-width: 400px;
                padding: 10px;
            }
        }

        .search-container {
            margin-bottom: 20px;
        }

        .search-container input[type="text"] {
            width: 200px;
            padding: 5px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Book Database</h1>
        <div class="search-container">
            <form method="get">
                <input type="text" name="search" placeholder="Search book or Author">
                <input type="submit" value="Search">
            </form>
        </div>
        <ul class="book-list">
            <?php
            // Connect to your database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "lms";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Handle search input
            $search = isset($_GET['search']) ? $_GET['search'] : '';

            $sql = "SELECT * FROM books";
            if (!empty($search)) {
                $sql .= " WHERE title LIKE '%$search%' OR author LIKE '%$search%'";
            }

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<li>';
                    echo '<div class="title">' . $row["title"] . '</div>';
                    echo '<div class="author">' . $row["author"] . '</div>';
                    echo '<div class="quantity">Quantity: ' . $row["quantity"] . '</div>';
                    echo '</li>';
                }
            } else {
                echo '<li>No books available</li>';
            }

            $conn->close();
            ?>
        </ul>
    </div>
</body>
</html>