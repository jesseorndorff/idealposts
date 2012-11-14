<?php
if(@$_REQUEST['id']==''){
	echo '<script language="javascript" type="text/javascript">
			window.location="index.php?cmd=10";	
		  </script>
		';
    exit(0);  
}

if($class->isThere("id","users"," id=$_REQUEST[id]")==0){
	echo '<script language="javascript" type="text/javascript">
			window.location="index.php?cmd=10";	
		  </script>
		';
    exit(0);  
}
if(isset($_REQUEST['btnSubmit'])){
		
	$bool=false;
	$class->begin();
	
			$id=$class->sql_quote($_REQUEST['id']);
			$user_name=$class->sql_quote($_REQUEST['user_name']);
			$blog_name=$class->sql_quote($_REQUEST['blog_name']);
			$email=$class->sql_quote($_REQUEST['email']);
			
	
	$query="UPDATE users SET 
							user_name='$user_name',
							blog_name = '$blog_name',
							email='$email'
									WHERE id='$id'";
 	if($class->executeQuery($query)==false) $bool=true;
 	
 	
 	if($bool==true){
		$class->rollback();
	}else{
		
		$class->commit();
		header("Location: index.php?cmd=10&err=2");
		exit();
	}//end of if
			
			
}


	$query_user="SELECT * FROM users WHERE id=$_REQUEST[id]";
	$result_user=$class->ResultSet($query_user);
	$row_user=$class->FetchObject($result_user);

	
	(@$_REQUEST['email'])?$email=$_REQUEST['email']:$email=$row_user->email;
	(@$_REQUEST['user_name'])?$user_name=$_REQUEST['user_name']:$user_name=$row_user->user_name;
	(@$_REQUEST['blog_name'])?$blog_name=$_REQUEST['blog_name']:$blog_name=$row_user->blog_name;
	
	
?>

<table width="80%" align="left" cellpadding="0" cellspacing="0" border="0">
	<tr>
    	<td>
        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="10" align="left" valign="top" background="images/00-mid.jpg"><img src="images/001.jpg" width="6" height="28" /></td>
                <td width="881" align="centerLEFT" valign="middle" background="images/00-mid.jpg" class="tab-text">Edit Customer</td>
                <td width="63" align="right" valign="top" background="images/00-mid.jpg" ><img src="images/002.jpg" width="6" height="28" /></td>
              </tr>
	        </table>
        </td>
    </tr>
    <tr>
    	<td>
    		
        	<form name="frm" id="frm" action="index.php?cmd=9" method="post" enctype="multipart/form-data">
      		<input type="hidden" name="id" class="required" value="<?=@$_REQUEST['id']?>"  />      	
				<table width="100%" align="center" cellpadding="0" cellspacing="5" border="0">
                
                    <tr><td colspan="2" height="15"></td></tr>
                    <?php
						if(@$_REQUEST['err']!=''){
							$err=$_REQUEST['err'];
						}
						if($err!=''){
					?>
                    	<tr>
                            <td colspan="2" class="error"><?=$class->errorMassage($err);?></td>
                        </tr>
                        <tr><td colspan="2" height="5"></td></tr>
					<?php
					}
					?>
					
					<?php
						if($msg!=''){
					?>
                    	<tr>
                            <td colspan="2" class="error"><?=$msg;?></td>
                        </tr>
                        <tr><td colspan="2" height="5"></td></tr>
					<?php
					}
					?>
				<tr>
	   <td width="10%">&nbsp;</td>
        <td height="30" align="left" valign="middle" class="blue">Blog Name:</td>
        <td align="left" valign="middle"><input name="blog_name" type="text" class="input2 required" value="<?=@$blog_name?>" /></td>
      </tr>
				<tr>
                <td width="10%">&nbsp;</td>
					<td > Email : </td>
					<td><input type="text" name="email" class="required validate-email" value="<?=@$email?>"  /></td>
				</tr>
				
				<tr>
                <td width="10%">&nbsp;</td>
					<td > Username : </td>
					<td><input type="text" name="user_name" class="required" value="<?=@$user_name?>"  /></td>
				</tr>
			
				
				<tr>
                <td width="10%">&nbsp;</td>
                        <td >&nbsp;</td>
          <td>&nbsp;</td>
                  </tr>
							
				<tr><td colspan="2" height="5"></td></tr>
                    
                <tr><td></td><td><input type="submit" name="btnSubmit" value=" Update " class="button" />&nbsp;&nbsp;<input type="button" name="btnCancel" value=" Cancel " class="button" onclick="window.location='index.php?cmd=10';" /></td></tr>
                </table>
                
          </form>
        </td>
    </tr>
</table>
<script type="text/javascript" language="javascript">

	function formCallback(result, form) {
		window.status = "valiation callback for form '" + form.id + "': result = " + result;
	}
	var valid = new Validation('frm', {immediate : true, onFormValidate : formCallback});
	
</script>
