<?php
/* DB connection*/
$con=mysqli_connect("localhost", "root", "", "inthrajith");

if(!$con){
    echo "DB not Connected...";
    exit();
}
  // retrive data from db
    $sql="Select * from EMP_INFORMATION";
    $empArr=array();
    $result =mysqli_query($con,$sql);
    $numrow =mysqli_num_rows($result);
    if($numrow>0)
    {
             //$row = $result->fetch_assoc()
       
        while($row= mysqli_fetch_assoc($result))
        {
            array_push($empArr,$row);
        }
        if(count($empArr))
        {
            createXMLfile($empArr);
            

        }
        $result->free();
    }
    $con-> close();
    
function createXMLfile($empArr)
{
    $filePath = 'xml\emp.xml';
    $xml = new DOMDocument('1.0','utf-8');
    $xml->formatOutput=true;
    $root = $xml ->createElement('EMPLOYEE_INFORMATION');

    for($i=0;$i<count($empArr);$i++){
        $emp_id =$empArr[$i]['EMP_ID'];
        $emp_name = htmlspecialchars($empArr[$i]['EMP_NAME']);
        $age = $empArr[$i]['AGE'];
        $gender = $empArr[$i]['GENDER'];
        $mobile = $empArr[$i]['MOBILE_NO'];
        $city = $empArr[$i]['CITY'];

        $emp = $xml->createElement('employee');
        $emp->setAttribute('EMP_ID',$emp_id);

        $emp_name =$xml->createElement('emp_name',$emp_name);
        $emp->appendChild($emp_name);

        $age =$xml ->createElement('age',$age);
        $emp->appendChild($age);

        $gender =$xml ->createElement('gender',$gender);
        $emp->appendChild($gender);

        $mobile =$xml->createElement('mobile',$mobile);
        $emp->appendChild($mobile);

        $city = $xml ->createElement('city',$city);
        $emp->appendChild($city);

        $root->appendChild($emp);
    }
    $xml->appendChild($root);
    // echo "<a href='".$filePath."'>Click</a>";
     echo "<xmp>".$xml->saveXML()."</xmp>";
    $xml->save($filePath);
}

?>