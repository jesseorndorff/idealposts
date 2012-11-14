<?php
if (isset($_REQUEST['btnLogin'])){
	$validate = new Validate();	
	$name=trim($_REQUEST['username']);
	$password=$_REQUEST['password'];
	 

	$sql="select adminID from adminlogin where username='".$class->sql_quote($name)."' and mpass='".md5($password)."'";
	$result=mysql_query($sql,$con);
	if(mysql_num_rows($result)>0){
		$row=mysql_fetch_object($result);
		$_SESSION['adminID']=$row->adminID;
		$update="update adminlogin set lastlogin='".date("Y-m-d H:i:s")."' where adminID=".$_SESSION['adminID'];
		$Result=$class->executeQuery($update,$con);
		header("Location: index.php?cmd=2");
		exit;
	}else{
		header("Location: index.php?err=5");
		exit;
	}
		
}//end of btn if

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title><?php echo ADMINTITLE;?></title>
<style type="text/css">
td {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #333333;
}
tr {

	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #333333;
}
tr .bgInnerTR{
	background-color:#660000;

}
td .textHeading{
	color:#FFFFFF;
	font-size: 13px;
	font-weight: bold;
}
td .tdHeading{
	color:#000033;
	font-size: 11px;
	font-weight: bold;
}
.button {
	font-size: 8pt;
/*	background: #93AABC;*/
	color:#000000;  background: url(images/btn1.gif);
	height:20px; width:73px;
	
	text-decoration:none;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	border: none; 
}
.error{
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	/*font-weight: bold;*/
	color: #FF0000;
}
.textbox {
	/*font-maily: Verdana, Tahoma, Helvetica, Arial;*/
	/*font-size: 8pt;
	background: #FFFFFF;
	color:#000000;
	text-decoration:none;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	border: 1px solid #003399;
*/
}
-->
</style>
<link href="style.css" rel="stylesheet" type="text/css">
<link href="images/style.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/functions.js"></script>
</head>

<body>



<table width="100%" align="center" cellpadding="0" cellspacing="0" height="100%">

<tr>

<td width="100%" height="480" valign="middle">


	<table align="center">
	 <tr>
		 <td  valign="top" align="center" ><table width="453" border="0" align="center" cellpadding="0" cellspacing="0">
			 <tr>
			   <td height="159" align="left" valign="top" background="images/bx.jpg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
			<td align="left" valign="top" colspan="1"  ><table width="100%" border="0" cellpadding="0"   cellspacing="0">
			  <tr>
				<td width="10" align="left" valign="top" background="images/00-mid.jpg"><img src="images/001.jpg" width="6" height="28" /></td>
				<td width="881" align="left" valign="middle" background="images/00-mid.jpg" class="tab-text">Please Login </td>
				<td width="63" align="right" valign="top" background="images/00-mid.jpg" ><img src="images/002.jpg" width="6" height="28" /></td>
			  </tr>
			</table></td>
		  </tr>
			<tr>
			<td height="3" bgcolor="B9B6B6" colspan="2"></td>
		  </tr>
			
				 
					<tr>
					 <td  height="10"></td>
				   </tr>
					  <tr> 
											<td ><table width="100%"  border="0" cellpadding="0" cellspacing="0">
												<tr> 
												  <td > <form name="frm" action="index.php?cmd=1" method="post">
													  <table width="300" border="0" align="center" cellpadding="1" cellspacing="1">
														<?php if(isset($_REQUEST['err'])){ ?>
														<tr> 
														  <td  colspan="2" class="error"><?php echo $class->errorMassage($_REQUEST['err']);?></td>
														</tr>
														<?php } ?>
														<tr> 
														  <td  width="44%" class="style9">Username:</td>
														  <td  width="56%"><input type="text" name="username" size="21" tabindex="1" class="textbox"></td>
														</tr>
														<tr> 
														  <td  class="style9">Password:</td>
														  <td ><input type="password" name="password" size="21" tabindex="2" class="textbox"></td>
														</tr>
														<tr> 
														  <td  class="style9">&nbsp;</td>
														  <td ><input name="btnLogin" type="submit" id="login" value="Login" class="button" onClick="return checkMethod();"></td>
														</tr>
													  </table>
													</form></td>
												</tr>
											  </table></td>
										  </tr>
				   
			   </table></td>
			 </tr>
		 </table></td>
	   </tr>
	
	</table>
</td></tr></table>
</body></html>