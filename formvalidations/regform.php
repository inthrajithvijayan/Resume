<?php

    $conn = mysqli_connect('localhost', 'root', '','mydba');

    $fname= $_POST['fname'];
    $lname= $_POST['lname'];
    $email = $_POST['email'];
    $mobileno=$_POST['mobileno'];
    $Dob=date('d-m-Y',strtotime($_POST['Dob']));
    // $password=AES_ENCRYPT($_POST['password'],'12345678');
    $password=$_POST['password'];
    
    $sql = "INSERT INTO regform (fname,lname,Dob,email,mobile,pass) VALUES 
    ('".$fname."','".$lname."','".$Dob."','".$email."',$mobileno,AES_ENCRYPT('$password','12345678'))";
    
    $result = mysqli_query($conn,$sql);

    if ($result) 
    {	
    
            echo "Record was inserted!";		
    
     } 
     else
      {
    
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
      }
?>