<?php
	require_once 'dbconnect.php';
	
	date_default_timezone_set("Asia/Jakarta");
	$tgl = date("h:i:sa");
	extract($_POST);		

	$query = 'INSERT INTO topup
			(tgl, id_statustrx, id_user, jml_topup, nama_rek, no_rek) 
			VALUES (
			"'.$tgl.'",  
			"0",
			"'.$_SESSION['id_user'].'", 
			"'.$jml_topup.'",
			"'.$nama_rek.'",
			"'.$no_rek.'"
			)';
	
	$result = mysql_query($query);
	
	if($result)
	{
		$_SESSION['topup'] = 1;
		header('Location: index.php');
	}
	else
	{
		$_SESSION['topup'] = 2;
		header('Location: index.php');
	}
	
?>