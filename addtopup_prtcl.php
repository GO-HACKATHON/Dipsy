<?php
	include "dbconnect.php";
	
	extract($_GET);
	
	$query = 'SELECT saldo, jml_topup, u.id_user
			  FROM user u 
			  	   JOIN topup tt
			  	   ON u.id_user = tt.id_user
			  WHERE tt.id_topup = '.$t;
	$result = mysql_query($query);
	if($result)
	{
		if(mysql_num_rows($result))
		{
			$row = mysql_fetch_assoc($result);
			$saldoakhir = $row['saldo'] + $row['jml_topup'];
			$query = 'UPDATE topup
					  SET id_statustrx = 2
					  WHERE id_topup ='.$t;
			$result = mysql_query($query);
			if($result)
			{
				$query = 'UPDATE user
						  SET saldo = '.$saldoakhir.'
						  WHERE id_user = '.$row['id_user'];
				mysql_query($query);
				if($result)
					header('Location: index.php');
				else
					echo 'topup failed';
			}
			else
				echo 'update status failed';
		}
		else
			echo 'more than a row found';
	}	
	else
		echo 'record not found';
?>