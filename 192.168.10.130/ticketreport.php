<?php
/*creat connection*/
$con = mysqli_connect("localhost","root","Foni@123456","supportsla");
     
if (!$con) 
{
    die('Could not connect: ' . mysqli_error());
    $con->close();
}
//aes_decrypt(title,'ENAJrd0tKk7cmOMa96SWqFQP'),aes_decrypt(description,'ENAJrd0tKk7cmOMa96SWqFQP')
$sql="select id,ticket_id,ticket_type,ticket_for,requester_id,user_company_id,priority_id,status_id,
department_id,aes_decrypt(title,'ENAJrd0tKk7cmOMa96SWqFQP')as title,aes_decrypt(description,'ENAJrd0tKk7cmOMa96SWqFQP')as description,
first_response_time from tickets where ticket_id=7428";
    $ticketReport = array();
    $result = mysqli_query($con,$sql);
    
if($result)
{	    
  
         //$row = $result->fetch_assoc()
        while($row = mysqli_fetch_assoc($result))
 {
            array_push($ticketReport,$row);
		    
        }
        if($ticketReport) {
            createXMLfile($ticketReport);
        }
    }
	$con-> close();

    function createXMLfile($ticketReport)
{
	//echo "func working";
    $xml = new DOMDocument('1.0','utf-8');
    $xml->formatOutput=true;		
    $filePath = 'xml/ticketReport.xml';   
    $root = $xml->createElement('TICKTET_INFO');
    $xml->appendChild($root);

    for($i=0;$i<count($ticketReport);$i++) 
    {	
 	    //echo " looop work";
	    //print_r($ticketReport);

        $id =$ticketReport[$i]['id'];
        $ticket_id=$ticketReport[$i]['ticket_id'];
        $ticket_type= $ticketReport[$i]['ticket_type'];
        $ticket_for = $ticketReport[$i]['ticket_for'];
        $requester_id = $ticketReport[$i]['requester_id'];
        $user_company_id = $ticketReport[$i]['user_company_id'];
        $priority_id = $ticketReport[$i]['priority_id'];
        $status_id = $ticketReport[$i]['status_id'];
        $department_id = $ticketReport[$i]['department_id'];
        $title = $ticketReport[$i]['title'];
        $description = $ticketReport[$i]['description'];
        $first_response_time = $ticketReport[$i]['first_response_time'];

        $ticket = $xml->createElement('ticketDetails');
        $ticket->setAttribute('ticket',$ticket_id);

        $id=$xml->createElement('id',$id);
        $ticket->appendChild($id);

        $ticket_id=$xml ->createElement('ticket_id',$ticket_id);
        $ticket->appendChild($ticket_id);

        $ticket_type =$xml ->createElement('ticket_type',$ticket_type);
        $ticket->appendChild($ticket_type);

        $ticket_for =$xml->createElement('ticket_for',$ticket_for);
        $ticket->appendChild($ticket_for);

        $requester_id = $xml->createElement('requester_id',$requester_id);
        $ticket->appendChild($requester_id);

        $user_company_id = $xml->createElement('user_company_id',$user_company_id);
        $ticket->appendChild($user_company_id);

        $priority_id = $xml->createElement('priority_id',$priority_id);
        $ticket->appendChild($priority_id);

        $status_id= $xml->createElement('status_id',$status_id);
        $ticket->appendChild($status_id);

        $department_id = $xml->createElement('department_id',$department_id);
        $ticket->appendChild($department_id);

        $title = $xml->createElement('title',$title);
        $ticket->appendChild($title);

        $description= $xml->createElement('description',$description);
        $ticket->appendChild($description);

        $first_response_time = $xml->createElement('first_response_time',$first_response_time);
        $ticket->appendChild($first_response_time);

        $root->appendChild($ticket);
    }
	
     //echo "<a href='".$filePath."'>Click</a>";

     echo "<xmp>".$xml->saveXML()."</xmp>";
   	 $xml->save($filePath);
		
}
?>

