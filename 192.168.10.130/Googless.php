<?php
$con = mysqli_connect("localhost","root","Foni@123456","supportsla");
     
if (!$con) 
{
    die('Could not connect: ' . mysqli_connect_error());
    $con->close();
}
//$sql="select aes_decrypt(u.first_name,'ENAJrd0tKk7cmOMa96SWqFQP')as first_name,aes_decrypt(u.last_name,'ENAJrd0tKk7cmOMa96SWqFQP')as last_name,cm.user_id,t.ticket_id from tickets t left join company_user_map cm on t.requester_id=cm.user_id left join company c on cm.company_id=c.id left join users u on u.id=cm.user_id where c.company_name='Googless'";
$sql="select aes_decrypt(u.first_name,'ENAJrd0tKk7cmOMa96SWqFQP')as first_name,aes_decrypt(u.last_name,'ENAJrd0tKk7cmOMa96SWqFQP')as last_name,
cm.user_id,aes_decrypt(t.title,'ENAJrd0tKk7cmOMa96SWqFQP')as title,t.ticket_id,aes_decrypt(t.description,'ENAJrd0tKk7cmOMa96SWqFQP')as description,
aes_decrypt(td.message,'ENAJrd0tKk7cmOMa96SWqFQP')as message from tickets t left join company_user_map cm on t.requester_id=cm.user_id left join company c on cm.company_id=c.id left join users u on u.id=cm.user_id left join ticket_details td on cm.user_id=td.ticket_id where c.company_name='Googless' and td.action='reply' ";

$ticketReportt = array();
$result = mysqli_query($con,$sql);

if($result)
{
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
        $xml = new DOMDocument('1.0','utf-8');
        $xml->formatOutput=true;		
        $filePath = 'xml/Googless.xml';   
        $root = $xml->createElement('Ticket_details');
        $xml->appendChild($root);

        for($i=0;$i<count($ticketReportt);$i++) {	
            //echo " looop work";
           //print_r($ticketReportt);
   
           $first_name =$ticketReportt[$i]['first_name'];
           $last_name =$ticketReportt[$i]['last_name'];
           $user_id=$ticketReportt[$i]['user_id'];
           $ticket_id=$ticketReportt[$i]['ticket_id'];
           $ticket_for = $ticketReportt[$i]['ticket_for'];
           //$ticket_group = $ticketReportt[$i]['ticket_group'];
           $title = $ticketReportt[$i]['title'];
           $description = $ticketReportt[$i]['description'];
           //$status = $ticketReportt[$i]['status'];
           //$priority = $ticketReportt[$i]['priority'];
           //$group_name = $ticketReportt[$i]['group_name'];
           //$client_fname = $ticketReportt[$i]['client_fname'];
           //$client_lname = $ticketReportt[$i]['client_lname'];
           //$supporter_fname = $ticketReportt[$i]['supporter_fname'];
           //$supporter_lname = $ticketReportt[$i]['supporter_lname'];
           $message= $ticketReportt[$i]['message'];
   
           $ticket = $xml->createElement('Ticket');
           $ticket->setAttribute('ID',$ticket_id);
   
           $first_name=$xml->createElement('first_name',$first_name);
           $ticket->appendChild($first_name);

           $last_name=$xml->createElement('last_name',$last_name);
           $ticket->appendChild($last_name);
   
           $user_id=$xml ->createElement('user_id',$user_id);
           $ticket->appendChild($user_id);

           $ticket_id=$xml ->createElement('ticket_id',$ticket_id);
           $ticket->appendChild($ticket_id);

           $ticket_for=$xml ->createElement('ticket_for',$ticket_for);
           $ticket->appendChild($ticket_for);
           
           $title = $xml->createElement('title',$title);
           $ticket->appendChild($title);

           $description= $xml->createElement('description',htmlentities($description));
           $ticket->appendChild($description);

          /* $ticket_id=$xml ->createElement('ticket_id',$ticket_id);
           $ticket->appendChild($ticket_id);

           $ticket_group =$xml->createElement('ticket_group',$ticket_group);
           $ticket->appendChild($ticket_group );
     
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
           $ticket->appendChild($supporter_lname); */
        
           $message= $xml->createElement('message',htmlspecialchars($message));
           $ticket->appendChild($message); 
       
           $root->appendChild($ticket);
       }

       echo "<a href='".$filePath."'>xml view</a>";

       echo "<xmp>".$xml->saveXML()."</xmp>";
          $xml->save($filePath);
       }

?>