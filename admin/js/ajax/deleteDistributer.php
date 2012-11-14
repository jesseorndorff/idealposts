<? include('../../../lib/opencon.php');?>
<?
	
	$q = "Select * FROM order1 WHERE userID = ".$_REQUEST['id']; /// checking id this distributors have orders
	$strResult=mysql_query($q);
	$numRow=mysql_num_rows($strResult);
	if($numRow > 0) // if he has made orders then delete them
	{
		while($row=mysql_fetch_object($strResult)){
			
			$q = "DELETE FROM orderdetail WHERE orderID = ".$row->orderID;
			mysql_query($q);
		}
		
		$q = "DELETE FROM order1 WHERE userID = ".$_REQUEST['id'];
		mysql_query($q);
			
	}
	
	// delete the distributor 
	{
		$q = "DELETE FROM distributors WHERE distributor_id = ".$_REQUEST['id'];
		if(mysql_query($q))
		{
			echo "yes";
		}
		else
			echo "no";
	}
?>