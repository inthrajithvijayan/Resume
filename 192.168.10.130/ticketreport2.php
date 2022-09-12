<?php
/*creat connection*/
$con = mysqli_connect("localhost","root","Foni@123456","supportsla");
     
if (!$con) 
{
    die('Could not connect: ' . mysqli_error());
    $con->close();
}
//aes_decrypt(title,'ENAJrd0tKk7cmOMa96SWqFQP'),aes_decrypt(description,'ENAJrd0tKk7cmOMa96SWqFQP')
// $sql="select id,ticket_id,ticket_for,ticket_group,aes_decrypt(title,'ENAJrd0tKk7cmOMa96SWqFQP')as title,
// aes_decrypt(description,'ENAJrd0tKk7cmOMa96SWqFQP')as description,status,priority,group_name,
// aes_decrypt(client_fname,'ENAJrd0tKk7cmOMa96SWqFQP')as client_fname,aes_decrypt(client_lname,'ENAJrd0tKk7cmOMa96SWqFQP')as client_lname,
// aes_decrypt(supporter_fname,'ENAJrd0tKk7cmOMa96SWqFQP')as supporter_fname,
// aes_decrypt(supporter_lname,'ENAJrd0tKk7cmOMa96SWqFQP')as supporter_lname from tickets_view where ticket_id=7428";

// $sql=" select a.id,a.ticket_id,a.ticket_for,a.ticket_group,
// aes_decrypt(a.title,'ENAJrd0tKk7cmOMa96SWqFQP')as title,
// aes_decrypt(a.description,'ENAJrd0tKk7cmOMa96SWqFQP')as description,a.status,a.priority,a.group_name,
// aes_decrypt(a.client_fname,'ENAJrd0tKk7cmOMa96SWqFQP')as client_fname,
// aes_decrypt(a.client_lname,'ENAJrd0tKk7cmOMa96SWqFQP')as client_lname,
// aes_decrypt(a.supporter_fname,'ENAJrd0tKk7cmOMa96SWqFQP')as supporter_fname,
// aes_decrypt(a.supporter_lname,'ENAJrd0tKk7cmOMa96SWqFQP')as supporter_lname,
// aes_decrypt(b.message,'ENAJrd0tKk7cmOMa96SWqFQP')as message from tickets_view 
// as a left join ticket_details as b on a.ticket_id=7428 and b.ticket_id=14712 where action='reply'";


$sql= "select t.id,t.ticket_id,t.ticket_for,t.group_id,aes_decrypt(t.title,'ENAJrd0tKk7cmOMa96SWqFQP')as title,aes_decrypt(t.description,'ENAJrd0tKk7cmOMa96SWqFQP')as description,
t.ticket_mode,ts.status,tp.name,g.name,AES_DECRYPT(us.first_name,'ENAJrd0tKk7cmOMa96SWqFQP')as client_fname,AES_DECRYPT(us.last_name,'ENAJrd0tKk7cmOMa96SWqFQP')as client_lname,
aes_decrypt(usu.first_name,'ENAJrd0tKk7cmOMa96SWqFQP')as supporter_fname,aes_decrypt(usu.last_name,'ENAJrd0tKk7cmOMa96SWqFQP')as supporter_lname,
aes_decrypt(td.message,'ENAJrd0tKk7cmOMa96SWqFQP')as msg from tickets t left join users u on t.id=u.id left join groups g on t.group_id =g.id 
left join companies c on c.id=u.company_id left join ticket_status ts on ts.id=t.status_id 
left join ticket_priorities tp on tp.id=t.priority_id left join users us on t.requester_id = us.id 
left join users usu on t.supporter_id=usu.id left join ticket_details td on td.ticket_id =t.id where t.ticket_id=7428 and action='reply'";
    $ticketReportt = array();
    $result = mysqli_query($con,$sql);
    
if($result)
{	    
  
         //$row = $result->fetch_assoc()
        while($row = mysqli_fetch_assoc($result))
 {
            array_push($ticketReportt,$row);
		    
        }
        if($ticketReportt) {
            createXMLfile($ticketReportt);
        }
    }
	$con-> close();

    function createXMLfile($ticketReportt)
{
	//echo "func working";
    $xml = new DOMDocument('1.0','utf-8');
    $xml->formatOutput=true;		
    $filePath = 'xml/ticket7150.xml';   
    $root = $xml->createElement('TICKTET_INFO');
    $xml->appendChild($root);

    for($i=0;$i<count($ticketReportt);$i++) {	
 	    //echo " looop work";
	    //print_r($ticketReportt);

        $id =$ticketReportt[$i]['id'];
        $ticket_id=$ticketReportt[$i]['ticket_id'];
        $ticket_for = $ticketReportt[$i]['ticket_for'];
        $ticket_group = $ticketReportt[$i]['ticket_group'];
        $title = $ticketReportt[$i]['title'];
        $description = $ticketReportt[$i]['description'];
        $status = $ticketReportt[$i]['status'];
        $priority = $ticketReportt[$i]['priority'];
        $group_name = $ticketReportt[$i]['group_name'];
        $client_fname = $ticketReportt[$i]['client_fname'];
        $client_lname = $ticketReportt[$i]['client_lname'];
        $supporter_fname = $ticketReportt[$i]['supporter_fname'];
        $supporter_lname = $ticketReportt[$i]['supporter_lname'];
        // $message= $ticketReportt[$i]['message'];

        $ticket = $xml->createElement('ticketDetails');
        $ticket->setAttribute('ticket',$ticket_id);

        $id=$xml->createElement('id',$id);
        $ticket->appendChild($id);

        $ticket_id=$xml ->createElement('ticket_id',$ticket_id);
        $ticket->appendChild($ticket_id);

        $ticket_for=$xml ->createElement('ticket_for',$ticket_for);
        $ticket->appendChild($ticket_for);

        $ticket_group =$xml->createElement('ticket_group',$ticket_group);
        $ticket->appendChild($ticket_group );

        $title = $xml->createElement('title',$title);
        $ticket->appendChild($title);

        $description= $xml->createElement('description',htmlentities($description));
        $ticket->appendChild($description);

        $status = $xml->createElement('status',$status);
        $ticket->appendChild($status);

        $priority= $xml->createElement('priority',$priority);
        $ticket->appendChild($priority);

        $group_name= $xml->createElement('group_name',$group_name);
        $ticket->appendChild($group_name);

        $client_fname = $xml->createElement('client_fname',$client_fname);
        $ticket->appendChild($client_fname);

        $client_lname = $xml->createElement('client_lname',$client_lname);
        $ticket->appendChild($client_lname);

        $supporter_fname = $xml->createElement('supporter_fname',htmlentities($supporter_fname));
        $ticket->appendChild($supporter_fname);

        $supporter_lname = $xml->createElement('supporter_lname',htmlentities($supporter_lname));
        $ticket->appendChild($supporter_lname);
        
        // $message= $xml->createElement('message',htmlspecialchars($message));
        // $ticket->appendChild($message);      
    
        $root->appendChild($ticket);
    }
	
     echo "<a href='".$filePath."'>xml view</a>";

     echo "<xmp>".$xml->saveXML()."</xmp>";
   	 $xml->save($filePath);
		
}
?>
