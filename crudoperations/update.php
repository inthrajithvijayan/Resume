<?php
$con =mysqli_connect('localhost','root','','crud_operation');
if (! $con) 
{
    die("Connection failed: " .  mysqli_error());

  } 


  $id=$_GET['updateid'];
  $sql="SELECT * from crud where id=$id";
  $result=mysqli_query($con,$sql);
  $row= mysqli_fetch_assoc($result);

  $firstname=$row['firstname'];
  $lastname=$row['lastname'];
  $gender=$row['gender'];
  $email=$row['email'];
  $mobile=$row['mobile'];

  if(isset($_POST['submit']))
  {
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];

    $sql = "UPDATE crud SET firstname='$firstname',lastname='$lastname',gender='$gender',email='$email',mobile=$mobile where id=$id";

    $result=mysqli_query($con,$sql);

  if ($result) 
  {
      //  echo "Updated SuccessFully";
      header('location:crudindex.php');     
   } else
    {
      echo "Error: " . $sql . ":-" . mysqli_error($con);
   }
   mysqli_close($con);
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="CRUD.css">

  <title>UPDATE</title>
</head>

<body>
  <div class="container">
    <form name="crudform"  method="post">
      <div class="col-12 col-sm-8 col-md-4 m-auto">
        <div class="card">
          <div class="card-header">
           UPDATE
          </div>
          <div class="card-body">
            <div class="row">
              <label for="firstname">FirstName</label>
              <input type="text" id="firstname" name="firstname" required value="<?php 
              echo $firstname ?>">
            </div>
            <div class="row">
              <label for="lastname">LastName</label>
              <input type="text" id="lastname" name="lastname" required value="<?php 
              echo $lastname ?>">
            </div>

            <label for="gender">Gender</label>
            <input type="radio" name="gender" id="male" value="Male"> Male
            <input type="radio" name="gender" id="female" value="Female"> Female
            <input type="radio" name="gender" id="Other" value=" Others"> Others
            <br>
            <div class="row">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" required value="<?php 
              echo $email ?>">
            </div>
            <div class="row">
              <label for="mobileno">Mobile Number</label>
              <input type="number" name="mobile" id="mobile" required value="<?php 
              echo $mobile?>">
            </div>
            <button class="btn-primary" name="submit" id="submit">Update</button>
            <button class="btn-primary" type="reset">Reset</button>


          </div>
        </div>
      </div>
    </form>

  </div>
</body>

</html>
