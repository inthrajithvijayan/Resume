<?php
 $conn = mysqli_connect('localhost', 'root', '','mydba');
 $fname= $_POST['fname'];
 $password=$_POST['password'];

 $sql="SELECT * from regform where fname='$fname' and pass='$password'";

$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==0)
{
    echo "Uesrname and Password incorrect";
}
else
{
header("Location:http://192.168.10.197/");
}
?>
