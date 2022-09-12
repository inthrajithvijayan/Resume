<?php
/*creat connection*/
$con = mysqli_connect("localhost","root","Foni@123456","INTHRAJITH");
     
if (!$con) 
{
    die('Could not connect: ' . mysqli_error());
    $con->close();
}
//echo "connected";
?>