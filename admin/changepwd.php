<?php
//$error=new errorMsg();
//$class=new functions();

if(isset($_REQUEST['btnview'])){

$oldpwd=$_REQUEST['oldpwd'];
//$uid=$_REQUEST['uid'];

$sql="select username from adminlogin where mpass='".md5($oldpwd)."'";
$result=$class->ResultSet($sql);
	if($class->NumRows($result)>0){
		$row=$class->FetchObject($result);
		
		$bool=false;
		$class->begin();	
		$sql="update adminlogin set mpass='".@md5(trim($_REQUEST['password']))."' where adminID=1";//.@$_REQUEST['clientID'] ;
			//echo $sql;	die();
			
			if($class->executeQuery($sql)==false)$bool=true;
				
			if($bool==true){
				$class->rollback();
				header("Location: index.php?cmd=14&err=0&mode=View");
				exit();
			}else{
				$class->commit();
				header("Location: index.php?cmd=3&err=2");
				exit();
			}//end of if
		
	}else{
		
		header("Location: index.php?cmd=14&err=39&mode=View");
		exit;
	}	
		
}//end of if
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript">
function check(){
	var header="Sign Up Form \n-----------------------------------------------\n";
	var message="";
	var flage;
	flage=false;

//////////////////////////end of email validation
		if(document.frm.password.value==""){
			message=message+"\n-> Please Enter Password \n";
			flage=true;
		}
		if(document.frm.password.value!=document.frm.confirmpassword.value){
			message=message+"-> Confirm Password Not Macthed with Password\n";
			flage=true;
		}
	
	if(flage==true){
		alert(header+message);
		return false;
	}//end of if
	
}//end of functions
</script>
</head>

<body>
<form name="frm" action="" method="post" enctype="multipart/form-data">

<?php if(@$_REQUEST['mode']=="View"){
//echo $_REQUEST['mode'];
?>

  <table width="100%" border="0" cellpadding="0" cellspacing="0">
     <tr>
        <td align="left" valign="top" colspan="1"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="10" align="left" valign="top" background="images/00-mid.jpg"><img src="images/001.jpg" width="6" height="28" /></td>
            <td width="134" align="center" valign="middle" background="images/00-mid.jpg" class="tab-text"><?=$btn;?>
        User</td>
            <td width="10" align="right" valign="top" background="images/00-mid.jpg" ><img src="images/002.jpg" width="6" height="28" /></td>
          </tr>
        </table></td>
    </tr>
	    <tr>
        <td height="3" bgcolor="B9B6B6" colspan="2"></td>
      </tr>
    <tr> 
      <td colspan="2" height="10" align="right"></td>
    </tr>
    <?php if(isset($_REQUEST['err'])){ ?>
    <tr> 
      <td colspan="2" align="left" class="error"><?php echo $class->errorMassage($_REQUEST['err']); ?></td>
    </tr>
    <?php }?>
    <tr> 
      <td colspan="2" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="3">
          <tr> 
            <td colspan="2"><strong>Login Infomration</strong></td>
          </tr>
		  <?
			$sql="select username from adminlogin where adminID=1";//.md5($oldpwd)."'";
			$result=$class->ResultSet($sql);
				if($class->NumRows($result)>0){
					$row=$class->FetchObject($result);
		  ?>
          <tr>
            <td align="right" nowrap="nowrap">User Name   : &nbsp;</td>
            <td><input name="uid" type="text" class="textbox" id="uid" value="<? echo $row->username; ?>" size="35"></td>
          </tr>
		  <?
		  	}else{
			}
		  ?>
          <tr> 
            <td width="12%" align="right" nowrap="nowrap">Old Password  : &nbsp;</td>
            <td width="32%"><input name="oldpwd" type="text" class="textbox" id="oldpwd" value="" size="35"></td>
          </tr>
				<tr>
				 <td align="right" nowrap="nowrap"> New Password : &nbsp;</td>
	             <td><input type="password" size="35" name="password" class="textbox" ></td> 
				</tr>
			    <tr>
				 <td align="right" nowrap="nowrap">Confirm Password : &nbsp;</td>
	             <td><input type="password" size="35" name="confirmpassword" class="textbox" value=""></td>     
				</tr>
     
	    </table></td>
    </tr>
       <tr> 
      <td  align="right" nowrap="nowrap" width="32%">&nbsp;</td>
      <td style="padding-left:17px" ><input type="submit" size="35" name="btnview" value="Submit" class="button" onClick="return check();"></td>
    </tr>
   
    <tr> 
      <td width="32%" align="right">&nbsp;</td>
      <td width="68%">&nbsp;</td>
    </tr>
    
  </table>
<?php }//end of mode if ?>

</form>
</body>
</html>