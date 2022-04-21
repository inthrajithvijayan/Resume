<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .link{
            padding:15px;
            text-decoration:none;
            margin-left:10px;
            border:1px solid #ccc;
            padding-top: 10px;
            position: relative;
        }
        .items{
            margin-left:10px;
        }
        .active{
            background:lightblue;
        }
    </style>
</head>
<body>
    
</body>
</html>
    <?php
    $conn = new mysqli('localhost','root','','crud_operation');
   if (! $conn) 
   {
       die("Connection failed: " .  mysqli_error());
   
     } 
     $sql="select * from pagenation";

     $result=$conn->query($sql);

     $no_of_items=$result->num_rows;

     $no_of_items_per_page=10;

      $no_of_pages=ceil($no_of_items/$no_of_items_per_page);

      $page=1;
      if(isset($_GET["page"])){
          $page=$_GET["page"];
      }
      $start_limit=($page-1)*$no_of_items_per_page;

      echo "<p>No of Items:--".$no_of_items;"</p>";
      echo "<p>No of Items From:--".$start_limit." to ".($start_limit+$no_of_items_per_page)."</p>";

      $sql="select * from pagenation limit $start_limit,$no_of_items_per_page";

      $result=$conn->query($sql);

      while($row=$result->fetch_assoc())
      {
          echo "<p class='items'>{$row["id"]}-{$row["Temp"]}</p>";
      }
     for ($i=1; $i <=$no_of_pages ; $i++) 
     {
         if($page==$i)
         {
            echo "<a class='link active' href='pagenation.php?page={$i} '>{$i}</a>";
         }
         else
         {
            echo "<a class='link' href='pagenation.php?page={$i} '>{$i}</a>";
         }
         
     }


?>