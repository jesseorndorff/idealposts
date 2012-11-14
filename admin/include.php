<?php
ob_start();
session_start();
//error_reporting(0);
require_once "../lib/opencon.php";
require_once "../lib/variables.php";
require_once "../lib/class-functions.php";
require_once "../lib/Validate.php";
require_once "../lib/paging.php";
require_once "../lib/class.upload.php";
require_once "../lib/sendmail.class.php";
if($_REQUEST['cmd']==1 || $_REQUEST['cmd']==''){
	
	if((isset($_SESSION['adminID']))){
		header("location: index.php?cmd=2");
		exit(0);
	}
	
}else{
	require_once "../lib/adminsession.php";
	
}
$class=new functions();
$pager = new Pager();
//phpinfo();
//echo MyCo;
?>