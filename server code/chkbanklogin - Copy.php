<?php
    $uid=$_GET["txtbankuid"];
   $pwd=$_GET["txtbankpwd"];
   //$conn = mysql_connect("localhost", "root", "root123");
    $conn=mysql_connect("75.98.175.86","myspaceb_root","root123");
   
   $sql = "SELECT * FROM tblbloodbank where bid='".$uid."' AND pwd='".$pwd."'";

    mysql_select_db('myspaceb_mydb');
    $retval = mysql_query( $sql, $conn );
    if($row = mysql_fetch_array($retval, MYSQL_ASSOC))
	header("Location: bankhome.php?bid=" . $uid);
else
	print "<font color=red size=6> <center>Invalid Bank ID or Password</center></font>";

   mysql_free_result($retval);
   mysql_close($conn);
    ?>
