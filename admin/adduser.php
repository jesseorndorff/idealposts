<?php
if(isset($_REQUEST['btnSubmit'])){
		
	$bool=false;
	$class->begin();
		$msg = '';
		$user_name=$class->sql_quote($_REQUEST['user_name']);
		$email=$class->sql_quote($_REQUEST['email']);
		$blog_name=$class->sql_quote($_REQUEST['blog_name']);
		$password=md5($class->sql_quote($_REQUEST['password']));
		if($class->isThere("email","users","email='".$email."'")){
			$msg="Email '$email' is already exists in our database";
		}
	
	
	if($msg==''){
		
			$query="INSERT INTO users(id,user_name,blog_name,email,password,active)
								VALUES('','$user_name','$blog_name','$email','$password','1')";
		
			if($class->executeQuery($query)==false) $bool=true;
			
			
			if($bool==true){
				$class->rollback();
			}else{
				
				$class->commit();
				header("Location: index.php?cmd=10&err=1");
				exit();
			}//end of ifmsg = 'o yeah baby';
		}
			
			
		
	 	
	 	
	}else{
		$class->rollback();
	}		
			


	
?>

<table width="80%" align="left" cellpadding="0" cellspacing="0" border="0">
	<tr>
    	<td>
        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="10" align="left" valign="top" background="images/00-mid.jpg"><img src="images/001.jpg" width="6" height="28" /></td>
                <td width="881" align="centerLEFT" valign="middle" background="images/00-mid.jpg" class="tab-text">Add Customer</td>
                <td width="63" align="right" valign="top" background="images/00-mid.jpg" ><img src="images/002.jpg" width="6" height="28" /></td>
              </tr>
	        </table>
        </td>
    </tr>
    <tr>
    	<td>
    		
        	<form name="frm" id="frm" action="index.php?cmd=8" method="post" enctype="multipart/form-data">
            	
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
        <td align="left" valign="middle"><input name="blog_name" type="text" class="input2 required" value="<?=$_REQUEST['blog_name']?>" /></td>
      </tr>
				<tr>
	   <td width="10%">&nbsp;</td>
        <td height="30" align="left" valign="middle" class="blue">E-mail:</td>
        <td align="left" valign="middle"><input name="email" type="text" class="input2 required" value="<?=$_REQUEST['email']?>" /></td>
      </tr>
       <tr>
	 	 <td width="10%">&nbsp;</td>
        <td width="34%" height="30" align="left" valign="middle" class="blue">User Name: </td>
        <td width="56%" align="left" valign="middle"><input name="user_name" type="text" class="input2 required" value="<?=$_REQUEST['user_name']?>" /></td>
      </tr>
      <tr>
	 	 <td width="10%">&nbsp;</td>
        <td width="34%" height="30" align="left" valign="middle" class="blue">Password: </td>
        <td width="56%" align="left" valign="middle"><input name="password" type="text" class="input2 required" value="<?=$_REQUEST['password']?>" /></td>
      </tr>
     
                     
        <tr><td colspan="2" height="5"></td></tr>
            
        <tr><td></td><td><input type="submit" name="btnSubmit" value=" Save " class="button" />&nbsp;&nbsp;<input type="button" name="btnCancel" value=" Cancel " class="button" onclick="window.location='index.php?cmd=10';" /></td></tr>
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
