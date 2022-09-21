<?php
//$conn = mysqli_connect('localhost', 'root', '','crud_operation');
$conn = mysqli_connect('localhost', 'root', 'Foni@123456','INTHRAJITH');
if(! $conn )  
{  
  die('Could not connect: ' . mysqli_error());  
}  
else{
	echo 'Connected successfully  '; 
} 

?>