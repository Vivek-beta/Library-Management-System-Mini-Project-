<!DOCTYPE html>
<html>
<head>
    <title>Book Management</title>
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

        .options {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .option {
            margin: 0 10px;
        }

        .option a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .option a:hover {
            background-color: #45a049;
        }

        .search {
            margin-bottom: 20px;
        }

        .search input[type="text"] {
            width: 100%;
            padding: 5px;
            font-size: 16px;
        }

        .books-table {
            width: 100%;
            border-collapse: collapse;
        }

        .books-table th,
        .books-table td {
            padding: 10px;
            text-align: left;
        }

        .books-table th {
            background-color: #4CAF50;
            color: white;
        }

        .books-table tr:nth-child(even) {
            background-color: #f2f2f2;
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
        <h1>Book Management</h1>
        <div class="options">
            <div class="option">
                <a href="view_books.php">View Books</a>
            </div>
            <div class="option">
                <a href="edit_books.php">Edit Books</a>
            </div>
        </div>
    </div>
</body>
</html>
