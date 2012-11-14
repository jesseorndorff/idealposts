<? include('../../../lib/opencon.php');?>
<?

		$query="UPDATE order1 SET CompletedOrder='".$_REQUEST['st']."'
                WHERE orderID='".$_REQUEST['id']."'";
        
		if(mysql_query($query))
		{
			echo "yes";
		}
		else
			echo "no";

?>