<?php

	$phone=$_GET["phone"];
	$lat=$_GET["lat"];
	$lng=$_GET["lng"];


	$conn=mysql_connect("75.98.175.86","myspaceb_root","root123");
	mysql_select_db("myspaceb_mydb");

	$res=mysql_query("select * from tblDonor where phone='$phone'");
	if($row=mysql_fetch_row($res)){
		mysql_query("update tblDonor set lat='$lat',lng='$lng' where phone='$phone'");
		print "Location Updated";
	}else{
		print "Donor not Registered";
	}
	mysql_close($conn);

?>