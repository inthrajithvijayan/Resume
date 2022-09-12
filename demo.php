<?php
/*creat connection*/
// $conn = mysqli_connect("localhost","root","Foni@123456","INTHRAJITH");
 include "connection.php";
if (!$con) 
{
    die('Could not connect: ' . mysqli_error());
}


$sql="select * from EMP_INFORMATION";
$result =mysqli_query($con,$sql);
$numrow =mysqli_num_rows($result);

if($numrow>0){
    while($row= mysqli_fetch_assoc($result))
    {
    echo "<br>".$row["EMP_ID"].$row["EMP_NAME"].$row["AGE"].$row["GENDER"].$row["MOBILE_NO"].$row["CITY"]."<br>";
    }

}
else{
    echo "no records";
}
$con->close();
// $a=array();
// $result="car";

// while($b=$result)
// {
// array_push($a,$b);
// print_r($a);
// break;
// }



?>