<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
}
.style1 {color: #FFFFFF}
.style2 {
	font-size: 24px;
	font-family: "Courier New", Courier, monospace;
}
.style3 {font-family: "Courier New", Courier, monospace}
-->
</style></head>

<body>
<?php
	$bid=$_GET["bid"];
	//$conn = mysql_connect("localhost", "root", "root123");
	$conn=mysql_connect("75.98.175.86","myspaceb_root","root123");
	mysql_select_db('myspaceb_mydb');
	$sql="select * from tblbloodstock where bid='$bid'";
	//print $sql;
    $retval = mysql_query( $sql, $conn );
    $row=mysql_fetch_row($retval);
	$apos=$row[1];
	$aneg=$row[2];
	$bpos=$row[3];
	$bneg=$row[4];
	$abpos=$row[5];
	$abneg=$row[6];
	$opos=$row[7];
	$oneg=$row[8];

?>

<div align="center">
  <table width="580" border="0">
    <tr>
      <td width="640" height="19"><table width="547" border="0" align="center">
          <tr>
            <td>
            <form method="get" action="updatebloodstock.php">
            <p align="center" class="style2">Welcome .......<?php print $bid; ?>

		</p>
            <table width="367" height="422" border="1" align="center" cellspacing="0" bordercolor="#000000">
              <tr bgcolor="#FF6600">
                <td colspan="2" bgcolor="#336699"><div align="center" class="style1">Blood Bank Information Update</div></td>
              </tr>
              <tr bgcolor="#66FFFF">
                <td width="138"><div align="right"><span class="style3">A+ve Units:</span></div></td>
                <td width="182"><label>
                  &nbsp;&nbsp;
                  <input type="text" name="txtapos" id="txtapos" value="<?php print $apos; ?>"/>
                </label></td>
              </tr>
              <tr bgcolor="#66CCFF">
                <td><div align="right"><span class="style3">A-ve Units:&nbsp;</span></div></td>
                <td>&nbsp;&nbsp;
                  <input type="text" name="txtaneg" id="txtaneg" value="<?php print $aneg; ?>" /></td>
              </tr>
              <tr bgcolor="#66FFFF">
                <td><div align="right"><span class="style3">B+ve Units:</span></div></td>
                <td>&nbsp;&nbsp;
                  <input name="txtbpos" type="text" id="txtbpos" value="<?php print $bpos; ?>" /></td>
              </tr>
              <tr bgcolor="#66CCFF">
                <td><div align="right"><span class="style3">B-ve Units:</span></div></td>
                <td>&nbsp;&nbsp;
                  <input name="txtbneg" type="text" id="txtbneg" value="<?php print $bneg; ?>" /></td>
              </tr>
              <tr bgcolor="#66FFFF">
                <td><div align="right"><span class="style3">AB+ve Units:</span></div></td>
                <td>&nbsp;&nbsp;
                  <input name="txtabpos" type="text" id="txtabpos" value="<?php print $abpos; ?>" /></td>
              </tr>
              <tr bgcolor="#66CCFF">
                <td><div align="right"><span class="style3">AB-ve Units:</span></div></td>
                <td>&nbsp;&nbsp;
                  <input name="txtabneg" type="text" id="txtabneg" value="<?php print $abneg; ?>" /></td>
              </tr>
              <tr bgcolor="#66FFFF">
                <td><div align="right"><span class="style3">O+ve Units:</span></div></td>
                <td>&nbsp;&nbsp;
                  <input name="txtopos" type="text" id="txtopos" value="<?php print $opos; ?>" /></td>
              </tr>
              <tr bgcolor="#66CCFF">
                <td><div align="right"><span class="style3">O-ve Units:</span></div></td>
                <td><label>&nbsp;&nbsp;
                  <input name="txtoneg" type="text" id="txtoneg" value="<?php print $oneg; ?>" />
                </label></td>
              </tr>
              <tr>
                <td colspan="2"><label>
                    <div align="center">
                    <input type="hidden" id="txtbid" name="txtbid" value="<?php print $bid; ?>"/>
                      <input type="submit" name="button2" id="button2" value="Update" />
                    </div>
                  </label></td>
              </tr>
            </table>
            </form>            </td>
          </tr>
        </table>
        <p align="center"><span class="style3"><a href="index.html">LOGOUT</a>&nbsp;</span></p>        </td>
    </tr>
  </table>
</div>
</body>
</html>
