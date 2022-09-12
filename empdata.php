<?php
/*creat connection*/
include "connection.php";
// $conn = mysqli_connect("localhost","root","Foni@123456","INTHRAJITH");
     
if (!$con) 
{
    die('Could not connect: ' . mysqli_error());
}
{
    $sql="select * from EMP_INFORMATION";
    $result =mysqli_query($con,$sql);
    $numrow =mysqli_num_rows($result);
    
    if($numrow>0)
    
    {
     echo '<table class="dbresult">';
     echo'<tr>';
     echo '<th>EMP_ID</th>';
     echo '<th>NAME</th>';
     echo '<th>AGE</th>';
     echo '<th>GENDER</th>';
     echo '<th>MOBILE_NO</th>';
     echo '<th>CITY</th>';
     echo '</tr>';
    
    while($row= mysqli_fetch_assoc($result))
    
    {
    echo '<tr>';
        
        echo '<td>' .$row['EMP_ID'].'</td>';
        echo '<td>' .$row['EMP_NAME'].'</td>';
            // echo '<td>' .$row['NAME'].'</td>';
        echo '<td>' .$row['AGE'].'</td>';
        echo '<td>' .$row['GENDER'].'</td>';
        echo '<td>' .$row['MOBILE_NO'].'</td>';
        echo '<td>' .$row['CITY'].'</td>';
    echo '</tr>';
            /*echo "<br>".$row["EMP_ID"]."&nbsp&nbsp&nbsp&nbsp".$row["NAME"]."&nbsp&nbsp&nbsp&nbsp".
        $row["AGE"]."&nbsp&nbsp&nbsp&nbsp ".$row["GENDER"]."&nbsp&nbsp&nbsp&nbsp ".$row["MOBILE_NO"]."&nbsp&nbsp&nbsp&nbsp ".$row["CITY"]."<br>";
        */  
    }
    
    echo '</table>';
    }
    else
    {
        echo "no records";
    }
}

?>
<style>
 .dbresult,.dbresult td, th{
 border:1px solid black;
 border:collapse;
 padding:10px;
 }
 
 .dbresult tr:nth-child(odd){
 background-color: #dddddd;
 }
</style>