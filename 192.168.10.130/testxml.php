<?php
/*creat connection*/
$conn = mysqli_connect("localhost","root","Foni@123456","INTHRAJITH");
     
if (!$conn) 
{
    die('Could not connect: ' . mysqli_error());
}
else
{
    // retrive data from db

$sql="select * from EMP_INFORMATION";
$result =mysqli_query($conn,$sql);
$numrow =mysqli_num_rows($result);

if($numrow>0)
{
	
    $xml = new DOMDocument("1.0" ,'utf-8');
    $xml->formatOutput=true;
    $filePath="downloads/Exmpinfo.xml";
    //rootelement -inthrajith
    $root=$xml->createElement("EMP_INFORMATIONS");
    $xml->appendChild($root);

    while($row=mysqli_fetch_assoc($result))
    {	
    $EMP_INFORMATION=$xml->createElement("EMPLOYEE"."-".$row['EMP_ID']);
    $root->appendChild($EMP_INFORMATION);
    //element -->
     $emp_id=$xml ->createElement('emp_id',$row['EMP_ID']);
     $EMP_INFORMATION -> appendChild($emp_id);

    $name=$xml ->createElement('name',$row['EMP_NAME']);
    $EMP_INFORMATION -> appendChild($name);

    $age=$xml ->createElement('age',$row['AGE']);
    $EMP_INFORMATION -> appendChild($age);

    $gender=$xml ->createElement('gender',$row['GENDER']);
    $EMP_INFORMATION -> appendChild($gender);

    $mobile=$xml ->createElement('mobile',$row['MOBILE_NO']);
    $EMP_INFORMATION -> appendChild($mobile);
    
    $city=$xml ->createElement('city',$row['CITY']);
    $EMP_INFORMATION -> appendChild($city);
    }
   
    echo "<xmp>".$xml->saveXML()."</xmp>";
    $xml->save($filePath);
}
else
{
    echo "error";
}
}
?>