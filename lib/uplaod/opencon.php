<?php
define("SERVERNAME","localhost");
define("USERNAME","wwwlets");
define("PASSWORS","3at1n");
$con=mysql_connect(SERVERNAME,USERNAME,PASSWORS);
define("DBName","wwwlets_letseatin");
mysql_select_db(DBName,$con);
?>