<?php
	ini_set( 'error_reporting', E_ALL & ~E_NOTICE);
	require_once('auth.php');
?>
<?php
include('db.php');
$item=loadproduct($_GET['item']);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Inventory System</title>

<style>
body
{
font-family:Arial, Helvetica, sans-serif;
font-size:14px;
padding:10px;
}
.editbox
{
display:none
}
td
{
padding:7px;
border-left:1px solid #fff;
border-bottom:1px solid #fff;
}
table{
border-right:1px solid #fff;
}
.editbox
{
font-size:14px;
width:29px;
background-color:#ffffcc;

border:solid 1px #000;
padding:0 4px;
}
.edit_tr:hover
{
background:url(edit.png) right no-repeat #80C8E5;
cursor:pointer;
}
.edit_tr
{
background: none repeat scroll 0 0 #D5EAF0;
}
th
{
font-weight:bold;
text-align:left;
padding:7px;
border:1px solid #fff;
border-right-width: 0px;
}
.head
{
background: none repeat scroll 0 0 #91C5D4;
color:#00000;

}

</style>
<link rel="stylesheet" href="reset.css" type="text/css" media="screen" />

<link rel="stylesheet" href="tab.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script> 
<link href="tabs.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">

var popupWindow=null;

function child_open()
{ 

popupWindow =window.open('printform.php',"_blank","directories=no, status=no, menubar=no, scrollbars=yes, resizable=no,width=950, height=400,top=200,left=200");

}
</script>
</head>

<body bgcolor="#dedede">
 
<h1>Inventory System </h1>
<ol id="toc">
    <li><a href="tableedit#inventory"><span>Inventory</span></a></li>
    <li><a href="tableedit#sales"><span>Sales</span></a></li>
    <li><a href="tableedit#addpro"><span>Add Product</span></a></li>
 
	<li><a href="index.php"><span>Logout</span></a></li>
</ol>



<div class="content" id="addpro">

	<form enctype="multipart/form-data" action="updateproduct.php" method="post">
	<div style="margin-left: 48px;">
	Current image
	<a href="<?=$item['imagename']?>" /> <?=$item['imagename']?> </a>
	 <input  style="display: none"  value="<?=$item['imagename']?>" name="formerpic" type="text" />	
	 <input  style="display: none"  value="<?=$item['ind']?>" name="ind" type="text" />	
	 </div>
	<div style="margin-left: 48px;">
		Change image
	<input type="file" name="myimage">
	 	
	 </div>
	<div style="margin-left: 48px;">
	Product name:<input name="proname" value="<?=$item['item']?>" type="text" />
	</div>

	<br />
	<div style="margin-left: 97px;">
	Category:<input value="<?=$item['category']?>" name="category" type="text" />
	</div>
	<br />
	<div style="margin-left: 97px;">
	Values:<input value="<?=$item['value']?>" name="value" type="text" />
	</div>
	<br />
	<div style="margin-left: 97px;">
	keyword:<input value="<?=$item['kwd']?>" name="kwd" type="kwd" />
	</div>
	<br />

	<div style="margin-left: 48px;">
	Product description:<textarea value="<?=$item['item']?>"  style="height: 388px; width: 388px" name="description" type="text" > </textarea>
	</div>
	<br/>
	<div style="margin-left: 97px;">
	Price:<input name="price" value="<?=$item['price']?>" type="text" />
	</div>
	<br />
	<div style="margin-left: 97px;">
	Tag:<input  style="height: 88px; width: 288px"  value="<?=$item['tag']?>" name="tag" type="text" />
	</div>
	<br />
	<div style="margin-left: 97px;">
	Datasheet:<input  style="height: 88px; width: 288px"  value="<?=$item['datasheet']?>" name="datasheet" type="text" />
	</div>
	<br />
	<div style="margin-left: 97px;">
	Application:<input  style="height: 88px; width: 288px"  value="<?=$item['application']?>" name="application" type="text" />
	</div>

	<br />
	<div style="margin-left: 80px;">
	Quantity:<input name="qty" type="text" value="<?=$item['qtyleft']?>" qua/>
	</div>
	<div style="margin-left: 127px; margin-top: 14px;"><input name="" type="submit" value="UPDATE" /></div>
</form>
</div>


</body>
</html>
