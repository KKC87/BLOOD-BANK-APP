<?php

	$phone=$_GET["phone"];
	$bg=$_GET["bg"];

	$conn=mysql_connect("75.98.175.86","myspaceb_root","root123");
	mysql_select_db("myspaceb_mydb");

	$res=mysql_query("select * from tblDonor where phone='$phone'");
	if($row=mysql_fetch_row($res)){
		print "This Phone No. already exists, Please Check the number";
	}else{
		mysql_query("insert into tblDonor values('$phone','$bg','0.00','0.00')");
		print "Donor successfully Registered";
	}
	mysql_close($conn);

?>