<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen, projection, tv" />
<link rel="stylesheet" href="css/style-print.css" type="text/css" media="print" />
<style type="text/css">
<!--
body {
	background-image: url();
}
.style6 {
	color: #000000;
	font-family: "Courier New", Courier, monospace;
	font-size: 18px;
}
.style8 {font-size: 14px; font-family: "Courier New", Courier, monospace; }
-->
</style>
</head>
<body>
<div id="wrapper"><div class="content"><div class="column-left"></div>
    <div id="skip-menu"></div>
    <div class="column-right">
      <div class="box">
        <div class="box-top"></div>
        <div>
		<center>
    	  <p><span class="style6"><u>List of all the Blood Banks and their Stocks</u></span>
    	  </p>
    	  <table width="992" height="27" border="1" cellpadding="0" cellspacing="0">
    	    <tr>
    	      <td width="51" height="25"  bgcolor="#FFCC00"><div align="center" class="style8">
    	        <div align="center">Sl No</div>
    	      </div></td>
        	  <td width="70"  bgcolor="#FFCC00"><div align="center" class="style8">
        	    <div align="center">Bank ID</div>
        	  </div></td>
              <td width="128"  bgcolor="#FFCC00"><div align="center" class="style8">
                <div align="center">Contact Person</div>
              </div></td>
              <td width="91"  bgcolor="#FFCC00"><div align="center"><span class="style8">Contact No.</span></div></td>
              <td width="72"  bgcolor="#FFCC00"><div align="center"><span class="style8">Latitude</span></div></td>
              <td width="87"  bgcolor="#FFCC00"><div align="center"><span class="style8">Longitude</span></div></td>
              <td width="57"  bgcolor="#FFCC00"><div align="center"><span class="style8">A+ve</span></div></td>
              <td width="57"  bgcolor="#FFCC00"><div align="center"><span class="style8">A-ve</span></div></td>
              <td width="59"  bgcolor="#FFCC00"><div align="center"><span class="style8">B+ve</span></div></td>
              <td width="56"  bgcolor="#FFCC00"><div align="center"><span class="style8">B-ve</span></div></td>
              <td width="61"  bgcolor="#FFCC00"><div align="center"><span class="style8">AB+ve</span></div></td>
              <td width="57"  bgcolor="#FFCC00"><div align="center"><span class="style8">AB-ve</span></div></td>
              <td width="52"  bgcolor="#FFCC00"><div align="center"><span class="style8">O+ve</span></div></td>
              <td width="64"  bgcolor="#FFCC00"><div align="center" class="style8">
                <div align="center">O-ve</div>
              </div></td>
              </tr>
    	    <font color="#FFFF00">
    	      <?php
	//$db=mysql_connect("localhost","root","root123");
	$conn=mysql_connect("75.98.175.86","myspaceb_root","root123");
	mysql_select_db("myspaceb_mydb");
	$rs=mysql_query("SELECT * FROM tblbloodbank b1,tblbloodstock b2 where b1.bid=b2.bid");
	$i=0;
	while($row=mysql_fetch_row($rs)){
		echo "<tr align=center>";
		$i=$i+1;
		$bid=$row[0];
		echo "<td>$i</td>";
		echo "<td>$bid</td>";
		echo "<td>$row[2]</td>";
		echo "<td>$row[6]</td>";
		echo "<td>$row[4]</td>";
		echo "<td>$row[5]</td>";
		echo "<td>$row[8]</td>";
		echo "<td>$row[9]</td>";
		echo "<td>$row[10]</td>";
		echo "<td>$row[11]</td>";
		echo "<td>$row[12]</td>";
		echo "<td>$row[13]</td>";
		echo "<td>$row[14]</td>";
		echo "<td>$row[15]</td>";

		echo "</tr>";
	}
		?>
    	      </font>
  	      </table>
    	  </font><br />
    	</center>


<?php

	mysql_close($conn);
?>
        </div>
      </div>
      </div>
    <div class="cleaner">&nbsp;
      <div align="center"><a href="adminhome.html">BACK</a></div>
    </div>
  </div>
</div>
<div align=center></div>
</body>
</html>
