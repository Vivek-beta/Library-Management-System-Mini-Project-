<!DOCTYPE html>
<html>
<head>
    <title>Edit Member</title>
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

        .edit-form {
            max-width: 500px;
            margin: 0 auto;
            background-color: transparent;
            padding: 20px;
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
            color: white;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group button {
            background-color: black;
            color: white;
            padding: 10px 20px;
            border: 2px solid #4CAF50;
            border-radius: 30px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #222222;
            border-color: #45a049;
            color: white;
        }

        .text-center .btn {
            background-color: black;
            color: white;
            padding: 10px 20px;
            border: 2px solid #4CAF50;
            border-radius: 30px;
            cursor: pointer;
        }

        .text-center .btn:hover {
            background-color: #222222;
            border-color: #45a049;
            color: white;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<video id="video-background" autoplay muted loop>
    <source src="video/details.mp4" type="video/mp4">
</video>
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
            <h2 class="text-center" style="color: white;">Edit Member Details</h2>
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
