<?php
/* DB connection*/
include "connection.php";
  // retrive data from db
    $sql="Select * from EMP_INFORMATION";
    $empArr = array();
    $result = mysqli_query($con,$sql);

    if($result)
{	
         //$row = $result->fetch_assoc()
        while($row = mysqli_fetch_assoc($result))
 {
            array_push($empArr,$row);
		    //print_r($empArr);
		    //break;
        }
        if($empArr) {
            createXMLfile($empArr);
        }
    }
	$con-> close();
    
function createXMLfile($empArr)
{
	//echo "func working";
    $xml = new DOMDocument('1.0','utf-8');
    $xml->formatOutput=true;		
    $filePath = 'downloads/emp.xml';   
    $root = $xml->createElement('EMPLOYEE_INFORMATION');
    $xml->appendChild($root);

    for($i=0;$i<count($empArr);$i++) {	
 	    //echo " looop work";
	    //print_r($empArr);

        $emp_id =$empArr[$i]['EMP_ID'];
        $emp_name =$empArr[$i]['NAME'];
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

        $city = $xml->createElement('city',$city);
        $emp->appendChild($city);

        $root->appendChild($emp);
    }
	
     //echo "<a href='".$filePath."'>Click</a>";

     echo "<xmp>".$xml->saveXML()."</xmp>";
   	 $xml->save($filePath);
		
}

?>