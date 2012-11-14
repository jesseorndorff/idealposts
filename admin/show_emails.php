<?php 
	if(@$_REQUEST['id']!='' && @$_REQUEST['delete']==1){
		$id=$_REQUEST['id'];
		$query="DELETE FROM users WHERE id =$id";
		
		if($class->executeQuery($query)){
			header("Location: index.php?cmd=10&err=3");
			exit;
		}
		
	}
?>
<table width="97%" align="left" cellpadding="0" cellspacing="0" border="0">
	
	<tr><td height="20"></td></tr>
	<tr>
    	<td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="10" align="left" valign="top" background="images/00-mid.jpg"><img src="images/001.jpg" width="6" height="28" /></td>
                    <td width="881" align="centerLEFT" valign="middle" background="images/00-mid.jpg" class="tab-text">Manage Users</td>
                  <td width="63" align="right" valign="top" background="images/00-mid.jpg" ><img src="images/002.jpg" width="6" height="28" /></td>
                </tr>
            </table>
        </td>
    </tr>
    
    <?php if($_REQUEST['err']){ ?>
        <tr><td height="5"></td></tr>
        <tr>
            <td class="error"><?=$class->errorMassage($_REQUEST['err']);?></td>
        </tr>
        <tr><td height="5"></td></tr>
    <?php } ?>
    
    <tr>
    	<td>
        	<table width="100%" align="center" cellpadding="0" cellspacing="1" border="0">
            	<tr>
                	<td class="headtitle" align="center" width="5%">#</td>
                   	<td class="headtitle" width="15%">Email</td>
                  	<td class="headtitle" width="25%">Action</td>
                </tr>
                <tr>
					<td colspan="7" id="ddddd"></td>
				</tr>
                <?php
					
				
					//users.gid=groups.gid
					$query_pages="SELECT email
								  FROM users
								  
								  ";
					$result_pages=$class->ResultSet($query_pages);
					$i=1;
					while($row_pages=$class->FetchObject($result_pages)){
				?>
                <tr>
                        <td align="center" class="<?=($i%2==0)?'recordlist1':'recordlist2'?>" width="5%"><?=$i?></td>
                        <td class="<?=($i%2==0)?'recordlist1':'recordlist2'?>" ><?=$row_pages->email?></td>
                        <td class="<?=($i%2==0)?'recordlist1':'recordlist2'?>" ><a href="index.php?cmd=9&id=<?=$row_pages->id?>">Edit</a> - <a onclick="return confirm('Are you sure you want to delete this User?')" href="index.php?cmd=10&id=<?=$row_pages->id?>&delete=1">Delete</a></td>
                    </tr>
                    
                <?php		
					$i++;
					}
				?>
            </table>
        </td>
    </tr>
</table>