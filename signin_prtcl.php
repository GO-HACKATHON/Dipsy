<?php
	require_once 'dbconnect.php';
	extract($_POST);
	$query = 'SELECT * 
			FROM user
			WHERE email ="'.$email.'" AND password ="'.$password.'"';
	
	$result = mysql_query($query);
	
	if(mysql_num_rows($result)) {
		//echo 'test';
		//echo "<script type='text/javascript'>alert('message');</script>";
		$row = mysql_fetch_assoc($result);
		
		$_SESSION['email'] = $email;
		$_SESSION['id_user'] = $row['id_user'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['level'] = $row['level'];
		$_SESSION['id_status'] = $row['id_status'];
		$_SESSION['no_hp'] = $row['no_hp'];
		$_SESSION['saldo'] = $row['saldo'];

		//echo $row['uname'];
		$_SESSION['login'] = 1;
		if($_SESSION['level'] == 1)
			header('Location: indexadmin.php');
		else
			header('Location: index.php');
	}
	else{
		$_SESSION['login'] = 2;
		header('Location: signin.php');
		//header('Location: index.php');
	}
?>