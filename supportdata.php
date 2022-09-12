<?php
$con =mysqli_connect('localhost','root','Foni@123456','supportsla');
if(!$con){$con->close();}

$sql ="select * from  sev_tab_joins";
$result = mysqli_query($con,$sql);
$numrow= mysqli_num_rows($result);

if($numrow>0)

{
while($row=mysqli_fetch_assoc($result)){
   
    echo $row["id"];
}
}



?>
