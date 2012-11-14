<? include('../../../lib/opencon.php');?>
<?


	
	$q = "DELETE FROM price_matrix WHERE item_id = ".$_REQUEST['id'];
	
	if(mysql_query($q))
	{
		$q = "DELETE FROM inventory WHERE item_id = ".$_REQUEST['id'];
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