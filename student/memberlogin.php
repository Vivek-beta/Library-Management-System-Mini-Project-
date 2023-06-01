<?php

include_once('../dbconnection.php');
// member login verification
if(isset($_POST['checklogemail']) && isset($_POST['stulogemail']) && isset($_POST['stulogpass']))
{
    $stulogemail=$_POST['stulogemail'];
    $stulogpass=$_POST['stulogpass'];
    $sql="select stu_email,stu_pass from memberadd where stu_email='$stulogemail' and stu_pass='$stulogpass'";
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
