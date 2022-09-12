<?php
/*creat connection*/
$conn = mysqli_connect("localhost","root","Foni@123456","INTHRAJITH");
     
if (!$conn) 
{
    die('Could not connect: ' . mysqli_error());
}


$sql="select * from EMP_INFORMATION";
$result =mysqli_query($conn,$sql);
$numrow =mysqli_num_rows($result);

if($numrow>0){
    while($row= mysqli_fetch_assoc($result))
    {
    echo "<br>".$row["EMP_ID"].$row["NAME"].$row["AGE"].$row["GENDER"].$row["MOBILE_NO"].$row["CITY"]."<br>";
    }

}
else{
    echo "no records";
}
$con->close();



?>