<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script> 
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="adddata.css">

  <title>Add Data</title>
</head>

<body>
  <div class="container">
    <form name="crudform" action="adddataconn.php" method="post">
      <div class="col-12 col-sm-8 col-md-4 m-auto">
        <div class="card">
          <div class="card-header">
          Add Data
          </div>
          <div class="card-body">
            <div class="row">
              <label for="fname">FirstName</label>
              <input type="text" id="fname" name="fname" required>
            </div>
            <div class="row">
              <label for="lname">LastName</label>
              <input type="text" id="lname" name="lname" required>
            </div>

            <label for="gender">Gender</label>
            <input type="radio" name="gender" id="male" value="Male"> Male
            <input type="radio" name="gender" id="female" value="Female"> Female
            <input type="radio" name="gender" id="Other" value=" Others"> Others
            <br>
            <div class="row">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" required>
            </div>
            <div class="row">
              <label for="mobileno">Mobile Number</label>
              <input type="number" name="mobileno" id="mobileno" required>
            </div>
            <button class="btn-primary" type="submit">Submit</button>
            <button class="btn-primary" type="reset">Reset</button>  
          </div>
        </div>
      </div>
    </form>

  </div>
</body>

</html>
