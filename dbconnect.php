<?php
	session_start();	
	$server = 'localhost';
	$dbuser = 'root';
	$passwd = '';
	
	$result = mysql_connect($server, $dbuser, $passwd);
	
	if($result) {
		$database_name = 'trainfc';
		$result = mysql_select_db($database_name);
		
		if(!$result)
			echo 'Database not found';
		//else echo 'found';
	}
	else
		echo 'Server Connection failed';
?>