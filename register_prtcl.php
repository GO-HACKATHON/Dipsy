<?php
	require_once 'dbconnect.php';
	
		extract($_POST);
		
		$name = $fname.' '.$lname;

		$query = 'INSERT INTO user
				(username, email, password, no_hp, level, id_status, saldo) 
				VALUES (
				"'.$username.'",  
				"'.$email.'",
				"'.$password.'", 
				"'.$no_hp.'",
				0,
				0,
				0)';
		
		$result = mysql_query($query);
		
		if($result)
		{
			$_SESSION['register'] = 1;
			header('Location: index.php');
		}
		else
		{
			$_SESSION['register'] = 2;
			header('Location: register.php');
		}
	
?>