<!DOCTYPE html>
<html>
<head>
    <title>Edit Member</title>
    <style>
        body {
            background-image: url('image/book.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            padding: 20px;
        }

        .edit-form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #45a049;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
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

    // Fetch member details for editing
    $memberId = isset($_GET['id']) ? $_GET['id'] : null;

    if ($memberId !== null) {
        $sql = "SELECT * FROM memberadd WHERE id = '$memberId'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Update member details if form is submitted
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'];
                $email = $_POST['email'];

                $updateSql = "UPDATE memberadd SET stu_name = '$name', stu_email = '$email' WHERE id = '$memberId'";

                if ($conn->query($updateSql) === TRUE) {
                    echo '<div class="alert alert-success">Member details updated successfully.</div>';
                } else {
                    echo '<div class="alert alert-danger">Error updating member details: ' . $conn->error . '</div>';
                }
            }
            ?>
            <div class="edit-form">
                <h2 class="text-center">Edit Member</h2>
                <form method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="<?php echo $row['stu_name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo $row['stu_email']; ?>" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
            <?php
        } else {
            echo '<div class="alert alert-info">Member not found.</div>';
        }
    } else {
        echo '<div class="alert alert-danger">Invalid member ID.</div>';
    }

    // Close the database connection
    $conn->close();
    ?>
    <div class="text-center">
        <a href="view_members.php" class="btn btn-primary mt-2">Return to View Page</a>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
