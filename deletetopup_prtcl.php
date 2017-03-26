<?php
	include "dbconnect.php";
	
	extract($_GET);
	
	$query = 'DELETE FROM topup
			WHERE id_topup="'.$t.'"';
	
	$result = mysql_query($query);
	
	if($result)
		header('Location: index.php');
	else
		echo 'Query delete failed';
?>