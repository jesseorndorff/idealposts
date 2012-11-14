<? include('../../../lib/opencon.php');?>
<?


	
	$q = "DELETE FROM orderdetail WHERE orderID = ".$_REQUEST['id'];
	
	if(mysql_query($q))
	{
		$q = "DELETE FROM order1 WHERE orderID = ".$_REQUEST['id'];
		if(mysql_query($q))
		{
			echo "yes";
		}
		else
			echo "no";
	}
	else
	{
		echo "No";
	}
?>