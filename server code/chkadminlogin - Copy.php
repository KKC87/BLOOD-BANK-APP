<?php
    $uid=$_GET["txtadminid"];
	$pwd=$_GET["txtadminpwd"];
    if($uid=='admin' && $pwd=='a123')			
			header("Location: adminhome.html");
	else
		print "<font color=red size=6> <center>Invalid Admin ID or Password</center></font>";
 ?>