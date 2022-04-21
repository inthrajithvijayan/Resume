<?php 

$conn = new mysqli('localhost','root','','crud_operation');

$sql="select * from crud";

$result= mysqli_query($conn,$sql);

$num_per_page=5;

if(isset($_GET["page"]))
{
$page=$_GET["page"];
}
else
{
$page=1;
}
$start_from=($page-1)*5;

$sql="select * from crud limit $start_from,$num_per_page";

$result=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <style>
      
        .link{
            
            left:10px;
            padding:10px;
            text-decoration:none;
            /* margin-left:20px; */
            border:1px solid #ccc;
            padding-top: 5px;
            position: relative;
        }
        .items{
            margin-left:10px;

        }
        .active
        {
            background:lightblue;
        }
        .table {
            margin-top:10px;
            border:1px;
            margin-left:10px;
        }
        .table th
        {
            background-color: #dddddd;
        }
        .page{
            margin-left:40%;
            margin-top:15px;
        }
        .btn{
          margin-left:15px;
        }    
    </style>

</head>
<body>
<button style="margin-left:10px" class="btn-primary  mt-5"><a href="adddata.php" class="text-light">Add Data</button></a>
<table class="table table-bordered">
<tr>
<th>ID</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Gender</th>
<th>Email</th>
<th>Mobile_No</th>
</tr>
<?php

while($rows=mysqli_fetch_array($result))
{
?>
<tr>
    <td><p class="items"><?php echo $rows['id'];?><p></td>
    <td><p  class="items"><?php echo $rows['firstname']?><p></td>
    <td><p  class="items"><?php echo $rows['lastname']?><p></td>
    <td><p  class="items"><?php echo $rows['gender']?><p></td>
    <td><p  class="items"><?php echo $rows['email']?><p></td>
    <td><p  class="items"><?php echo $rows['mobile']?><p></td>
    </tr>
<?php
}
?>
</table>
<?php
$sql="select * from crud";
$result=mysqli_query($conn,$sql);
$total_records=mysqli_num_rows($result);
$total_pages=ceil($total_records/$num_per_page);

if($page>1)
{

  echo "<a class='btn nxt btn-danger' href='crudindexwithpgn.php?page=".($page - 1)."'> Previous </a>";

// echo "<button id='bt'><a href='crudindexwithpgn.php?page=".($page - 1)."'> Previous </a></button>";
    
}

for($i=1;$i<=$total_pages;$i++)
{
    if($page==$i)
    {
        echo "<a class='link active' href='crudindexwithpgn.php?page=".$i."'>".$i."</a>";
    }
    else{
        echo "<a class='link' href='crudindexwithpgn.php?page=".$i."'>".$i."</a>";
    }
    
}
if($i>$page)
{
//    echo $i;
   echo " <a class='btn nxt btn-primary'  href='crudindexwithpgn.php?page=".($page + 1)."'>Next</a>";
   
}
else if ($i==$page)
{
   echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbspNo Records ";
}

?>

 <?php
   echo "<p class='page'>Total_Records=<$total_records></p>";
  echo "<p class='page'>Total_No_Pages=<$total_pages></p>";
  echo "<p class='page'>Current_Page= <$page></p>";
?>
</body>
</html>
