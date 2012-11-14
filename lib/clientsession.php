<?php
function checkSession(){
    if(isset($_SESSION['uid'])){
	}else{

		$_SESSION['pageURL']=$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
		header("Location: login.php");
		exit;
	}	
}
function destroySession(){
	$_SESSION=array();
	session_destroy();
}
checkSession();

?>