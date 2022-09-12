<?php
// $con = mysqli_connect('localhost', 'root', 'Foni@123456','INTHRAJITH');


if (! $con) 
{
    die("Connection failed: " .  mysqli_error());

  } 

if (isset($_GET['deleteid'])) 
{
$id=$_GET['deleteid'];

$sql="DELETE FROM EMP_ATTENDANCE WHERE EMP_ID=$id";

$result = mysqli_query($con,$sql);

if($result)
 {
    echo "deleted successfully";
    //header('location:empdatapng.php');
  
}
else{
    die (mysqli_error($con));
}

}
mysqli_close($con);
    
?>