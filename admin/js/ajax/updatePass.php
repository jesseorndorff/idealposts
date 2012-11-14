<? include('../../../lib/opencon.php');?>
<?
	$q = 'UPDATE distributors SET password = "'.md5($_REQUEST['pass']).'" WHERE distributor_id = '.$_REQUEST['id'];
	if(mysql_query($q))
		echo 'yes';
	else
		echo 'no';
?>