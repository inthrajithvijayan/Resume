<?php
$conn = mysqli_connect('localhost', 'root', '','crud_operation');
if(! $conn )  
{  
  die('Could not connect: ' . mysqli_error());  
}  
else{
	echo 'Connected successfully  '; 
} 

?>