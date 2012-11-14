<?php

if(isset($_REQUEST['btnSubmit'])){
	
	if($_FILES['filee']['name']){
			
		$file=rand(0,100)."-".$_FILES['filee']['name'];
		$desination="../images/".$file;
		$source=$_FILES['filee']['tmp_name'];
		if(!move_uploaded_file($source,$desination))
		{
			die('Error in Image Uploading');
		}
		
	}///end of Book File Name if

	/*include('template_header.php');	
	include('template_footer.php');	*/
	$content = $_REQUEST['mail_content'];
	$emails = '';
	for($i=0;$i<sizeof($_REQUEST['users']);$i++)
		$emails .= $_REQUEST['users'][$i].',';

	$data = $mail_content_header.$content.$mail_content_footer;//echo $data;
	$m= new Mail; // create the mail
	$m->From('admin@squeeze.com' );
    $m->To( $emails  );
	$m->Subject( $_REQUEST['subject'] );

	$m->Body( $content);        // set the body
	$m->Priority(1) ;        // set the priority to high
	if($_FILES['filee']['type'])
	$m->Attach( $desination, $_FILES['filee']['type'] ) ;        // attach a file of type image/gif

 	if($m->Send())
		$msg = 'Email Sent Successfully';
	else
		$msg = 'Email Sent Failed';
		
}

	require_once "fckeditor/fckeditor.php";
	
?>
<script type="text/javascript">
function selectAll(selectBox,selectAll) {
    // have we been passed an ID
    if (typeof selectBox == "string") {
        selectBox = document.getElementById(selectBox);
    }

    // is the select box a multiple select box?
    if (selectBox.type == "select-multiple") {
        for (var i = 0; i < selectBox.options.length; i++) {
            selectBox.options[i].selected = selectAll;
        }
    }
}
</script>
<table width="80%" align="left" cellpadding="0" cellspacing="0" border="0">
	<tr>
    	<td>
        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="10" align="left" valign="top" background="images/00-mid.jpg"><img src="images/001.jpg" width="6" height="28" /></td>
                <td width="881" align="centerLEFT" valign="middle" background="images/00-mid.jpg" class="tab-text">Send Email</td>
                <td width="63" align="right" valign="top" background="images/00-mid.jpg" ><img src="images/002.jpg" width="6" height="28" /></td>
              </tr>
	        </table>
        </td>
    </tr>
    <tr>
    	<td>
    		
        	<form name="frm" id="frm" action="index.php?cmd=25" method="post" enctype="multipart/form-data">
            	
				
                <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                
                    <tr><td colspan="2" height="15"></td></tr>
                    <?php
						if(@$msg!=''){
							$err=$msg;
						}
						if($err!=''){
					?>
                    	<tr>
                            <td colspan="2" class="error"><?=$msg;?></td>
                        </tr>
                        <tr><td colspan="2" height="5"></td></tr>
					<?php
					}
					?>
                    
                    <tr><td colspan="2" height="5"></td></tr>
                    <tr>
                        <td class="black11bold AlignRight">Users : </td>
                        <td>
                        	<select name="users[]" multiple='multiple' id="selectbox1" class="required">
								<?php
                                    $query_pages="SELECT * 
                                                  FROM users
                                                 
                                                  ";
                                    $result_pages=$class->ResultSet($query_pages);
                                    $i=1;
                                    while($row_pages=$class->FetchObject($result_pages)){//print_r ($row_pages);
                                ?>
                                
                                   <option value="<?=$row_pages->email?>"><?=$row_pages->user_name?></option>
                                     
                                <?
                                    }
                                ?>    
                        	</select>
                            <br /><br />
                            <span style="cursor:pointer;" onclick="selectAll('selectbox1',true)">Select All</span> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; <span style="cursor:pointer;" onclick="selectAll('selectbox1',false)">Un Select All</span>
                            <br />
                        </td>
                    </tr>
                    <tr><td colspan="2" height="5"></td></tr>
                    <tr>
                    	<td class="black11bold AlignRight">Subject</td>
                        <td><input type="text" name="subject" style="width:500px" id="subject" value="<?=$_REQUEST['subject']?>" />
                        </td>
                    </tr>
                    <tr><td colspan="2" height="5"></td></tr>
                    <tr>
                    	<td class="black11bold AlignRight">File </td>
                        <td><input type="file" name="filee" style="width:500px" />
                        </td>
                    </tr>
                    <tr><td colspan="2" height="5"></td></tr>
                    <tr>
                       <td class="black11bold AlignRight">Mail Content</td>
                        <td >
						<?php
                                $oFCKeditor = new FCKeditor('mail_content') ;							
                                $oFCKeditor->BasePath	= "fckeditor/" ;
                                $oFCKeditor->Value		=  $mail_content;
                                $oFCKeditor->Width = '700';
                                $oFCKeditor->Height = '300';
								$oFCKeditor->Class = 'required';
                                $oFCKeditor->Create();
                            ?>
						</td>
                    </tr>
                    <tr><td colspan="2" height="5"></td></tr>
                    
                    <tr><td></td><td><input type="submit" name="btnSubmit"  value=" Send Mail " class="button" /></td></tr>
                </table>
                
            </form>
        </td>
    </tr>
</table>
<script type="text/javascript">

	function formCallback(result, form) {
		window.status = "valiation callback for form '" + form.id + "': result = " + result;
	}
	var valid = new Validation('frm', {immediate : true, onFormValidate : formCallback});
	
</script>