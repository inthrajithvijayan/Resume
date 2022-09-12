	<?php
	$con =mysqli_connect('localhost','root','Foni@123456','supportsla');
	if(!$con){$con->close();}

	$sql ="select * from  sev_tab_joins";
	$result = mysqli_query($con,$sql);
	$numrow= mysqli_num_rows($result);

	if($numrow>0)
	{

	echo "id"." "."requester_id"." "."fname"." "."lname"." "."created_by"." "."status"." "."description"." "."company_id"."<br>";
	
	/*$xml =new DOMDocument("1.0","utf-8");
	$xml->formatOutput=true;
	$root=$xml->createElement("tickets");
	$xml->appendChild($root);*/
	
	while($row=mysqli_fetch_assoc($result))
	{

	 echo "<br>".$row["id"]." ".$row["requester_id"]." ".$row["fname"]." ".$row["lname"]." ".$row["created_by"]." ".$row["status"]." ".$row["description"]." ".$row["company_id"]."<br>";

	/*$ticket=$xml->createElement("ticket"."-".$row["id"]);
	$root->appendChild($ticket);

	$fname=$xml->createElement("emp_name",$row["fname"]);
	$ticket->appendChild($fname);*/

	}
	/*echo "<xmp>".$xml->saveXML()."</xmp>";
	$xml->save("ticketss.xml");*/
	}
	else
	{
	echo "error";
	}

	?>	
