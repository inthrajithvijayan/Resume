<?php
$conn = mysqli_connect('localhost', 'root', '','mydba');
 
if(! $conn )
{
die('connection error'.mysqli_connect_error());
}
$sql = "SELECT fname,lname,gender,email,mobileno,Dob FROM form_values" ;

$result= mysqli_query($conn,$sql);
$numrow =mysqli_num_rows($result);

if($numrow>0)
{
    echo '<table class="dbresult">';
 echo'<tr>';
 echo '<th>FIRST NAME</th>';
 echo '<th>LAST NAME</th>';
 echo '<th>GENDER</th>';
 echo '<th>EMAIL ID </th>';
 echo '<th>MOBILE NUMBER</th>';
 echo '<th>DATE OF BIRTH</th>';
 echo '</tr>';

while($row = mysqli_fetch_assoc($result))
{


echo '<tr>';
  echo '<td>' .$row['fname'].'</td>';
  echo '<td>' .$row['lname'].'</td>';
  echo '<td>' .$row['gender'].'</td>';
  echo '<td>' .$row['email'].'</td>';
  echo '<td>' .$row['mobileno'].'</td>';
  echo '<td>' .$row['Dob'].'</td>';
  echo '</tr>';
} 
  echo '</table>';
}
else
{
echo "record nOt found";
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