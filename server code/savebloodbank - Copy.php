<?php

	$bid=$_GET["txtbid"];
	$pwd=$_GET["txtpwd"];
	$cperson=$_GET["txtcperson"];
	$cno=$_GET["txtcno"];
	$address=$_GET["txtaddress"];
	$lat=$_GET["txtlat"];
	$lng=$_GET["txtlng"];


	$conn=mysql_connect("75.98.175.86","myspaceb_root","root123");
	//$conn=mysql_connect("localhost","root","root123");

	mysql_select_db("myspaceb_mydb");

	$res=mysql_query("select * from tblbloodbank where bid='$bid'");
	if($row=mysql_fetch_row($res)){
		print "<font color=red size=5><center>A Blood Bank with the same ID already exists. Please use a different Blood Bank ID</center></font>";
	}else{
		mysql_query("insert into tblbloodbank values('$bid','$pwd','$cperson','$address','$lat','$lng','$cno')");
		mysql_query("insert into tblbloodstock values('$bid','0','0','0','0','0','0','0','0')");

		print "<font color=blue size=6><center>Blood Bank successfully added to the database</center></font>";
	}
	mysql_close($conn);

?>