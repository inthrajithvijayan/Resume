<?php 
$conn = mysqli_connect('localhost', 'root', '','crud_operation');
if(! $conn )  
{  
  die('Could not connect: ' . mysqli_error());  
}  
else{
	echo 'Connected successfully  '; 
} 

    $firstname=$_POST['fname'];
    $lastname=$_POST['lname'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $mobile=$_POST['mobileno'];

    $sql = "INSERT INTO crud(firstname,lastname,gender,email,mobile) VALUES ('".$firstname."','".$lastname."','".$gender."','".$email."',$mobile)";

    if (mysqli_query($conn,$sql)) 
    {
      
     echo "Record was inserted! SuccessFully";
     header('location:crudindexwithpgn.php');
     }
      else
      {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
    
?>
