<?php
function checkSession(){
	if((isset($_SESSION['adminID']))){
	
	}else{
		header("Location: index.php?err=6");
		exit;
	}	
}
function destroySession(){
	$_SESSION=array();
	session_destroy();
}
checkSession();
?>