
<?php
session_start(); // Add this line to start the session

include_once('../dbconnection.php');

// member login verification
if (isset($_POST['checklogemail']) && isset($_POST['stulogemail']) && isset($_POST['stulogpass'])) {
    $stulogemail = $_POST['stulogemail'];
    $stulogpass = $_POST['stulogpass'];
    $sql = "SELECT stu_email, stu_pass FROM memberadd WHERE stu_email='$stulogemail' AND stu_pass='$stulogpass'";
    $result = $conn->query($sql);
    $row = $result->num_rows;

    if ($row == 1) {
        // Store the email in a session variable for later use
        $_SESSION['userEmail'] = $stulogemail;
        echo json_encode($row);
    } else if ($row == 0) {
        echo json_encode($row);
    }
}
?>
