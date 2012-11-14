<?php
include "include.php";
if(isset($_REQUEST['cmd'])){
	$cmd=$_REQUEST['cmd'];
}else{
	$cmd=1;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title><?php echo ADMINTITLE;?></title>
	<link rel="stylesheet" media="screen" type="text/css" href="style.css" />
	<script language="javascript" src="../js/prototype.js"></script>
    <script language="javascript" src="../js/validation.js"></script>
    <script language="javascript" src="../js/effects.js"></script>
    <script language="javascript" src="../js/ajax_functions.js"></script>
    <script type="text/javascript" src="js/functions.js"></script>
    <script type="text/javascript" src="js/calendar.js"></script>
	<script type="text/javascript" src="js/calendar-en.js"></script>
	<script type="text/javascript" src="js/calendar-setup.js"></script>
	<script type="text/JavaScript">
		<!--
		function MM_swapImgRestore() { //v3.0
		  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
		}
		
		function MM_preloadImages() { //v3.0
		  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
			var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
			if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
		}
		
		function MM_findObj(n, d) { //v4.01
		  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
			d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
		  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
		  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
		  if(!x && d.getElementById) x=d.getElementById(n); return x;
		}
		
		function MM_swapImage() { //v3.0
		  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
		   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
		}
		//-->
</script>
<link href="images/style.css" rel="stylesheet" type="text/css" />

</head>

<body>
<table width="100%" align="center" cellpadding="0" cellspacing="0">
<tr><td colspan="2" width="100%"><?php if($cmd!=1){	include "header.php";} ?></td>
<tr><td colspan="2" height="20"></td></tr>
<?php if($cmd!=1){?>
<tr>
	<td width="25%" align="center" valign="top"><?php include "leftmenu.php"; ?></td>
	<td width="75%" align="center" valign="top">
		<?php 
			$PageName=$class->ReturnPageNameAdmin($cmd);
			require $PageName;
		?>
	</td>
</tr>
<?php }else{ ?>
<tr>
	<td align="center">
		<?php $PageName=$class->ReturnPageNameAdmin($cmd);
			require $PageName;
		?>
	</td>
</tr>
<?php } ?>
<tr><td colspan="2" height="20"></td></tr>
<tr><td colspan="2" width="100%">
<?php
if($cmd!=1){
	include "footer.php";
}

?>
</td></tr>

</table>