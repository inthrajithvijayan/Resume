<?php
$con = mysqli_connect('localhost', 'root', 'Foni@123456','INTHRAJITH');
if (! $con) 
{
    die("Connection failed: " .  mysqli_error());

  } 


  $id=$_GET['updateid'];
  $sql="SELECT * from EMP_INFORMATION where id=$id";
  $result=mysqli_query($con,$sql);
  $row= mysqli_fetch_assoc($result);

  $EMP_ID=$row['EMP_ID'];
  $NAME=$row['NAME'];
  $AGE=$row['AGE'];
  $AGE=$row['AGE'];
  $MOBILE_NO=$row['MOBILE_NO'];
  $CITY=$row['CITY'];
  

  if(isset($_POST['submit']))
  {
    $EMP_ID=$_POST['EMP_ID'];
    $NAME=$_POST['NAME'];
    $AGE=$_POST['AGE'];
    $GENDER=$_POST['GENDER'];
    $MOBILE_NO=$_POST['MOBILE_NO'];
    $CITY=$_POST['CITY'];

    $sql = "UPDATE EMP_INFORMATION SET EMP_ID='$EMP_ID',NAME='$NAME',AGE='$AGE',GENDER='$GENDER',MOBILE_NO='$MOBILE_NO',CITY='$CITY' where id=$id";

    $result=mysqli_query($con,$sql);

  if ($result) 
  {
      //  echo "Updated SuccessFully";
      header('location:empdatapgn.php');     
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
  <link rel="stylesheet" href="EMP_INFORMATION.css">

  <title>UPDATE</title>
</head>

<body>
  <div class="container">
    <form name="EMP_INFORMATION"  method="post">
      <div class="col-12 col-sm-8 col-md-4 m-auto">
        <div class="card">
          <div class="card-header">
           UPDATE
          </div>
          <div class="card-body">
            <div class="row">
              <label for="EMP_ID">EMP_ID</label>
              <input type="text" id="EMP_ID" name="EMP_ID" required value="<?php 
              echo $EMP_ID ?>">
            </div>
            <div class="row">
              <label for="NAME">NAME</label>
              <input type="text" id="NAME" name="NAME" required value="<?php 
              echo $NAME ?>">
            </div>

            <label for="AGE">AGE</label>
            <input type="radio" name="AGE" id="male" value="Male"> Male
            <input type="radio" name="AGE" id="female" value="Female"> Female
            <input type="radio" name="AGE" id="Other" value=" Others"> Others
            <br>
            <div class="row">
              <label for="GENDER">GENDER</label>
              <input type="GENDER" name="GENDER" id="GENDER" required value="<?php 
              echo $GENDER ?>">
            </div>
            <div class="row">
              <label for="MOBILE_NO">MOBILE_NO Number</label>
              <input type="number" name="MOBILE_NO" id="MOBILE_NO" required value="<?php 
              echo $MOBILE_NO?>">
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
