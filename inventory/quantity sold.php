<?php
include("db.php");
$proid=$_POST['ITEM'];
$itemnumber=$_POST['itemnumber'];
$get = mysql_query("SELECT * FROM inventory WHERE id='$proid'");
$row = mysql_fetch_array($get);
$qty_sold = $row['qty_sold'];
$qty = $itemnumber + $qty_sold;
mysql_query("UPDATE inventory SET qty_sold='$qty' WHERE id='$proid'");
header("location: tableedit.php#page=quantitysold");
?>