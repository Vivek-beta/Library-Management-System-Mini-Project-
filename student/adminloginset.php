<?php

include_once('../dbconnection.php');
// ADMIN login verification
if(isset($_POST['checkadminemail']) && isset($_POST['adminlogemail']) && isset($_POST['adminlogpass']))
{
    $adminlogemail=$_POST['adminlogemail'];
    $adminlogpass=$_POST['adminlogpass'];
    $sql="select admin_email,admin_pass from adminlogin where admin_email='$adminlogemail' and admin_pass='$adminlogpass'";
    $result=$conn->query($sql);
    $row=$result->num_rows;
    if ($row==1){
        echo json_encode($row);
        
    }
    else if($row==0)
    {
        echo json_encode($row);
    }
}
?>