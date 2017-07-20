<?php
	$lat=$_GET["lat"];
	$lng=$_GET["lng"];
	$bg=$_GET["bg"];

	$lat=substr($lat,0,5);
	$lng=substr($lng,0,5);
	$conn=mysql_connect("75.98.175.86","myspaceb_root","root123");
	mysql_select_db("myspaceb_mydb");
	$sql="select * from tblDonor where lat like '%$lat%' and lng like '%$lng%' and bg='$bg'";
	//print $sql;
	$res=mysql_query($sql);
	$data="";
	while($row=mysql_fetch_row($res)){
		$data=$data . "_" . $row[0];
	}
	mysql_close($conn);
	print $data;
?>