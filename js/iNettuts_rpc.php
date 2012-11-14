<?php 
include "include.php";

if(!isset($_SESSION['uid']))
{
	header('location: index.php');
	die();
}
header("Cache-Control: no-cache");
header("Pragma: nocache");
// User_id -> Should come from a session variable
$user_id=$_SESSION['uid'];
$table="inettuts";
$field="config";

if (isset($_REQUEST["value"])) { 
  // SET value  
  
  $value=$_REQUEST["value"];
  
  $rs=mysql_query("SELECT * FROM $table WHERE user_id='$user_id'");
  if (mysql_numrows($rs)==0) 
    mysql_query("INSERT INTO $table($field,user_id) VALUES('$value','$user_id')") or die('1');
  else
    mysql_query("UPDATE $table SET $field='$value' WHERE user_id='$user_id'") or die('2');
  echo "OK";

} else {
  $q = "SELECT $field FROM $table WHERE user_id='$user_id'";
  $rs=mysql_query($q);
  if ($row=mysql_fetch_row($rs)) 
    echo $row[0];
  else
    echo "";
}

//mysql_close();
?>