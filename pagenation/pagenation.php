<?php 
$conn = new mysqli('localhost','root','','crud_operation');

$sql="select * from pagenation";

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

$sql="select * from pagenation limit $start_from,$num_per_page";

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
            left:30%;
            padding:10px;
            text-decoration:none;
            /* margin-left:20px; */
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
        .table {
           
            margin-top:10px;
            border:1px;
            margin-left:10px;
        }
        .page{
            margin-left:40%;
            margin-top:15px;
        }
        
    </style>

</head>
<body>
<table class="table table-bordered">
<tr>
<th>ID</th>
<th>Temp</th>
</tr>

<?php

                                                   //Data retrive to database
while($rows=mysqli_fetch_array($result))
{
?>
<tr>
    <td><p class="items"><?php echo $rows['id'];?><p></td>
    <td><p class="items"><?php echo $rows['Temp']?><p></td>
    </tr>
<?php
}
?>
</table>
                                                    
<?php
                                                //pagenation          
$sql="select * from pagenation";
$result=mysqli_query($conn,$sql);
$total_records=mysqli_num_rows($result);
$total_pages=ceil($total_records/$num_per_page);

for($i=1;$i<=$total_pages;$i++)
{
    if($page==$i)
    {
        echo "<a class='link active 'href='pagenation.php?page=".$i."'>".$i."</a>";
    }
    else{
        echo "<a class='link 'href='pagenation.php?page=".$i."'>".$i."</a>";
    }
    
    
}
 echo "<p class='page'>Total_No_Pages=$total_pages</p>";
 echo "<p class='page'>Current_Page=$page</p>";
?>
</body>
</html>
