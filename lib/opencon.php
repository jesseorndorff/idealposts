<?php
	define("SERVERNAME","mysql-shared-02.phpfog.com");
	define("USERNAME","jesse-825-47351");
	define("PASSWORS","UJ89G64E96NS");
	define("DBName","idealposts_com");
	$con=mysql_connect(SERVERNAME,USERNAME,PASSWORS) or die("Server not Connected");
	mysql_select_db(DBName,$con) or die("Database not Selected");
?>