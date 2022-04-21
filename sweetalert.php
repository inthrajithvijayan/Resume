<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script> 
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- sweet alert -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script> 
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  
    <title>Document</title>
</head>
<body>
  <div class="container mt-5 pt-5">

    <div class="card col-4">
      <div class="card-body">
      <button class="btn-primary" type="submit" onclick="alert()">Success</button>
    <button class="btn-primary" type="submit" onclick="alertt()">Fail</button>

      </div>
    </div>
  </div>
    </body>

<script>

    function alert()
    {
      Swal.fire(
  'Good job!',
  'You clicked the button!',
  'success'
)
    }
    function alertt() {
        Swal.fire({
  icon: 'error',
  title: 'Duplicate Entry',
  text: 'Check your Entry!',
})
        
    }
  
    </script>
</html>