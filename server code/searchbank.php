<?php
	$lat=$_GET["lat"];
	$lng=$_GET["lng"];
	$bg=$_GET["bg"];

	$lat=substr($lat,0,3);
	$lng=substr($lng,0,3);
	$conn=mysql_connect("75.98.175.86","myspaceb_root","root123");
	mysql_select_db("myspaceb_mydb");
	//$sql="select * from tblbloodbank where blat like '%$lat%' and blng like '%$lng%' and bg='$bg'";
	if ($bg=="A+ve"){
		$sql="select * from tblbloodbank bb,tblbloodstock bs where bb.blat like '%$lat%' and bb.blng like '%$lng%' and bb.bid=bs.bid";
		$res=mysql_query($sql);
		$data="";
		while($row=mysql_fetch_row($res)){
			$data= $row[6]. "_" . $row[8]."_".$data . "_" ;
		}
	}

	if ($bg=="A-ve"){
		$sql="select * from tblbloodbank bb,tblbloodstock bs where bb.blat like '%$lat%' and bb.blng like '%$lng%' and bb.bid=bs.bid";
		$res=mysql_query($sql);
		$data="";
		while($row=mysql_fetch_row($res)){
			$data= $row[6]. "_" . $row[9]."_".$data . "_" ;
		}
	}
		if ($bg=="B+ve"){
		$sql="select * from tblbloodbank bb,tblbloodstock bs where bb.blat like '%$lat%' and bb.blng like '%$lng%' and bb.bid=bs.bid";
		$res=mysql_query($sql);
		$data="";
		while($row=mysql_fetch_row($res)){
			$data= $row[6]. "_" . $row[10]."_".$data . "_" ;
		}
	}
		if ($bg=="B-ve"){
		$sql="select * from tblbloodbank bb,tblbloodstock bs where bb.blat like '%$lat%' and bb.blng like '%$lng%' and bb.bid=bs.bid";
		$res=mysql_query($sql);
		$data="";
		while($row=mysql_fetch_row($res)){
			$data= $row[6]. "_" . $row[11]."_".$data . "_" ;
		}
	}
		if ($bg=="AB+ve"){
		$sql="select * from tblbloodbank bb,tblbloodstock bs where bb.blat like '%$lat%' and bb.blng like '%$lng%' and bb.bid=bs.bid";
		$res=mysql_query($sql);
		$data="";
		while($row=mysql_fetch_row($res)){
			$data= $row[6]. "_" . $row[12]."_".$data . "_" ;
		}
	}
		if ($bg=="AB-ve"){
		$sql="select * from tblbloodbank bb,tblbloodstock bs where bb.blat like '%$lat%' and bb.blng like '%$lng%' and bb.bid=bs.bid";
		$res=mysql_query($sql);
		$data="";
		while($row=mysql_fetch_row($res)){
			$data= $row[6]. "_" . $row[13]."_".$data . "_" ;
		}
	}
		if ($bg=="O+ve"){
		$sql="select * from tblbloodbank bb,tblbloodstock bs where bb.blat like '%$lat%' and bb.blng like '%$lng%' and bb.bid=bs.bid";
		$res=mysql_query($sql);
		$data="";
		while($row=mysql_fetch_row($res)){
			$data= $row[6]. "_" . $row[14]."_".$data . "_" ;
		}
	}
		if ($bg=="O-ve"){
		$sql="select * from tblbloodbank bb,tblbloodstock bs where bb.blat like '%$lat%' and bb.blng like '%$lng%' and bb.bid=bs.bid";
		$res=mysql_query($sql);
		$data="";
		while($row=mysql_fetch_row($res)){
			$data= $row[6]. "_" . $row[15]."_".$data . "_" ;
		}
	}







	mysql_close($conn);
	print $data;
?>
