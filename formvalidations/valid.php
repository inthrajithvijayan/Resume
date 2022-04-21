<?php
//$conn = mysql_connect('localhost', 'root', 'Foni@123456','mydatabase');
 $conn = mysqli_connect('localhost', 'root', '','mydba');
if(! $conn )  
{  
  die('Could not connect: ' . mysqli_error());  
}  
else{
	echo 'Connected successfully'; 
} 
$fname= $_POST['fname'];
$lname= $_POST['lname'];
$email = $_POST['email'];
$mobileno=$_POST['mobileno'];
// $Dob=$_POST['Dob'];
$Dob=date('d-m-Y',strtotime($_POST['Dob']));
$gender=$_POST['gender'];
$sql = "INSERT INTO form_values (fname,lname,gender,Dob,email,mobileno) VALUES 
('".$fname."','".$lname."','".$gender."','".$Dob."','".$email."',$mobileno)";

$result = mysqli_query($conn,$sql);

if ($result) 
{	

    	echo "Record was inserted!";		

 } 
 else
  {

	echo "Error: " . $sql . ":-" . mysql_error($conn);

 }
 mysqli_close($conn);

?>