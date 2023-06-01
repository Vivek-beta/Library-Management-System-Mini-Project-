<!DOCTYPE html>
<html>
<head>
    <title>View Members</title>
    <style>
        body {
            background-image: url('image/book.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            padding: 20px;
        }

        .search {
            margin-bottom: 20px;
        }

        .members-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .members-table th,
        .members-table td {
            padding: 10px;
            text-align: left;
        }

        .members-table th {
            background-color: #4CAF50;
            color: white;
        }

        .members-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">View Members</h1>
        <div class="search">
            <form method="get">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search Members" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
        </div>
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

        // Search query
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $sql = "SELECT * FROM memberadd WHERE stu_name LIKE '%$search%' OR stu_email LIKE '%$search%'";

        // Execute the query
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display the members in a table
            echo '<table class="members-table">';
            echo '<tr><th>Name</th><th>Email</th><th>Actions</th></tr>';

            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['stu_name'] . '</td>';
                echo '<td>' . $row['stu_email'] . '</td>';
                echo '<td>';
                echo '<a href="edit_members.php?id=' . $row['id'] . '" class="btn btn-primary">Update</a>';
                echo ' <a href="delete_member.php?id=' . $row['id'] . '" class="btn btn-danger" onclick="return confirmDelete()">Delete</a>';
                echo '</td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo '<div class="alert alert-info">No members found.</div>';
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
    <div class="text-center">
            <a href="admin.php" class="btn btn-primary mt-2">Return to Admin Page</a>
        </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function confirmDelete() {
            return confirm("Do you wish to delete this member?");
        }
    </script>
</body>
</html>
