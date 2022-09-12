<?php
$con=new mysqli('localhost','root','','crud_operation');

if (! $con) 
{
    die("Connection failed: " .  mysqli_error());

  } 

if (isset($_GET['deleteid'])) 
{
$id=$_GET['deleteid'];

$sql="DELETE FROM crud WHERE id=$id";

$result = mysqli_query($con,$sql);

if($result)
 {
    echo "deleted successfully";
    header('location:crudindex.php');
    # code...
}
else{
    die (mysqli_error($con));
}

}
mysqli_close($con);
    
?>