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
		$_SESSION['uname'] = $row['uname'];
		$_SESSION['level'] = $row['level'];
		$_SESSION['nama'] = $row['nama'];

		//echo $row['uname'];
		$_SESSION['login'] = 1;

		header('Location: index.php');
	}
	else{
		$_SESSION['login'] = 2;
		echo 'gagal';
		echo $_SESSION['login'];
		echo mysql_num_rows($result);
		die(mysql_error());
		echo 'ini '.$_SESSION['email'];
		//header('Location: index.php');
	}
?>