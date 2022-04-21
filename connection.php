
<?php
$conn = mysqli_connect('192.168.10.130','localhost','Foni@123456');
     
if (!$conn) 
{
    die('Could not connect: ' . mysqli_error());
}
echo 'Connected successfully';
mysqli_close($conn);
?>
