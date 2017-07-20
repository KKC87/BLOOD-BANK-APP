<?php

	$bid=$_GET["txtbid"];
	$apos=$_GET["txtapos"];
	$aneg=$_GET["txtaneg"];

	$bpos=$_GET["txtbpos"];
	$bneg=$_GET["txtbneg"];

	$abpos=$_GET["txtabpos"];
	$abneg=$_GET["txtabneg"];

	$opos=$_GET["txtopos"];
	$oneg=$_GET["txtoneg"];

	//$conn=mysql_connect("localhost","root","root123");
	$conn=mysql_connect("75.98.175.86","myspaceb_root","root123");
	mysql_select_db("myspaceb_mydb");

	mysql_query("UPDATE tblbloodstock set apos='$apos',aneg='$aneg',bpos='$bpos',bneg='$bneg',abpos='$abpos',abneg='$abneg',opos='$opos',oneg='$oneg' where bid='$bid'");

	print "<font color=blue size=6><center>Blood bank Data successfully updated</center></font>";
	mysql_close($conn);

?>