<?php

if(@$_REQUEST['eid']==''){
	echo '<script language="javascript" type="text/javascript">
			window.location="index.php?cmd=5";	
		  </script>
		';
    exit(0);  
}

if($class->isThere("eid","emails"," eid=$_REQUEST[eid]")==0){
	echo '<script language="javascript" type="text/javascript">
			window.location="index.php?cmd=5";	
		  </script>
		';
    exit(0);  
}
if(isset($_REQUEST['btnSubmit'])){
		
	$bool=false;
	$class->begin();
	
			$eid=$class->sql_quote($_REQUEST['eid']);
			$name=$class->sql_quote($_REQUEST['tname']);
			$message=$_REQUEST['template'];
			
	
	$query="UPDATE emails SET 
							tname='$name',
							template='$message'
									WHERE eid='$eid'";
 	if($class->executeQuery($query)==false) $bool=true;
 	
 	
 	if($bool==true){
		$class->rollback();
	}else{
		
		$class->commit();
		header("Location: index.php?cmd=5&err=1");
		exit();
	}//end of if
			
			
}


	$query_user="SELECT * FROM emails WHERE eid=$_REQUEST[eid]";
	$result_user=$class->ResultSet($query_user);
	$row_user=$class->FetchObject($result_user);

	
	(@$_REQUEST['template'])?$template=$_REQUEST['template']:$template=$row_user->template;
	(@$_REQUEST['tname'])?$tname=$_REQUEST['tname']:$tname=$row_user->tname;
	
	require_once "fckeditor/fckeditor.php";
?>

<table width="80%" align="left" cellpadding="0" cellspacing="0" border="0">
	<tr>
    	<td>
        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="10" align="left" valign="top" background="images/00-mid.jpg"><img src="images/001.jpg" width="6" height="28" /></td>
                <td width="881" align="centerLEFT" valign="middle" background="images/00-mid.jpg" class="tab-text">Edit Template</td>
                <td width="63" align="right" valign="top" background="images/00-mid.jpg" ><img src="images/002.jpg" width="6" height="28" /></td>
              </tr>
	        </table>
        </td>
    </tr>
    <tr>
    	<td>
    		
        	<form name="frm" id="frm" action="index.php?cmd=6" method="post" enctype="multipart/form-data">
      		<input type="hidden" name="eid" class="required" value="<?=@$_REQUEST['eid']?>"  />      	
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
                
					<td class="black11bold AlignRight"> Name : </td>
					<td><input type="text" name="tname" class="required" value="<?=@$tname?>"  /></td>
				</tr>
			 <tr><td colspan="2" height="5"></td></tr>
                    <tr>
                       <td class="black11bold AlignRight">Mail Content</td>
                        <td >
						<?php
                                $oFCKeditor = new FCKeditor('template') ;							
                                $oFCKeditor->BasePath	= "fckeditor/" ;
                                $oFCKeditor->Value		=  $template;
                                $oFCKeditor->Width = '700';
                                $oFCKeditor->Height = '300';
								$oFCKeditor->Class = 'required';
                                $oFCKeditor->Create();
                            ?>
						</td>
                    </tr>
				
				<tr>
                <td width="10%">&nbsp;</td>
                        <td >&nbsp;</td>
          <td>&nbsp;</td>
                  </tr>
							
				<tr><td colspan="2" height="5"></td></tr>
                    
                <tr><td></td><td><input type="submit" name="btnSubmit" value=" Update " class="button" />&nbsp;&nbsp;<input type="button" name="btnCancel" value=" Cancel " class="button" onclick="window.location='index.php?cmd=5';" /></td></tr>
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
